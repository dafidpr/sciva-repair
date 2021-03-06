<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
            'user' => User::with('roles')->where('username', '!=', 'root')->get(),
            'roles' => Role::where('name', '!=', 'developer')->get()
        ];
        return view('masterdata.karyawan', $data);
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
        $rules = [
            'name' => 'required',
            'telephone' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required'
        ];
        $messages = [
            'name.required' => 'Data tidak boleh kosong!!',
            'telephone.required' => 'Data tidak boleh kosong!!',
            'telephone.unique' => 'Data sudah ada!!',
            'username.unique' => 'Data sudah ada!!',
            'password.required' => 'Data tidak boleh kosong!!',
            'address.required' => 'Data tidak boleh kosong!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('gagal', 'Anda gagal menambahkan data!!');
        }

        $user = User::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'commission' => $request->commission
        ]);
        $user->assignRole($request->role);

        return redirect('/admin/karyawan')->with('berhasil', 'Data berhasil ditambahkan!!');
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
        $data = User::find($id);
        $role = $data->getRoleNames();
        // dd($role);
        $user = [
            'data' => $data,
            'role' => $role
        ];

        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_Passbyadmin($id)
    {
        //
        $user = User::find($id);

        return view('content.ubah_password_User_admin', compact('user'));
    }
    public function ubahPassByadmin($id, Request $request)
    {
        $rules = [
            'password1' => 'required',
            'password2' => 'required|same:password1'
        ];
        $messages = [
            'password1.required' => 'Data tidak boleh kosong!!',
            'password2.required' => 'Data tidak boleh kosong!!',
            'password2.same' => 'DiMohon untuk mengulangi password!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('gagal', 'Anda gagal menambahkan data!!');
        }

        User::where('id', $id)->update([
            'password' => bcrypt($request->password1)
        ]);

        return redirect('/admin/karyawan')->with('berhasil', 'Password Karyawan telah anda Ubah!!');
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
            'address' => 'required'
        ];
        $messages = [
            'address.required' => 'Data tidak boleh kosong!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('gagal', 'Anda gagal menambahkan data!!');
        }

        $user = User::find($request->id);
        // dd($request->id);


        User::where('id', $request->id)->update([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'username' => $request->username,
            'commission' => $request->commission
        ]);
        $user->syncRoles($request->role);
        // dd($request->role);

        return redirect('/admin/karyawan')->with('berhasil', 'Data berhasil diupdate!!');
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
        User::where('id', $id)->delete();
        return redirect('/admin/karyawan')->with('berhasil', 'Data telah terhapus!!');
    }
}
