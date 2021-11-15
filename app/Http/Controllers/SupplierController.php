<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SupplierController extends Controller
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
            'suppliers' => Supplier::all(),
            'sup_code' => IdGenerator::generate(['table' => 'suppliers', 'field' => 'supplier_code', 'length' => 8, 'prefix' => 'SPL'])
            //output: P00001
        ];
        return view('masterdata.supplier', $data);
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
        Supplier::create([
            'supplier_code' => $request->supplier_code,
            'name' => $request->name,
            'telephone' => $request->telephone,
            'bank' => $request->bank,
            'account_number' => $request->account_number,
            'bank_account_name' => $request->bank_account_name,
            'address' => $request->address
        ]);

        return redirect()->back()->with('berhasil', 'Anda telah menambah data!!');
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
        $data = Supplier::find($id);

        return json_encode($data);
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
    public function update(Request $request)
    {
        //
        Supplier::where('id', $request->id)->update([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'bank' => $request->bank,
            'account_number' => $request->account_number,
            'bank_account_name' => $request->bank_account_name,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('berhasil', 'Anda telah berhasil merubah Data!!');
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
        Supplier::where('id', $id)->delete();

        return redirect()->back()->with('berhasil', 'Anda telah berhasil menghapus data!!');
    }
}
