<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Product;
use App\Models\Stock;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
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
            'stock' => Stock::all(),
            'product' => Product::all()
        ];
        return view('masterdata.stok_in_out', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $val = $request->total * $request->purchase_price;
        if ($request->type == 'out') {

            Cash::create([
                'user_id' => Auth::guard('web')->user()->id,
                'cash_code' => IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']),
                'date' => date('Y-m-d'),
                'nominal' => $val,
                'description' => 'Stok Keluar',
                'source' => 'expenditure'
            ]);
        }

        Stock::create([
            'product_id' => $request->id,
            'total' => $request->total,
            'value' => $val,
            'type' => $request->type,
            'description' => $request->description
        ]);

        $prod = Product::find($request->id);
        $in = $prod->stock + $request->total;
        $out = $prod->stock - $request->total;

        if ($request->type == 'in') {
            Product::where('id', $request->id)->update([
                'stock' => $in
            ]);
        } elseif ($request->type == "out") {
            Product::where('id', $request->id)->update([
                'stock' => $out
            ]);
        }

        return redirect('/admin/stock_in_out')->with('berhasil', 'Anda telah berhasil menambah data!!');
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
        $data = Stock::find($id);
        $prod = Product::find($data->product_id);

        if ($data->type == 'in') {
            $stock = $prod->stock - $data->total;
            Product::where('id', $data->product_id)->update([
                'stock' => $stock
            ]);
        } else {
            # code...
            $stock2 = $prod->stock + $data->total;
            Product::where('id', $data->product_id)->update([
                'stock' => $stock2
            ]);
        }

        Stock::where('id', $id)->delete();

        return redirect()->back()->with('berhasil', 'Anda telah berhasil menghapus data!!');
    }
}
