<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if (Auth::guard('customer')->attempt(['telephone' => $request->username, 'password' => $request->password])) {

            return redirect('/pelanggan/dashboardpelanggan')->with('berhasil', 'Anda telah berhasil Login!!');
        } elseif (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {

            User::where('username', $request->username)->update([
                'login_at' => date('Y-m-d H:i:s')
            ]);

            return redirect('/admin/dashboard')->with('berhasil', 'Anda telah berhasil Login!!');
        } else {

            return redirect('login')->with('gagal', 'Username/Telephone atau password yang anda masukan salah!!')->withInput($request->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
        if (Auth::guard('web')->check()) {

            Auth::guard('web')->logout();

            return redirect('/login')->with('berhasil', 'Anda telah Logout!!');
        } elseif (Auth::guard('customer')->check()) {

            Auth::guard('customer')->logout();

            return redirect('/login')->with('berhasil', 'Anda telah Logout!!');
        }
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
