<?php

namespace App\Http\Controllers;

use App\Models\Company_profile;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Receivable;
use App\Models\Repaire_service;
use App\Models\Transaction_service;
use App\Models\Transaction_service_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

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
            "user" => User::where('username', '!=', 'root')->get(),
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
    public function json_service2($id)
    {
        //
        $data = Transaction_service::where('transaction_code', $id)->first();
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
            'status' => $request->status,
            'technician' => null
        ]);

        return redirect('/admin/servis')->with('berhasil', 'Anda telah berhasil menambah data service!!');
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

        return redirect('/admin/servis')->with('berhasil', 'Anda berhasil menambah Data Pelanggan!!');
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
            'status' => 'finished',
            'technician' => $request->technician
        ]);

        return redirect('/admin/servis')->with('berhasil', 'Transaksi Telah selesai');
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

    public function takeUnit(Request $request)
    {
        Transaction_service::where('transaction_code', $request->transaction_code)->update([
            'pickup_date' => date('Y-m-d'),
            'payment' => $request->payment,
            'cashback' => $request->cashback,
            'status' => 'take'
        ]);

        if ($request->method == 'credit') {
            Receivable::create([
                'sale_id' => null,
                'service_id' => $request->id_sv,
                'receivable_date' => date('Y-m-d'),
                'total' => abs($request->cashback),
                'payment' => 0,
                'remainder' => abs($request->cashback),
                'due_date' => $request->due_date,
                'status' => 'not yet paid'
            ]);
        }

        return redirect('/admin/servis')->with('berhasil', 'Unit Telah berhasil diambil!!');
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
    public function deletePermanent($id = null)
    {
        //
        if ($id !== null) {
            Transaction_service::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            Transaction_service::onlyTrashed()->forceDelete();
        }

        return redirect('/admin/servis/restore')->with('berhasil', 'Anda berhasil menghapus data!!');
    }
    public function restoreall($id = null)
    {
        //
        if ($id !== null) {
            Transaction_service::onlyTrashed()->where('id', $id)->restore();
        } else {
            Transaction_service::onlyTrashed()->restore();
        }

        return redirect('/admin/servis/restore');
    }

    public function batalServis($id)
    {
        Transaction_service::where('id', $id)->update([
            'user_id' => Auth::guard('web')->user()->id,
            'status' => 'cancelled'
        ]);

        return redirect('/admin/servis')->with('error', 'Anda telah membatalkan Service!!');
    }

    public function filter(Request $request)
    {
        $no_nota = $id = IdGenerator::generate(['table' => 'transaction_services', 'field' => 'transaction_code', 'length' => 15, 'prefix' => 'SRV' . date('dmY'), 'reset_on_prefix_change' => true]);
        //output: INV-000001
        // dd($request->all());
        if ($request->time == 'all') {
            if ($request->all_status !== null) {

                return redirect('/admin/servis');
            } else {

                $data = [
                    'service' => Transaction_service::where('status', $request->proses)->orWhere('status', $request->waiting_sparepart)->orWhere('status', $request->finished)->orWhere('status', $request->cancelled)->orWhere('status', $request->take)->get(),
                    "customer" => Customer::all(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all()
                ];
                return view('content.servis', $data);
            }
        } elseif ($request->time == 'now') {
            if ($request->all_status !== null) {

                $data = [
                    'service' => Transaction_service::where('service_date', date('Y-m-d'))->get(),
                    "customer" => Customer::all(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all()
                ];
                return view('content.servis', $data);
            } else {

                $data = [
                    'service' => Transaction_service::where('status', $request->proses)->orWhere('status', $request->waiting_sparepart)->orWhere('status', $request->finished)->orWhere('status', $request->cancelled)->orWhere('status', $request->take)->get(),
                    "customer" => Customer::all(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all()
                ];
                return view('content.servis', $data);
            }
        } elseif ($request->time == 'range') {
        }
    }

    public function print_take($id)
    {
        $data = [
            'company' => Company_profile::find(1),
            'service' => Transaction_service::find($id),
            'service_detail' => Transaction_service_detail::where('transaction_id', $id)->get(),
        ];

        // return view('cetak.servis_take', $data);
        $pdf = PDF::loadView('cetak.servis_take', $data);
        return $pdf->stream('Struk_service');
    }
}
