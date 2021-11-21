<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Repaire_service;
use App\Models\Transaction_service;
use App\Models\Transaction_service_detail;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'nota' => $no_nota,
            'product' => Product::all(),
            'repaire' => Repaire_service::all()
        ];
        return view('content.servis', $data);
    }
    public function restore()
    {
        //
        $data = [
            'service' => Transaction_service::onlyTrashed()->get()
        ];
        return view('restore.servis', $data);
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
    public function select_repaire($id)
    {
        //
        $data = Repaire_service::find($id);
        return json_encode($data);
    }

    public function json_service($id)
    {
        //
        $data = Transaction_service::find($id);
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
            'user_id' => null,
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

    public function create_customer(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'password' => $request->telephone,
            'type' => 'umum',
        ]);

        return redirect()->back()->with('berhasil', 'Anda berhasil menambah Data Pelanggan!!');
    }

    public function serviceSelesai(request $request)
    {

        $data = $request->all();

        if (count($data['sparepart']) > 0) {
            foreach ($data['sparepart'] as $key => $i) {
                $product = $data['sparepart'][$key];

                // dd($product);
                Transaction_service_detail::create([
                    'transaction_id' => $request->transaction_id,
                    'repaire_id' => $request->jasa[$key],
                    'sparepart_id' => $request->sparepart[$key],
                    'total' => $request->total,
                    'discount' => $request->discount,
                    'sub_total' => $request->sub_total,
                ]);
            }
        }



        // dd($request->all());


        Transaction_service::where('id', $request->transaction_id)->update([
            'user_id' => Auth::guard('web')->user()->id,
            'total' => $request->total,
            'status' => 'finished'
        ]);

        return redirect()->back()->with('berhasil', 'Transaksi Telah selesai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_service($id)
    {
        //
        $data = Transaction_service::find($id);

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
        $data = [
            'customer' => Customer::all(),
            'ts' => Transaction_service::find($id)
        ];

        return view('content.editservis', $data);
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
        Transaction_service::where('id', $id)->update([
            'customer_id' => $request->customer_id,
            'unit' => $request->unit,
            'serial_number' => $request->serial_number,
            'complient' => $request->complient,
            'completenes' => $request->unit,
            'passcode' => $request->passcode,
            'notes' => $request->notes,
            'estimated_cost' => $request->estimated_cost,
        ]);
        return redirect('/admin/servis')->with('berhasil', 'Anda telah mengubah data!!');
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
        Transaction_service::where('id', $id)->delete();

        return redirect('/admin/servis')->with('berhasil', 'Anda berhasil menghapus data!!');
    }
    public function destroy2($id)
    {
        //
        Transaction_service::where('id', $id)->forceDelete();

        return redirect('/admin/servis')->with('berhasil', 'Anda berhasil menghapus data!!');
    }
}
