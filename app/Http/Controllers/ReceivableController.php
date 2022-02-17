<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Debt;
use App\Models\Receivable;
use App\Models\Receivable_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReceivableController extends Controller
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
            'receivable' => Receivable::all()
        ];
        return view('transaksi.piutang', $data);
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
        $d = Receivable::find($request->receivable_id);
        $payment = $request->payment;
        $a = $d->payment + $payment;
        $remainder = $d->remainder - $payment;

        Receivable_detail::create([
            'receivable_id' => $request->receivable_id,
            'payment_date' => date('Y-m-d'),
            'nominal' => $request->payment,
            'user_id' => Auth::guard('web')->user()->id
        ]);

        if ($remainder == 0) {
            Receivable::where('id', $request->receivable_id)->update([
                'payment' => $a,
                'remainder' => $remainder,
                'status' => 'paid off'
            ]);
        } else {
            Receivable::where('id', $request->receivable_id)->update([
                'payment' => $a,
                'remainder' => $remainder,
            ]);
        }

        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => $payment,
            'description' => 'Penerimaan Piutang',
            'source' => 'income'
        ]);
        return redirect()->back()->with('berhasil', 'pembayaran piutang berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay_receivable($id)
    {
        //
        $data = [
            'receivable' => Receivable::find($id),
            'detail' => Receivable_detail::where('receivable_id', $id)->get()
        ];
        return view('transaksi.pay_receivable', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_receivable($id)
    {
        //
        $a = Receivable_detail::find($id);
        $d = Receivable::find($a->receivable_id);

        $payment = $d->payment - $a->nominal;
        $remainder = $d->remainder + $a->nominal;

        if ($d->status == 'paid off') {

            $data = [
                'payment' => $payment,
                'remainder' => abs($remainder),
                'status' => 'not yet paid',
            ];

            Receivable::where('id', $a->receivable_id)->update($data);
            Receivable_detail::where('id', $id)->delete();
        } else {
            $data = [
                'payment' => $payment,
                'remainder' => abs($remainder),
            ];

            Receivable::where('id', $a->receivable_id)->update($data);
            Receivable_detail::where('id', $id)->delete();
        }

        $cash_id = IdGenerator::generate(['table' => 'cashes', 'field' => 'cash_code', 'length' => 10, 'prefix' => 'CASH']);
        Cash::create([
            'user_id' => Auth::guard('web')->user()->id,
            'cash_code' => $cash_id,
            'date' => date('Y-m-d'),
            'nominal' => $a->nominal,
            'description' => 'Penerimaan Piutang di Hapus',
            'source' => 'expenditure'
        ]);

        return redirect()->back()->with('berhasil', 'Data telah di Hapus!!');
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
    public function detail_receivable($id)
    {
        //
        $data = [
            'receivable' => Receivable_detail::where('receivable_id', $id)->get()
        ];

        return view('transaksi.detail_receivable', $data);
    }
}
