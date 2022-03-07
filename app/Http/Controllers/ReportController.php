<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Company_profile;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Debt_detail;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Purchase_detail;
use App\Models\Receivable;
use App\Models\Receivable_detail;
use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Stock;
use App\Models\Stock_opname;
use App\Models\Supplier;
use App\Models\Transaction_service;
use App\Models\Transaction_service_detail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Database\Seeders\SaleSeeder;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sale(Request $request)
    {
        //

        for ($i = 0; $i < 4; $i++) {
            $data = $i;
        }

        // dd($data);
        // return view('cetak.lap_penjualan', $data);
        $pdf = PDF::loadView('cetak.lap_penjualan', [
            'sale' => Sale::whereBetween('date', [$request->dateFrom, $request->dateTo])->get(),
            'tglawal' => $request->dateFrom,
            'tglakhir' => $request->dateTo,
            'company' => Company_profile::find(1),
            'i' => $data
        ]);
        return $pdf->stream('PDF-Penjualan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        //
        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));

        $data = [
            'purchase' => Purchase::whereBetween('created_at', [$startDate, $endDate])->get(),
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        // return view('cetak.lap_pembelian', $data);
        $pdf = PDF::loadView('cetak.lap_pembelian', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Pembelian.pdf');
    }

    // dd(Carbon::parse($data->created_at)->format('Y-m-d'));

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function opname(Request $request)
    {
        //
        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));
        $data = [
            'opname' => Stock_opname::whereBetween('created_at', [$startDate, $endDate])->get(),
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        // return view('cetak.lap_opname', $data);
        $pdf = PDF::loadView('cetak.lap_opname', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Opname.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function in_out(Request $request)
    {
        //

        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));

        if ($request->type == 'all') {
            $a = Stock::whereBetween('created_at', [$startDate, $endDate])->get();
            $b = Stock::where('type', 'in')->whereBetween('created_at', [$startDate, $endDate])->sum('value');
            $c = Stock::where('type', 'out')->whereBetween('created_at', [$startDate, $endDate])->sum('value');
        } else {
            $a = Stock::where('type', $request->type)->whereBetween('created_at', [$startDate, $endDate])->get();
            $b = Stock::where('type', $request->type)->whereBetween('created_at', [$startDate, $endDate])->sum('value');
            $c = 0;
        }
        // dd($a);
        $data = [
            'stock' => $a,
            'nilai_in' => $b,
            'nilai_out' => $c,
            'tipe' => $request->type,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_stock', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Stock');

        // return view('cetak.lap_stock', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hutang_piutang()
    {
        $data = [
            'supplier' => Supplier::all(),
            'customer' => Customer::where('telephone', '!=', '00')->get()
        ];
        return view('laporan.hutangpiutang', $data);
    }
    public function cash(Request $request)
    {
        //
        $in = Cash::where('source', 'income')->whereBetween('date', [$request->from, $request->to])->sum('nominal');
        $out = Cash::where('source', 'expenditure')->whereBetween('date', [$request->from, $request->to])->sum('nominal');
        $data = [
            'cash' => Cash::whereBetween('date', [$request->from, $request->to])->get(),
            'pemasukan' => $in,
            'pengeluaran' => $out,
            'sisa' => $in - $out,
            'datefrom' => $request->from,
            'dateto' => $request->to,
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_kas', $data);
        return $pdf->stream('PDF-Kas');

        // return view('cetak.lap_kas', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function debt(Request $request)
    {
        //

        if ($request->supplier != 'all') {
            # code...
            $debt = collect(DB::select("SELECT a.id, b.invoice, c.name, SUBSTRING(a.debt_date, 1, 10) AS debt_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->supplier' ORDER BY SUBSTRING(a.debt_date, 1, 10) ASC"))->all();

            //total hutan
            $total = collect(DB::select("SELECT SUM(a.total) AS total FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->supplier'"))->first();
            //sisa hutang
            $remainder = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->supplier'"))->first();
            //total Bayar
            $bayar = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->supplier'"))->first();
        } else {
            $debt = collect(DB::select("SELECT a.id, b.invoice, c.name, SUBSTRING(a.debt_date, 1, 10) AS debt_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to' ORDER BY SUBSTRING(a.debt_date, 1, 10) ASC"))->all();
            # code...
            //total hutang
            $total = collect(DB::select("SELECT SUM(a.total) AS total FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //sisa hutang gays
            $remainder = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //total bayar
            $bayar = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
        }


        $data = [
            'debt' => $debt,
            'total_hutang' => $total->total,
            'sisa_hutang' => $remainder->remainder,
            'total_bayar' => $bayar->bayar,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_hutang', $data);
        return $pdf->stream('PDF-Hutang');

        // return view('cetak.lap_hutang', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function receivable(Request $request)
    {
        //
        if ($request->customer != 'all') {
            # code...
            $debt = collect(DB::select("SELECT a.id, b.invoice, c.name, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();

            //total hutan
            $total = collect(DB::select("SELECT SUM(a.total) AS total FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
            //sisa hutang
            $remainder = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
            //total Bayar
            $bayar = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
        } else {
            $debt = collect(DB::select("SELECT a.id, b.invoice, c.name, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();
            # code...
            //total hutang
            $total = collect(DB::select("SELECT SUM(a.total) AS total FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //sisa hutang gays
            $remainder = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //total bayar
            $bayar = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
        }


        if ($request->customer != 'all') {
            # code...
            $debt2 = collect(DB::select("SELECT a.id, b.transaction_code, c.name, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();

            //total hutan
            $total2 = collect(DB::select("SELECT SUM(a.total) AS total FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
            //sisa hutang
            $remainder2 = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
            //total Bayar
            $bayar2 = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' AND c.id = '$request->customer'"))->first();
        } else {
            $debt2 = collect(DB::select("SELECT a.id, b.transaction_code, c.name, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();
            # code...
            //total hutang
            $total2 = collect(DB::select("SELECT SUM(a.total) AS total FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //sisa hutang gays
            $remainder2 = collect(DB::select("SELECT SUM(a.remainder) AS remainder FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
            //total bayar
            $bayar2 = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND SUBSTRING(a.receivable_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
        }

        $data = [
            'receivable' => $debt,
            'receivable2' => $debt2,
            'total_piutang' => $total->total,
            'total_piutang2' => $total2->total,
            'sisa_piutang' => $remainder->remainder,
            'sisa_piutang2' => $remainder2->remainder,
            'total_bayar' => $bayar->bayar,
            'total_bayar2' => $bayar2->bayar,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_piutang', $data);
        return $pdf->stream('PDF-Piutang');

        // return view('cetak.lap_piutang', $data);
    }

    public function laba_rugi(Request $request)
    {
        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));
        $a = Sale_detail::whereBetween('created_at', [$startDate, $endDate])->get();
        $b = Sale_detail::whereBetween('created_at', [$startDate, $endDate])->sum('sub_total');
        // $c = collect(DB::select("SELECT * FROM sale_details a, sales b, products c WHERE b.id = c.sale_id AND c.id = a.product_id"));

        // dd($a);
        $data = [
            'sale' => $a,
            'total' => $b,
            // 'hpp' => $c,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_labakotor', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Stock');

        // return view('cetak.lap_labakotor', $data);
    }
    public function laba_bersih(Request $request)
    {
        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));

        $a = Sale_detail::whereBetween('created_at', [$startDate, $endDate])->get();
        $b = Sale_detail::whereBetween('created_at', [$startDate, $endDate])->sum('sub_total');
        $b2 = Sale_detail::whereBetween('created_at', [$startDate, $endDate])->sum('hpp');
        $c = Transaction_service::where('status', 'take')->whereBetween('created_at', [$startDate, $endDate])->sum('total');
        $c2 = Transaction_service::where('status', 'take')->whereBetween('created_at', [$startDate, $endDate])->get();
        $d = Debt_detail::whereBetween('created_at', [$startDate, $endDate])->sum('nominal');
        $d2 = Debt_detail::whereBetween('created_at', [$startDate, $endDate])->get();
        $e = Receivable_detail::whereBetween('created_at', [$startDate, $endDate])->sum('nominal');
        $e2 = Receivable_detail::whereBetween('created_at', [$startDate, $endDate])->get();
        $f = Cash::where('source', 'other_income')->whereBetween('created_at', [$startDate, $endDate])->sum('nominal');
        $f2 = Cash::where('source', 'other_income')->whereBetween('created_at', [$startDate, $endDate])->get();
        $g = Cash::where('source', 'other_expenditure')->whereBetween('created_at', [$startDate, $endDate])->sum('nominal');
        $g2 = Cash::where('source', 'other_expenditure')->whereBetween('created_at', [$startDate, $endDate])->get();
        $h = Purchase_detail::whereBetween('created_at', [$startDate, $endDate])->get();
        $h2 = Purchase_detail::whereBetween('created_at', [$startDate, $endDate])->sum('sub_total');
        $i = Transaction_service_detail::whereBetween('created_at', [$startDate, $endDate])->sum('hpp');

        // dd($a);
        $data = [
            'sale' => $a,
            'total' => $b,
            'hpp_sell' => $b2,
            'service' => $c,
            'service_detail' => $c2,
            'debt' => $d,
            'debt_detail' => $d2,
            'receivable' => $e,
            'receivable_detail' => $e2,
            'other_in' => $f,
            'other_in_d' => $f2,
            'other_ex' => $g,
            'other_ex_d' => $g2,
            'purchase' => $h2,
            'purchase_d' => $h,
            'hpp_servis' => $i,
            'lain' => $request->lain,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_lababersih', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Stock');

        // return view('cetak.lap_lababersih', $data);
    }

    public function jurnal_harian(Request $request)
    {
        $data = [
            'cash' => Cash::whereBetween('date', [$request->from, $request->to])->get(),
            'debit' => Cash::where('source', 'expenditure')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            'kredit' => Cash::where('source', 'income')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            'debit2' => Cash::where('source', 'other_expenditure')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            'kredit2' => Cash::where('source', 'other_income')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            // 'total' => $b,
            // 'hpp' => $c,
            // 'lain' => $request->lain,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_jurnalharian', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Jurnal-Harian');

        // return view('cetak.lap_jurnalharian', $data);
    }

    public function print_data_product()
    {
        $data = [
            'company' => Company_profile::find(1),
            'product' => Product::all()
        ];

        $pdf = PDF::loadView('cetak.data_barang', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-databarang');
    }
}
