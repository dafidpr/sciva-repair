<?php

namespace App\Http\Controllers;

use App\Models\Commision;
use App\Models\Company_profile;
use App\Models\Transaction_service;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KomisiController extends Controller
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
            'user' => User::where('username', '!=', 'root')->get()
        ];
        return view('content.komisikaryawan', $data);
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
        $startDate = date('Y-m-d', strtotime($request->from));
        $endDate = date('Y-m-d', strtotime($request->to));

        $data = [
            'user' => collect(DB::select("SELECT a.total, c.transaction_code, a.created_at, b.name FROM commisions a, users b, transaction_services c WHERE a.user_id='" . $request->user . "' AND b.id=a.user_id AND substring(a.created_at, 1, 10) BETWEEN '" . $startDate . "' AND '" . $endDate . "' AND c.id=a.servis_id"))->all(),
            'total' => collect(DB::select("SELECT SUM(a.total) as total FROM commisions a, users b, transaction_services c WHERE a.user_id='" . $request->user . "' AND b.id=a.user_id AND substring(a.created_at, 1, 10) BETWEEN '" . $startDate . "' AND '" . $endDate . "' AND c.id=a.servis_id"))->first(),
            'company' => Company_profile::find(1),
            'datefrom' => Carbon::parse($request->from)->format('Y-m-d'),
            'dateto' => Carbon::parse($request->to)->format('Y-m-d'),
        ];

        $pdf = PDF::loadView('cetak.lap_komisi', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('PDF-Stock.pdf');
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
