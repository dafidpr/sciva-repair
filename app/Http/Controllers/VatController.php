<?php

namespace App\Http\Controllers;

use App\Models\Vat_tax;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = collect(DB::select("SELECT SUM(nominal) AS nominal FROM vat_taxes WHERE type = 'income'"))->first();
        $b = collect(DB::select("SELECT SUM(nominal) AS nominal FROM vat_taxes WHERE type = 'deposit'"))->first();
        $c = collect(DB::select("SELECT SUM(nominal) AS nominal FROM vat_taxes WHERE type = 'out'"))->first();

        $total = $a->nominal - $b->nominal;

        // dd($total);

        $data = [
            'vat' => Vat_tax::all(),
            'total' => $total
        ];
        return view('keuangan.ppn', $data);
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

        $tax_code = IdGenerator::generate(['table' => 'vat_taxes', 'field' => 'tax_code', 'length' => 10, 'prefix' => 'PPN']);
        Vat_tax::create([
            'user_id' => Auth::guard('web')->user()->id,
            'tax_code' => $tax_code,
            'nominal' => $request->nominal,
            'type' => 'deposit',
            'date' => date('Y-m-d'),
            'description' => $request->description
        ]);

        return redirect()->back()->with('berhasil', 'Data PPN berhasil ditambahkan!!');
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
        Vat_tax::where('id', $id)->delete();

        return redirect()->back();
    }
}
