<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Debt_detail;
use App\Models\Purchase_detail;
use App\Models\Receivable_detail;
use App\Models\Sale_detail;
use App\Models\Stock;
use App\Models\Stock_opname;
use App\Models\Transaction_service;
use App\Models\Transaction_service_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $label         = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


        for ($bulan = 1; $bulan < 13; $bulan++) {
            $b = Sale_detail::whereMonth('created_at', '=', $bulan)->sum('sub_total');
            $b2 = Sale_detail::whereMonth('created_at', '=', $bulan)->sum('hpp');
            $c = Transaction_service::where('status', 'take')->whereMonth('created_at', '=', $bulan)->sum('total');
            $c2 = Transaction_service::where('status', 'take')->whereMonth('created_at', '=', $bulan)->sum('discount');
            $c3 = Transaction_service::where('status', 'take')->whereMonth('created_at', '=', $bulan)->get();
            $f = Cash::where('source', 'other_income')->whereMonth('created_at', '=', $bulan)->sum('nominal');
            $g = Cash::where('source', 'other_expenditure')->whereMonth('created_at', '=', $bulan)->sum('nominal');
            $i = Transaction_service_detail::whereMonth('created_at', '=', $bulan)->sum('hpp');
            $k2 = Stock_opname::where('value', '<', 0)->whereMonth('created_at', '=', $bulan)->sum('value');
            $j2 = Stock::whereMonth('created_at', '=', $bulan)->where('type', 'out')->sum('value');

            $no_hpp2 = 0;
            foreach ($c3 as $item) {
                $details_hpp = Transaction_service_detail::where('transaction_id', $item->id)->get();
                foreach ($details_hpp as $val) {
                    $no_hpp2 += $val->hpp;
                }
            }
            // dd($no_hpp2);

            $ex_kas     = collect(DB::SELECT("SELECT sum(nominal) AS total from cashes where source IN ('other_expenditure', 'expenditure') AND month(created_at)='$bulan'"))->first();

            $in_kas     = collect(DB::SELECT("SELECT sum(nominal) AS total from cashes where source IN ('other_income', 'income') AND month(created_at)='$bulan'"))->first();


            $kas_ex[] = ($b + ($c - $c2) + $f) - ($g + $b2 + abs($k2) + $j2 + $no_hpp2);
        }


        // $kas_in = collect(DB::select("SELECT SUBSTRING(a.created_at, 1, 10) AS tgl, SUM(a.nominal) AS total FROM cashes a WHERE a.source = 'other_income' OR a.source = 'income' AND SUBSTRING(a.created_at, 6, 2) = DATE_FORMAT(CURDATE(), '%m') GROUP BY SUBSTRING(a.created_at, 1, 10) LIMIT 20"));

        // $kas_ex = collect(DB::select("SELECT SUBSTRING(a.created_at, 1, 10) AS tgl, SUM(a.nominal) AS total FROM cashes a WHERE a.source = 'other_expenditure' OR a.source = 'expenditure' AND SUBSTRING(a.created_at, 6, 2) = DATE_FORMAT(CURDATE(), '%m') GROUP BY SUBSTRING(a.created_at, 1, 10) LIMIT 20"));
        // $kas = collect(DB::select("SELECT SUBSTRING(a.created_at, 1, 10) AS tgl, SUM(a.nominal) AS total FROM cashes a WHERE SUBSTRING(a.created_at, 6, 2) = DATE_FORMAT(CURDATE(), '%m') GROUP BY SUBSTRING(a.created_at, 1, 10) LIMIT 20"));

        $sqllaris = collect(DB::select("SELECT a.name, COUNT(b.product_id) AS total FROM products a, sale_details b, sales c WHERE b.product_id = a.id AND b.sale_id = c.id GROUP BY b.product_id ORDER BY total DESC LIMIT 10"))->all();

        $data = [
            'terlaris' => $sqllaris,
            'kas_ex' => $kas_ex,
            'hpp' => $b2,
            'label' => $label
        ];

        return view('content.grafik', $data);
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
    public function update(Request $request)
    {
        //
        $rules = [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'newpassword2' => 'required|same:newpassword',
        ];
        $messages = [
            'oldpassword.required' => "Data tidak boleh kosong!!",
            'newpassword.required' => "Data tidak boleh kosong!!",
            'newpassword2.same' => "Mohon ulangi password baru Anda!!",
            'newpassword2.required' => "Data tidak boleh kosong!!"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->oldpassword, Auth::guard('web')->user()->password)) {

            User::where('id', Auth::guard('web')->user()->id)->update(
                ['password' => bcrypt($request->newpassword)]
            );
            return redirect()->back()->with('berhasil', 'Password telah anda Ubah!!');
        } else {
            return redirect()->back()->withInput($request->all())->with('gagal', 'Password Yang anda masukan salah!!');
        }
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
