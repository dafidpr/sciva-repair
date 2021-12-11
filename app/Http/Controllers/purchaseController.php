<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Debt;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Purchase_detail;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class purchaseController extends Controller
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
            'purchase' => Purchase::all()
        ];

        return view('transaksi.data_pembelian', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entry()
    {
        //
        $id = IdGenerator::generate(['table' => 'purchases', 'length' => 14, 'prefix' => 'PB' . date('Ymd'), 'field' => 'invoice', 'reset_on_prefix_change' => true]);
        //output: INV-000001

        $data = [
            'id' => $id,
            'product' => Product::all(),
            'supplier' => Supplier::all()
        ];

        return view('transaksi.entry_pembelian', $data);
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
        $id = IdGenerator::generate(['table' => 'purchases', 'length' => 14, 'prefix' => 'PB' . date('Ymd'), 'field' => 'invoice', 'reset_on_prefix_change' => true]);
        //output: INV-000001
        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        $rules = [
            'id_supplier' => 'required'
        ];
        $messages = [
            'id_supplier.required' => 'Data tidak boleh kosong!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // dd($request->all());
        if ($request->method == 'cash') {
            $purchase = Purchase::create([
                'invoice' => $id,
                'supplier_id' => $request->id_supplier,
                'user_id' => Auth::guard('web')->user()->id,
                'discount' => $request->discount,
                'total' => $request->grandtotal,
                'method' => 'cash',
                'payment' => $request->payment,
                'cashback' => $request->cashback,
            ]);
            $data = $request->all();
            if (count($data['i_id_product']) > 0) {
                foreach ($data['i_id_product'] as $item => $v) {
                    $detail = [
                        'purchase_id' => $purchase->id,
                        'product_id' => $request->i_id_product[$item],
                        'selling_price' => $request->i_sale_price[$item],
                        'purchase_price' => $request->i_purchase_price[$item],
                        'quantity' => $request->i_quantity[$item],
                        'sub_total' => $request->i_total[$item]
                    ];
                    Purchase_detail::create($detail);
                    // dd($value);
                }
            }

            if (count($data['i_quantity']) > 0) {
                foreach ($data['i_quantity'] as $item => $v) {
                    $p = Product::where('id', $data['i_id_product'][$item])->get();
                    foreach ($p as $key) {
                        # code...
                        $updateqtyproduct = $key->stock + $data['i_quantity'][$item];
                    }
                    $q = [
                        'selling_price' => $request->i_sale_price[$item],
                        'purchase_price' => $request->i_purchase_price[$item],
                        'stock' => $updateqtyproduct
                    ];

                    Product::where('id', $data['i_id_product'][$item])->update($q);
                    // dd($value);
                }
            }

            Cash::create([
                'user_id' => Auth::guard('web')->user()->id,
                'cash_code' => $cash_id,
                'date' => date('Y-m-d'),
                'nominal' => $request->payment,
                'description' => 'Pembelian dengan Kode ' . $purchase->invoice,
                'source' => 'expenditure'
            ]);

            return redirect()->back()->with('berhasil', 'Anda telah berhasil menambah data pembelian!!');
        } else if ($request->method == 'credit') {
            $purchase = Purchase::create([
                'invoice' => $id,
                'supplier_id' => $request->id_supplier,
                'user_id' => Auth::guard('web')->user()->id,
                'discount' => $request->discount,
                'total' => $request->grandtotal,
                'method' => 'credit',
                'payment' => $request->payment,
                'cashback' => abs($request->cashback),
            ]);
            $data = $request->all();
            if (count($data['i_id_product']) > 0) {
                foreach ($data['i_id_product'] as $item => $v) {
                    $detail = [
                        'purchase_id' => $purchase->id,
                        'product_id' => $request->i_id_product[$item],
                        'selling_price' => $request->i_sale_price[$item],
                        'purchase_price' => $request->i_purchase_price[$item],
                        'quantity' => $request->i_quantity[$item],
                        'sub_total' => $request->i_total[$item]
                    ];
                    Purchase_detail::create($detail);
                    // dd($value);
                }
            }


            if (count($data['i_quantity']) > 0) {
                foreach ($data['i_quantity'] as $item => $v) {
                    $p = Product::where('id', $data['i_id_product'][$item])->get();
                    foreach ($p as $key) {
                        # code...
                        $updateqtyproduct = $key->stock + $data['i_quantity'][$item];
                    }
                    $q = [
                        'selling_price' => $request->i_sale_price[$item],
                        'purchase_price' => $request->i_purchase_price[$item],
                        'stock' => $updateqtyproduct
                    ];

                    Product::where('id', $data['i_id_product'][$item])->update($q);
                    // dd($value);
                }
            }


            Cash::create([
                'user_id' => Auth::guard('web')->user()->id,
                'cash_code' => $cash_id,
                'date' => date('Y-m-d'),
                'nominal' => $request->payment,
                'description' => 'Pembelian dengan Kode ' . $purchase->invoice,
                'source' => 'expenditure'
            ]);

            Debt::create([
                'purchase_id' => $purchase->id,
                'total' => $request->grandtotal,
                'payment' => $request->payment,
                'remainder' => abs($request->cashback),
                'debt_date' => date('Y-m-d'),
                'due_date' => $request->due_date,
                'status' => 'not yet paid'
            ]);

            return redirect()->back()->with('berhasil', 'Anda telah berhasil menambah data pembelian!!');
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
            'detail' => Purchase_detail::where('purchase_id', $id)->get()
        ];

        return view('transaksi.detail_pembelian', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function select_supplier($id)
    {
        //
        $data = Supplier::find($id);

        return json_encode($data);
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
