<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
            'barang' => Product::all(),
            'supplier' => Supplier::all()
        ];
        return view('masterdata.barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $rules = [
            'barcode' => 'required|unique:products',
            'name' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required',
            'member_price' => 'required',
            'stock' => 'required',
            'limit' => 'required',
            'supplier_id' => 'required'
        ];
        $messages = [
            'barcode.required' => 'Barcode tidak boleh kosong!!',
            'barcode.unique' => 'Barcode sudah ada!!',
            'name.required' => 'Barcode tidak boleh kosong!!',
            'selling_price.required' => 'Harga jual tidak boleh kosong!!',
            'purchase_price.required' => 'Harga beli tidak boleh kosong!!',
            'member_price.required' => 'Harga member tidak boleh kosong!!',
            'stock.required' => 'Stok tidak boleh kosong!!',
            'limit.required' => 'Limit tidak boleh kosong!!',
            'supplier_id.required' => 'Supplier tidak boleh kosong!!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Product::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'member_price' => $request->member_price,
            'stock' => $request->stock,
            'limit' => $request->limit,
            'supplier_id' => $request->supplier_id
        ]);

        return redirect('/admin/barang')->with('berhasil', 'Anda berhasil menambah data baru!!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
