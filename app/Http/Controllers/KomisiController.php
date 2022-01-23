<?php

namespace App\Http\Controllers;

use App\Models\Commision;
use App\Models\Company_profile;
use App\Models\Transaction_service;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

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
            'user' => Commision::where('user_id', $request->user)->whereBetween('created_at', [$startDate, $endDate])->get(),
            'total' => Commision::where('user_id', $request->user)->whereBetween('created_at', [$startDate, $endDate])->sum('total'),
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
