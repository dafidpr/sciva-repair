<?php

namespace App\Http\Controllers;

use App\Models\Company_profile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ['company' => Company_profile::find(1)];

        return view('setting.profil_toko', $data);
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
        if ($request->logo !== null) {
            $imgName = $request->logo->getClientOriginalName() . '-' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('tmp/asset/images'), $imgName);

            Company_profile::where('id', 1)->update([
                'name' => $request->name,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'fax' => $request->fax,
                'email' => $request->email,
                'instagram' => $request->instagram,
                'logo' => $imgName,
            ]);

            return redirect()->back()->with('berhasil', 'Profile telah anda Ubah!!');
        } else {
            Company_profile::where('id', 1)->update([
                'name' => $request->name,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'fax' => $request->fax,
                'email' => $request->email,
                'instagram' => $request->instagram,
                // 'logo' => null,
            ]);

            return redirect()->back()->with('berhasil', 'Profile telah anda Ubah!!');
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
