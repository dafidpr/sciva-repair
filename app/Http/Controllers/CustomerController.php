<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
            'pelanggan' => Customer::all()
        ];
        return view('masterdata.pelanggan', $data);
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
        $val = [
            'name' => $request->name,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'password' => bcrypt($request->telephone),
            'type' => $request->type
        ];

        $rules = [
            'telephone' => 'unique:customers',
            'type' => 'required'
        ];
        $messages = [
            'telephone.unique' => 'Data telah ada!!',
            'type.required' => 'Data tidak boleh kosong!!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('gagal', 'Anda gagal menambah data!!');
        }
        // dd($request->all());
        Customer::create($val);

        return redirect()->back()->with('berhasil', 'Anda telah berhasil menambah data!!');
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
        $data = Customer::find($id);
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
        Customer::where('id', $id)->delete();
        return redirect()->back()->with('berhasil', 'Anda telah berhasil menghapus data!!');
    }
}
