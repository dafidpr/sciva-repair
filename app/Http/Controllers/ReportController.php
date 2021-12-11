<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Company_profile;
use App\Models\Customer;
use App\Models\Debt;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Stock;
use App\Models\Stock_opname;
use App\Models\Supplier;
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
        $data = [
            'purchase' => Purchase::whereBetween('created_at', [$request->from, $request->to])->get(),
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_pembelian', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Pembelian');
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
        $data = [
            'opname' => Stock_opname::whereBetween('created_at', [$request->from, $request->to])->get(),
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_opname', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Opname');
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

        if ($request->type == 'all') {
            $a = Stock::whereBetween('created_at', [$request->from, $request->to])->get();
            $b = Stock::where('type', 'in')->whereBetween('created_at', [$request->from, $request->to])->sum('value');
            $c = Stock::where('type', 'out')->whereBetween('created_at', [$request->from, $request->to])->sum('value');
        } else {
            $a = Stock::where('type', $request->type)->whereBetween('created_at', [$request->from, $request->to])->get();
            $b = Stock::where('type', $request->type)->whereBetween('created_at', [$request->from, $request->to])->sum('value');
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
            $bayar = collect(DB::select("SELECT SUM(a.payment) AS bayar FROM debts a, purchases b, suppliers c WHERE a.purchase_id = b.id AND c.id = b.supplier_id AND SUBSTRING(a.debt_date, 1, 10) BETWEEN '$request->from' AND '$request->to'"))->first();
        }

        $data = [
            'receivable' => $debt,
            'total_piutang' => $total->total,
            'sisa_piutang' => $remainder->remainder,
            'total_bayar' => $bayar->bayar,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_piutang', $data);
        return $pdf->stream('PDF-Piutang');
    }

    public function laba_rugi(Request $request)
    {
        $a = Sale_detail::whereBetween('created_at', [$request->from, $request->to])->get();
        $b = Sale_detail::whereBetween('created_at', [$request->from, $request->to])->sum('sub_total');
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
    }
    public function laba_bersih(Request $request)
    {
        $a = Sale_detail::whereBetween('created_at', [$request->from, $request->to])->get();
        $b = Sale_detail::whereBetween('created_at', [$request->from, $request->to])->sum('sub_total');
        // $c = collect(DB::select("SELECT * FROM sale_details a, sales b, products c WHERE b.id = c.sale_id AND c.id = a.product_id"));

        // dd($a);
        $data = [
            'sale' => $a,
            'total' => $b,
            // 'hpp' => $c,
            'lain' => $request->lain,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_lababersih', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Stock');
    }

    public function jurnal_harian(Request $request)
    {
        $data = [
            'cash' => Cash::whereBetween('date', [$request->from, $request->to])->get(),
            'debit' => Cash::where('source', 'expenditure')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            'kredit' => Cash::where('source', 'income')->whereBetween('date', [$request->from, $request->to])->sum('nominal'),
            // 'total' => $b,
            // 'hpp' => $c,
            // 'lain' => $request->lain,
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
            'company' => Company_profile::find(1),
        ];

        $pdf = PDF::loadView('cetak.lap_jurnalharian', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Jurnal-Harian');
    }
}
