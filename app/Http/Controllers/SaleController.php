<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Company_profile;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Receivable;
use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Setting;
use App\Models\Vat_tax;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'sale' => Sale::all()
        ];

        return view('transaksi.data_penjualan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Entry()
    {
        //
        $id = IdGenerator::generate(['table' => 'sales', 'field' => 'invoice', 'length' => 12, 'prefix' => 'POS' . date('dmy'), 'reset_on_prefix_change' => true]);
        //output: P00001
        $data = [
            'invoice' => $id,
            'customer' => Customer::all(),
            'product' => Product::all()
        ];

        return view('transaksi.entry_penjualan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'id_customer' => 'required'
        ];
        $messages = [
            'id_customer.required' => 'Customer tidak boleh Kosong!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $id = IdGenerator::generate(['table' => 'sales', 'field' => 'invoice', 'length' => 12, 'prefix' => 'POS' . date('dmy'), 'reset_on_prefix_change' => true]);
        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        $tax_code = IdGenerator::generate(['table' => 'vat_taxes', 'field' => 'tax_code', 'length' => 10, 'prefix' => 'PPN']);
        //output: P00001
        if ($request->method == 'cash') {

            $data = [
                'user_id' => Auth::guard('web')->user()->id,
                'customer_id' => $request->id_customer,
                'invoice' => $id,
                'method' => 'cash',
                'total' => $request->b_grandtotal,
                'payment' => $request->b_payment,
                'cashback' => $request->b_cashback,
                'vat_tax' => $request->b_vat_tax,
                'discount' => $request->b_discount,
                'date' => date('Y-m-d')
            ];
            $sale = Sale::create($data);
            $data = $request->all();

            if (count($data['id_product']) > 0) {
                foreach ($data['id_product'] as $item => $v) {
                    $hpp = $data['hpp'][$item] * $data['quantity'][$item];
                    $detail = [
                        'sale_id' => $sale->id,
                        'product_id' => $data['id_product'][$item],
                        'discount' => $data['discount'][$item],
                        'hpp' => $hpp,
                        'total' => $data['price'][$item],
                        'quantity' => $data['quantity'][$item],
                        'sub_total' => $data['total'][$item]
                    ];
                    Sale_detail::create($detail);
                    // dd($value);
                }
            }

            if (count($data['quantity']) > 0) {
                foreach ($data['quantity'] as $item => $v) {
                    $p = Product::where('id', $data['id_product'][$item])->get();
                    foreach ($p as $key) {
                        # code...
                        $updateqtyproduct = $key->stock - $data['quantity'][$item];
                    }
                    $q = [
                        'stock' => $updateqtyproduct
                    ];

                    Product::where('id', $data['id_product'][$item])->update($q);
                    // dd($value);
                }
            }

            Cash::create([
                'user_id' => Auth::guard('web')->user()->id,
                'cash_code' => $cash_id,
                'date' => date('Y-m-d'),
                'nominal' => $request->b_grandtotal,
                'description' => 'Penjualan dengan kode ' . $sale->invoice,
                'source' => 'income'
            ]);

            if ($request->b_vat_tax != 0) {
                Vat_tax::create([
                    'user_id' => Auth::guard('web')->user()->id,
                    'tax_code' => $tax_code,
                    'nominal' => $request->b_vat_tax,
                    'type' => 'income',
                    'date' => date('Y-m-d'),
                    'description' => 'Penjualan'
                ]);
            }

            return redirect()->back()->withInput(['print_s_penjualan' => $sale->id]);
        } elseif ($request->method == 'credit') {
            $data = [
                'user_id' => Auth::guard('web')->user()->id,
                'customer_id' => $request->id_customer,
                'invoice' => $id,
                'method' => 'credit',
                'total' => $request->b_grandtotal,
                'payment' => $request->b_payment,
                'cashback' => $request->b_cashback,
                'vat_tax' => $request->b_vat_tax,
                'discount' => $request->b_discount,
                'date' => date('Y-m-d')
            ];
            $sale = Sale::create($data);
            $data = $request->all();

            if (count($data['id_product']) > 0) {
                foreach ($data['id_product'] as $item => $v) {
                    $detail = [
                        'sale_id' => $sale->id,
                        'product_id' => $data['id_product'][$item],
                        'discount' => $data['discount'][$item],
                        'hpp' => $data['hpp'][$item],
                        'total' => $data['price'][$item],
                        'quantity' => $data['quantity'][$item],
                        'sub_total' => $data['total'][$item]
                    ];
                    Sale_detail::create($detail);
                    // dd($value);
                }
            }
            if (count($data['quantity']) > 0) {
                foreach ($data['quantity'] as $item => $v) {
                    $p = Product::where('id', $data['id_product'][$item])->get();
                    foreach ($p as $key) {
                        # code...
                        $updateqtyproduct = $key->stock - $data['quantity'][$item];
                    }
                    $q = [
                        'stock' => $updateqtyproduct
                    ];

                    Product::where('id', $data['id_product'][$item])->update($q);
                    // dd($value);
                }
            }

            $piutang = [
                'sale_id' => $sale->id,
                'service_id' => null,
                'receivable_date' => date('Y-m-d'),
                'total' => abs($request->b_cashback),
                'payment' => 0,
                'remainder' => abs($request->b_cashback),
                'due_date' => $request->due_date,
                'status' => 'not yet paid'
            ];
            Receivable::create($piutang);

            Cash::create([
                'user_id' => Auth::guard('web')->user()->id,
                'cash_code' => $cash_id,
                'date' => date('Y-m-d'),
                'nominal' => $request->b_payment,
                'description' => 'Penjualan dengan kode ' . $sale->invoice,
                'source' => 'income'
            ]);

            if ($request->b_vat_tax != 0) {
                Vat_tax::create([
                    'user_id' => Auth::guard('web')->user()->id,
                    'tax_code' => $tax_code,
                    'nominal' => $request->b_vat_tax,
                    'type' => 'income',
                    'date' => date('Y-m-d'),
                    'description' => 'Penjualan'
                ]);
            }

            return redirect()->back()->withInput(['print_s_penjualan' => $sale->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = [
            "detail" => Sale_detail::where('sale_id', $id)->get()
        ];

        return view('transaksi.detail_penjualan', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {
        //
        $sale = Sale::find($id);
        $data = [
            'company' => Company_profile::find(1),
            'sale' => $sale,
            'sale_detail' => Sale_detail::where('sale_id', $sale->id)->get(),
            'footer' => Setting::where('options', 'footer_nota_sale')->first()
        ];

        return view('cetak.struk_penjualan', $data);

        // $pdf = PDF::loadView('cetak.struk_penjualan', $data)->setPaper('a4', 'potrait');
        // return $pdf->stream('Struk_sale');
    }
    public function cetak_epson($id)
    {
        //
        $sale = Sale::find($id);
        $data = [
            'company' => Company_profile::find(1),
            'sale' => $sale,
            'sale_detail' => Sale_detail::where('sale_id', $sale->id)->get(),
            'footer' => Setting::where('options', 'footer_nota_sale')->first()
        ];

        return view('cetak.print_penjualan', $data);

        // $pdf = PDF::loadView('cetak.struk_penjualan', $data)->setPaper('a4', 'potrait');
        // return $pdf->stream('Struk_sale');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
