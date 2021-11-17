<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Repaire_service;
use App\Models\Transaction_service;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransactionServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $no_nota = $id = IdGenerator::generate(['table' => 'transaction_services', 'field' => 'transaction_code', 'length' => 15, 'prefix' => 'SRV' . date('dmY'), 'reset_on_prefix_change' => true]);
        //output: INV-000001

        $data = [
            'service' => Transaction_service::all(),
            "customer" => Customer::all(),
            'nota' => $no_nota
        ];
        return view('content.servis', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select_customer($id)
    {
        //
        $data = Customer::find($id);
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
        Transaction_service::create([
            'customer_id' => $request->id_customer,
            'transaction_code' => $request->transaction_code,
            'unit' => $request->unit,
            'serial_number' => $request->serial_number,
            'complient' => $request->complient,
            'completenes' => $request->unit,
            'passcode' => $request->passcode,
            'notes' => $request->notes,
            'service_date' => date("Y-m-d"),
            'estimated_cost' => $request->estimated_cost,
            'pickup_date' => null,
            'payment_method' => null,
            'payment' => null,
            'cashback' => null,
            'status' => $request->status
        ]);

        return redirect()->back()->with('berhasil', 'Anda telah berhasil menambah data service!!');
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
