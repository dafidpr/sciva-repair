<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Debt;
use App\Models\Product;
use App\Models\Receivable;
use App\Models\Sale;
use App\Models\Transaction_service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sqllaris = collect(DB::select("SELECT a.name, COUNT(b.product_id) AS total FROM products a, sale_details b, sales c WHERE b.product_id = a.id AND b.sale_id = c.id GROUP BY b.product_id ORDER BY total DESC LIMIT 10"))->all();
        $csbest = collect(DB::select("SELECT b.name, COUNT(a.customer_id) AS total FROM transaction_services a, customers b WHERE a.customer_id = b.id GROUP BY a.customer_id ORDER BY total DESC LIMIT 10"))->all();
        $data = [
            'servisMasuk' => Transaction_service::paginate('10'),
            'dalamProses' => Transaction_service::where('status', 'proses')->paginate('10'),
            'servisSelesai' => Transaction_service::where('status', 'finished')->paginate('10'),
            'waitingSparepart' => Transaction_service::where('status', 'waiting sparepart')->paginate('10'),
            'servisBatal' => Transaction_service::where('status', 'cancelled')->paginate('10'),
            'receivable' => Receivable::where('status', 'not yet paid')->get(),
            'product' => Product::all(),
            'terlaris' => $sqllaris,
            'csbest' => $csbest,
            'historysale' => Sale::latest()->paginate('100'),
            'historyservis' => Transaction_service::latest()->paginate('100'),
            'historyservisdiambil' => Transaction_service::where('status', 'take')->orderBy('updated_at', 'desc')->paginate('100'),
            'historylogin' => User::where('username', '!=', 'root')->orderBy('login_at', 'desc')->paginate('100'),
        ];
        return view('dashboard.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCs()
    {
        //
        $id_i = Auth::guard('customer')->user()->id;
        $se = collect(DB::select("SELECT COUNT(a.customer_id) AS total FROM transaction_services a, customers b WHERE a.customer_id = b.id AND b.id = '$id_i' AND a.status = 'finished' ORDER BY total"))->first();
        $ws = collect(DB::select("SELECT COUNT(a.customer_id) AS total FROM transaction_services a, customers b WHERE a.customer_id = b.id AND b.id = '$id_i' AND a.status = 'waiting sparepart' ORDER BY total"))->first();
        $dp = collect(DB::select("SELECT COUNT(a.customer_id) AS total FROM transaction_services a, customers b WHERE a.customer_id = b.id AND b.id = '$id_i' AND a.status = 'proses' ORDER BY total"))->first();
        $sb = collect(DB::select("SELECT COUNT(a.customer_id) AS total FROM transaction_services a, customers b WHERE a.customer_id = b.id AND b.id = '$id_i' AND a.status = 'cancelled' ORDER BY total"))->first();
        $receivable = collect(DB::select("SELECT a.id, b.invoice, a.due_date, c.name, a.total, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, sales b, customers c WHERE a.sale_id = b.id AND c.id = b.customer_id AND c.id = '$id_i' AND a.status = 'not yet paid' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();
        $receivable2 = collect(DB::select("SELECT a.id, b.transaction_code, a.due_date, c.name, a.total, SUBSTRING(a.receivable_date, 1, 10) AS receivable_date, a.total, a.payment, a.remainder, a.status, a.due_date FROM receivables a, transaction_services b, customers c WHERE a.service_id = b.id AND c.id = b.customer_id AND c.id = '$id_i' AND a.status = 'not yet paid' ORDER BY SUBSTRING(a.receivable_date, 1, 10) ASC"))->all();

        $data = [
            'servisMasuk' => $dp->total,
            'servisSelesai' => $se->total,
            'waitingSparepart' => $ws->total,
            'batal' => $sb->total,
            'servis' => Transaction_service::where('customer_id', Auth::guard('customer')->user()->id)->get(),
            'recei' => $receivable,
            'recei2' => $receivable2,
        ];
        return view('dashboard.pelanggan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassCs(Request $request)
    {
        //
        $rules = [
            'oldPass' => 'required',
            'newPass' => 'required',
            'newPass2' => 'required|same:newPass',
        ];
        $messages = [
            'oldPass.required' => 'Data tidak boleh kosong!!',
            'newPass.required' => 'Data tidak boleh kosong!!',
            'newPass2.required' => 'Data tidak boleh kosong!!',
            'newPass2.same' => 'Mohon masukan ulang password baru!!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->oldPass, Auth::guard('customer')->user()->password)) {

            Customer::where('id', Auth::guard('customer')->user()->id)->update(
                ['password' => bcrypt($request->newPass)]
            );
            return redirect()->back()->with('berhasil', 'Password telah anda Ubah!!');
        } else {
            return redirect()->back()->withInput($request->all())->with('gagal', 'Password Yang anda masukan salah!!');
        }
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
