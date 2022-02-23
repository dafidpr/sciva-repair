<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pemasukan = collect(DB::select("SELECT SUM(nominal) AS nominal FROM cashes WHERE source = 'income'"))->first();
        $pemasukan2 = collect(DB::select("SELECT SUM(nominal) AS nominal FROM cashes WHERE source = 'other_income'"))->first();
        $pengeluaran = collect(DB::select("SELECT SUM(nominal) AS nominal FROM cashes WHERE source = 'expenditure'"))->first();
        $pengeluaran2 = collect(DB::select("SELECT SUM(nominal) AS nominal FROM cashes WHERE source = 'other_expenditure'"))->first();
        $total = ($pemasukan->nominal + $pemasukan2->nominal) - ($pengeluaran->nominal + $pengeluaran2->nominal);
        // dd($total);
        $data = [
            'cash' => Cash::all(),
            'cash_id' => IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']),
            'total' => $total
        ];

        return view('keuangan.kas', $data);
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
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $request->cash_code,
            'date' => date('Y-m-d'),
            'nominal' => $request->nominal,
            'description' => $request->description,
            'source' => $request->source
        ]);

        return redirect()->back()->with('berhasil', 'Data Kas telah ditambahkan!!');
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
        Cash::where('id', $id)->delete();

        return redirect()->back();
    }
}
