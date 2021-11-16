<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_opname;
use Illuminate\Http\Request;

class OpnameController extends Controller
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
            'opname' => Stock_opname::all(),
            'product' => Product::all()
        ];
        return view('masterdata.stokopname', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectProduct($id)
    {
        //
        $data = Product::find($id);
        // dd($data);
        return json_encode($data);
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
        // dd($request->all());
        $difference = $request->stock - $request->real_stock;
        $value = $difference * $request->purchase_price;

        Stock_opname::create(
            [
                'product_id' => $request->id_product,
                'stock' => $request->stock,
                'real_stock' => $request->real_stock,
                'difference_stock' => $difference,
                'value' => $value,
                'description' => $request->description
            ]
        );

        return redirect('/admin/stockopname')->with('berhasil', 'Anda telah berhasil menambahkan Data!!');
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
            'opname' => Stock_opname::find($id),
            'product' => Product::all()
        ];

        return view('masterdata.editstokopname', $data);
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
        $difference = $request->stock - $request->real_stock;
        $value = $difference * $request->purchase_price;

        Stock_opname::where('id', $id)->update([
            'product_id' => $request->product_id,
            'stock' => $request->stock,
            'real_stock' => $request->real_stock,
            'difference_stock' => $difference,
            'value' => $value,
            'description' => $request->description
        ]);

        return redirect('/admin/stockopname')->with('berhasil', 'Anda telah berhasil mengubah data!!');
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
        Stock_opname::where('id', $id)->delete();

        return redirect()->back()->with('berhasil', 'Selamat anda telah berhasil menghapus data!!');
    }
}
