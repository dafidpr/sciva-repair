<?php

namespace App\Http\Controllers;

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
        $laba = collect(DB::select("SELECT SUBSTRING(a.created_at, 1, 10) AS tgl, SUM(b.sub_total) AS total FROM sales a, sale_details b WHERE b.sale_id = a.id AND SUBSTRING(a.created_at, 6, 2) = DATE_FORMAT(CURDATE(), '%m') GROUP BY SUBSTRING(a.created_at, 1, 10) LIMIT 20"));

        $sqllaris = collect(DB::select("SELECT a.name, COUNT(b.product_id) AS total FROM products a, sale_details b, sales c WHERE b.product_id = a.id AND b.sale_id = c.id GROUP BY b.product_id ORDER BY total DESC LIMIT 10"))->all();

        $data = [
            'terlaris' => $sqllaris,
            'laba' => $laba
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
