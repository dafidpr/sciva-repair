<?php

namespace App\Http\Controllers;

use App\Models\Repaire_service;
use Illuminate\Http\Request;

class RepaireController extends Controller
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
            'repaire' => Repaire_service::all()
        ];

        return view('masterdata.data_jasa', $data);
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
        Repaire_service::create([
            'repaire_code' => $request->repaire_code,
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('berhasil', 'Anda telah menambah data!!');
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
        $data = Repaire_service::find($id);

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
    public function update(Request $request)
    {
        //
        Repaire_service::where('id', $request->id)->update([
            'repaire_code' => $request->repaire_code,
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('berhasil', 'Anda telah mengubah data!!');
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
        Repaire_service::where('id', $id)->delete();

        return redirect()->back()->with('berhasil', 'Data telah anda hapus!!');
    }
}
