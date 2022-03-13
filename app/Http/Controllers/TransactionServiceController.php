<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Commision;
use App\Models\Company_profile;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Receivable;
use App\Models\Repaire_service;
use App\Models\Setting;
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
        $no_nota = $id = IdGenerator::generate(['table' => 'transaction_services', 'field' => 'transaction_code', 'length' => 12, 'prefix' => 'SRV' . date('dmy'), 'reset_on_prefix_change' => true]);
        //output: INV-000001

        $data = [
            'service' => Transaction_service::orderBy('service_date', 'desc')->get(),
            "customer" => Customer::all(),
            "user" => User::where('username', '!=', 'root')->get(),
            'nota' => $no_nota,
            'product' => Product::all(),
            'repaire' => Repaire_service::all(),
            'wa' => Setting::where('options', 'format_wa')->first(),
            'sms' => Setting::where('options', 'format_sms')->first(),
            'time' => 'all',
            'all_status' => 'all_status',
            'proses' => false,
            'waiting_sparepart' => false,
            'finished' => false,
            'cancelled' => false,
            'take' => false,
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
    public function json_service3($id)
    {
        //
        $data = [
            'transact' => Transaction_service::where('transaction_code', $id)->first(),
            'bt' => Setting::where('options', 'batas_servis')->first()
        ];
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

        $service = Transaction_service::create([
            'customer_id' => $request->id_customer,
            'user_id' => Auth::guard('web')->user()->id,
            'transaction_code' => $request->transaction_code,
            'unit' => ucwords($request->unit),
            'serial_number' => $request->serial_number,
            'complient' => ucwords($request->complient),
            'completenes' => ucwords($request->completenes),
            'passcode' => $request->passcode,
            'notes' => ucwords($request->notes),
            'service_date' => date("Y-m-d"),
            'estimated_cost' => $request->estimated_cost,
            'pickup_date' => null,
            'payment_method' => null,
            'payment' => null,
            'cashback' => null,
            'status' => $request->status,
            'technician' => null
        ]);
        // $company = Company_profile::find(1);
        // $footer = Setting::where('options', 'footer_nota_servis')->first();

        // $pdf = PDF::loadView('cetak.servismasuk', compact('service', 'company', 'footer'));
        // return $pdf->stream('Struk_service');

        return redirect('/admin/servis')->with('berhasil', 'Anda telah berhasil menambah data service!!')->withInput(['print_s_masuk' => $service->id]);
    }

    public function service_masuk($id)
    {
        $service = Transaction_service::find($id);
        $company = Company_profile::find(1);
        $footer = Setting::where('options', 'footer_nota_servis')->first();

        return view('cetak.servismasuk', compact('service', 'company', 'footer'));
        // $pdf = PDF::loadView('cetak.servismasuk', compact('service', 'company', 'footer'));
        // return $pdf->stream('Struk_service');
    }
    public function service_masuk_epson($id)
    {
        $service = Transaction_service::find($id);
        $company = Company_profile::find(1);
        $footer = Setting::where('options', 'footer_nota_servis_ep')->first();

        return view('cetak.print_servis_masuk', compact('service', 'company', 'footer'));
        // $pdf = PDF::loadView('cetak.servismasuk', compact('service', 'company', 'footer'));
        // return $pdf->stream('Struk_service');
    }

    public function create_customer($telephone, $name, $address, Request $request)
    {
        $cus = Customer::create([
            'name' => $name,
            'telephone' => $telephone,
            'address' => $address,
            'password' => bcrypt($telephone),
            'type' => 'umum',
        ]);

        return json_encode($cus);

        // return redirect('/admin/servis')->with('berhasil', 'Anda berhasil menambah Data Pelanggan!!');
    }

    public function serviceSelesai(request $request)
    {
        $rules = [
            'sub_total' => 'required'
        ];
        $messages = [
            'sub_total.required' => 'Data Kosong!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal', 'Proses Input yang anda lakukan gagal, mohon untuk cek data kembali!!');
        }

        $data = $request->all();

        if ($request->input_product_id != null) {

            //input sparepart
            if (count($data['input_product_id']) > 0) {
                foreach ($data['input_product_id'] as $key => $i) {
                    $product = $data['input_product_id'][$key];
                    $hpp_tot = $request->input_product_hpp[$key] * $request->input_product_qty[$key];

                    // dd($product);
                    Transaction_service_detail::create([
                        'transaction_id' => $request->transaction_id,
                        'repaire_id' => null,
                        'sparepart_id' => $request->input_product_id[$key],
                        'hpp' => $request->input_product_hpp[$key],
                        'total' => $request->input_product_total[$key],
                        'qty' => $request->input_product_qty[$key],
                        'discount' => $request->input_product_dis[$key],
                        'sub_total' => $request->input_product_subtot[$key],
                    ]);
                }
            }

            if (count($data['input_product_qty']) > 0) {
                foreach ($data['input_product_qty'] as $item => $v) {
                    $p = Product::where('id', $data['input_product_id'][$item])->get();
                    foreach ($p as $key) {
                        # code...
                        $updateqtyproduct = $key->stock - $data['input_product_qty'][$item];
                    }
                    $q = [
                        'stock' => $updateqtyproduct
                    ];

                    Product::where('id', $data['input_product_id'][$item])->update($q);
                    // dd($value);
                }
            }
        }

        if ($request->input_jasa_id != null) {

            //input Jasa
            if (count($data['input_jasa_id']) > 0) {
                foreach ($data['input_jasa_id'] as $key => $i) {
                    $product = $data['input_jasa_id'][$key];

                    // dd($product);
                    Transaction_service_detail::create([
                        'transaction_id' => $request->transaction_id,
                        'repaire_id' => $request->input_jasa_id[$key],
                        'sparepart_id' => null,
                        'total' => $request->input_jasa_price[$key],
                        'qty' => 1,
                        'discount' => null,
                        'sub_total' => $request->input_jasa_price[$key],
                    ]);
                }
            }
        }



        // dd($request->all());

        $persent = Auth::guard('web')->user()->commission / 100;
        $t_com = $request->subtot_jasa * $persent;

        Commision::create([
            'user_id' => Auth::guard('web')->user()->id,
            'servis_id' => $request->transaction_id,
            'total' => $t_com
        ]);

        $tech = User::find($request->technician);

        $t_com_t = $request->subtot_jasa * $tech->commission / 100;

        Commision::create([
            'user_id' => $tech->id,
            'servis_id' => $request->transaction_id,
            'total' => $t_com_t
        ]);

        Transaction_service::where('id', $request->transaction_id)->update([
            'user_id' => Auth::guard('web')->user()->id,
            'discount' => $request->total_discount,
            'total' => $request->sub_total,
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
        $ser = Transaction_service::where('transaction_code', $request->transaction_code)->update([
            'pickup_date' => date('Y-m-d'),
            'payment_method' => $request->method,
            'payment' => $request->payment,
            'discount' => $request->discount,
            'cashback' => abs($request->cashback),
            'status' => 'take'
        ]);
        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);

        $ser2 = Transaction_service::where('transaction_code', $request->transaction_code)->first();
        if ($request->payment >= $ser2->total) {

            $nom = $ser2->total;
        } elseif ($request->payment < $ser2->total) {

            $nom = $request->payment;
        }
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => $nom,
            'description' => 'Unit Servis ' . $request->transaction_code . " telah diambil",
            'source' => 'income'
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

        return redirect()->back()->with('berhasil', 'Unit Servis telah diambil!!')->withInput(['print_s_diambil' => $request->id_sv]);
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
            'status' => $request->status,
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

    public function batalServis($id, $st)
    {
        $ser = Transaction_service::where('id', $id)->first();

        Transaction_service::where('id', $id)->update([
            'user_id' => Auth::guard('web')->user()->id,
            'total' => $st,
            'status' => 'cancelled'
        ]);

        $persent = Auth::guard('web')->user()->commission / 100;
        $t_com = $st * $persent;

        Commision::create([
            'user_id' => Auth::guard('web')->user()->id,
            'servis_id' => $ser->id,
            'total' => $t_com
        ]);

        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => 0,
            'description' => 'Servis ' . $ser->transaction_code . " telah dibatalkan",
            'source' => 'expenditure'
        ]);

        return redirect('/admin/servis')->with('error', 'Anda telah membatalkan Service!!');
    }

    public function filter(Request $request)
    {
        $no_nota = $id = IdGenerator::generate(['table' => 'transaction_services', 'field' => 'transaction_code', 'length' => 12, 'prefix' => 'SRV' . date('dmy'), 'reset_on_prefix_change' => true]);
        //output: INV-000001
        // dd($request->all());
        if ($request->time == 'all') {
            if ($request->all_status !== null) {

                return redirect('/admin/servis');
            } else {

                $data = [
                    'service' => Transaction_service::where('status', $request->proses)->orWhere('status', $request->waiting_sparepart)->orWhere('status', $request->finished)->orWhere('status', $request->cancelled)->orWhere('status', $request->take)->get(),
                    "customer" => Customer::all(),
                    "user" => User::where('username', '!=', 'root')->get(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all(),
                    'wa' => Setting::where('options', 'format_wa')->first(),
                    'sms' => Setting::where('options', 'format_sms')->first(),
                    'time' => $request->time,
                    'all_status' => 'kk',
                    'proses' => $request->proses,
                    'waiting_sparepart' => $request->waiting_sparepart,
                    'finished' => $request->finished,
                    'cancelled' => $request->cancelled,
                    'take' => $request->take,
                ];
                return view('content.servis', $data);
            }
        } elseif ($request->time == 'now') {
            if ($request->all_status !== null) {

                $data = [
                    'service' => Transaction_service::whereBetween('service_date', [date('Y-m-d'), date('Y-m-d')])->get(),
                    "customer" => Customer::all(),
                    "user" => User::where('username', '!=', 'root')->get(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all(),
                    'wa' => Setting::where('options', 'format_wa')->first(),
                    'sms' => Setting::where('options', 'format_sms')->first(),
                    'time' => $request->time,
                    'all_status' => 'all_status',
                    'proses' => $request->proses,
                    'waiting_sparepart' => $request->waiting_sparepart,
                    'finished' => $request->finished,
                    'cancelled' => $request->cancelled,
                    'take' => $request->take,
                ];
                return view('content.servis', $data);
            } else {

                $data = [
                    'service' => Transaction_service::whereDate('service_date', date('Y-m-d'))->whereIn('status', [$request->proses, $request->waiting_sparepart, $request->finished, $request->cancelled, $request->take])->get(),
                    "customer" => Customer::all(),
                    "user" => User::where('username', '!=', 'root')->get(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all(),
                    'wa' => Setting::where('options', 'format_wa')->first(),
                    'sms' => Setting::where('options', 'format_sms')->first(),
                    'time' => $request->time,
                    'all_status' => 'kk',
                    'proses' => $request->proses,
                    'waiting_sparepart' => $request->waiting_sparepart,
                    'finished' => $request->finished,
                    'cancelled' => $request->cancelled,
                    'take' => $request->take,
                ];
                return view('content.servis', $data);
            }
        } elseif ($request->time == 'range') {
            if ($request->all_status !== null) {

                $data = [
                    'service' => Transaction_service::whereBetween('service_date', [$request->from, $request->to])->get(),
                    "customer" => Customer::all(),
                    "user" => User::where('username', '!=', 'root')->get(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all(),
                    'wa' => Setting::where('options', 'format_wa')->first(),
                    'sms' => Setting::where('options', 'format_sms')->first(),
                    'time' => $request->time,
                    'all_status' => 'all_status',
                    'proses' => $request->proses,
                    'waiting_sparepart' => $request->waiting_sparepart,
                    'finished' => $request->finished,
                    'cancelled' => $request->cancelled,
                    'take' => $request->take,
                ];

                return view('content.servis', $data);
            } else {

                $data = [
                    'service' => Transaction_service::whereBetween('service_date', [$request->from, $request->to])->whereIn('status', [$request->proses, $request->waiting_sparepart, $request->finished, $request->cancelled, $request->take])->get(),
                    "customer" => Customer::all(),
                    "user" => User::where('username', '!=', 'root')->get(),
                    'nota' => $no_nota,
                    'product' => Product::all(),
                    'repaire' => Repaire_service::all(),
                    'wa' => Setting::where('options', 'format_wa')->first(),
                    'sms' => Setting::where('options', 'format_sms')->first(),
                    'time' => $request->time,
                    'all_status' => 'kk',
                    'proses' => $request->proses,
                    'waiting_sparepart' => $request->waiting_sparepart,
                    'finished' => $request->finished,
                    'cancelled' => $request->cancelled,
                    'take' => $request->take,
                ];
                return view('content.servis', $data);
            }
        }
    }

    public function print_take($id)
    {
        $data = [
            'company' => Company_profile::find(1),
            'service' => Transaction_service::find($id),
            'service_detail' => Transaction_service_detail::where('transaction_id', $id)->get(),
            'footer' => Setting::where('options', 'footer_nota_servis_take')->first()
        ];

        return view('cetak.servis_take', $data);
        // $pdf = PDF::loadView('cetak.servis_take', $data);
        // return $pdf->stream('Struk_service');
    }
    public function print_take_epson($id)
    {
        $data = [
            'company' => Company_profile::find(1),
            'service' => Transaction_service::find($id),
            'service_detail' => Transaction_service_detail::where('transaction_id', $id)->get(),
            'footer' => Setting::where('options', 'footer_nota_servis_take_ep')->first()
        ];

        return view('cetak.print_servis_diambil', $data);
        // $pdf = PDF::loadView('cetak.servis_take', $data);
        // return $pdf->stream('Struk_service');
    }
}
