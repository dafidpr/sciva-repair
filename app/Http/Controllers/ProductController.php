<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
            'barang' => Product::all(),
            'supplier' => Supplier::all()
        ];
        // dd(Auth::guard('web')->user()->name);
        return view('masterdata.barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $rules = [
            'barcode' => 'required|unique:products',
            'name' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required',
            'member_price' => 'required',
            'limit' => 'required',
            'supplier_id' => 'required'
        ];
        $messages = [
            'barcode.required' => 'Barcode tidak boleh kosong!!',
            'barcode.unique' => 'Barcode sudah ada!!',
            'name.required' => 'Barcode tidak boleh kosong!!',
            'selling_price.required' => 'Harga jual tidak boleh kosong!!',
            'purchase_price.required' => 'Harga beli tidak boleh kosong!!',
            'member_price.required' => 'Harga member tidak boleh kosong!!',
            'limit.required' => 'Limit tidak boleh kosong!!',
            'supplier_id.required' => 'Supplier tidak boleh kosong!!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Product::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'member_price' => $request->member_price,
            'stock' => 0,
            'limit' => $request->limit,
            'supplier_id' => $request->supplier_id
        ]);

        return redirect('/admin/barang')->with('berhasil', 'Anda berhasil menambah data baru!!');
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
        $data = Product::find($id);

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
        $rules = [
            'barcode' => 'required',
            'name' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required',
            'member_price' => 'required',
            'limit' => 'required',
            'supplier_id' => 'required'
        ];
        $messages = [
            'barcode.required' => 'Barcode tidak boleh kosong!!',
            'name.required' => 'Barcode tidak boleh kosong!!',
            'selling_price.required' => 'Harga jual tidak boleh kosong!!',
            'purchase_price.required' => 'Harga beli tidak boleh kosong!!',
            'member_price.required' => 'Harga member tidak boleh kosong!!',
            'limit.required' => 'Limit tidak boleh kosong!!',
            'supplier_id.required' => 'Supplier tidak boleh kosong!!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Product::where('id', $request->id)->update([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'member_price' => $request->member_price,
            'limit' => $request->limit,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect('/admin/barang')->with('berhasil', 'Anda berhasil merubah data!!');
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
        Product::where('id', $id)->delete();
        return redirect('/admin/barang')->with('berhasil', 'Anda telah menghapus data!!');
    }

    public function import_excel(Request $request)
    {
        $rules = [
            'file' => 'mimes:csv,xls,xlsx'
        ];
        $messages = [
            'file.mimes' => 'Format tidak di dukung!!'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with('gagal', 'Anda gagal mengimport data!');
        }

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/tmp/exc/', $nama_file);

        // import data
        $import = Excel::import(new ProductImport(), storage_path('app/public/tmp/exc/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            return redirect()->back()->with(['berhasil' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->back()->with(['gagal' => 'Data Gagal Diimport!']);
        }
    }
}
