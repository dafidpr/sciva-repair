<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Debt;
use App\Models\Debt_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DebtController extends Controller
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
            'debt' => Debt::all()
        ];

        return view('transaksi.hutang', $data);
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
        $data = [
            'detail' => Debt_detail::where('debt_id', $id)->get(),
            'debt' => Debt::find($id)
        ];

        return view('transaksi.pay_hutang', $data);
    }

    public function payment_debt(Request $request)
    {
        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        Debt_detail::create([
            'debt_id' => $request->purchase_id,
            'payment_date' => date('Y-m-d'),
            'nominal' => $request->payment,
            'user_id' => Auth::guard('web')->user()->id
        ]);

        $p = Debt::find($request->purchase_id);
        $payment = $p->payment + $request->payment;
        $hasil = $p->total - $payment;


        if ($hasil == 0) {

            $data = [
                'payment' => $payment,
                'remainder' => $hasil,
                'status' => 'paid_off'
            ];

            Debt::where('id', $request->purchase_id)->update($data);
        } else {
            $data = [
                'payment' => $payment,
                'remainder' => $hasil,
            ];

            Debt::where('id', $request->purchase_id)->update($data);
        }

        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => $request->payment,
            'description' => 'Pembayaran Hutang',
            'source' => 'input'
        ]);

        return redirect()->back()->with('berhasil', 'Pembayaran telah berhasil!!');
    }

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
    public function detail_debt($id)
    {
        //
        $debt_detail = Debt_detail::where('debt_id', $id)->get();

        return view('transaksi.detail_debt', compact('debt_detail'));
    }

    public function delete_detail($id)
    {
        $a = Debt_detail::find($id);
        $d = Debt::find($a->debt_id);
        $payment = $d->payment - $a->nominal;
        $remainder = $d->remainder + $a->nominal;

        if ($d->status == 'paid_off') {
            $data = [
                'payment' => $payment,
                'remainder' => $remainder,
                'status' => 'not yet paid'
            ];

            Debt::where('id', $a->debt_id)->update($data);

            Debt_detail::where('id', $id)->delete();
        } else {
            $data = [
                'payment' => $payment,
                'remainder' => abs($remainder),
            ];

            Debt::where('id', $a->debt_id)->update($data);

            Debt_detail::where('id', $id)->delete();
        }

        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => $a->nominal,
            'description' => 'Pembayaran Hutang di Hapus',
            'source' => 'input'
        ]);



        // dd($remainder);

        return redirect()->back()->with('berhasil', 'Data telah dihapus!!');
    }
}
