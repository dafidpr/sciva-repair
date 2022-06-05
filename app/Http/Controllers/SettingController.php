<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexfooter()
    {
        //
        $data = [
            'footer_sale' => Setting::where('options', 'footer_nota_sale')->first(),
            'footer_servis' => Setting::where('options', 'footer_nota_servis')->first(),
            'footer_servis_take' => Setting::where('options', 'footer_nota_servis_take')->first(),
            'footer_sale_ep' => Setting::where('options', 'footer_nota_sale_ep')->first(),
            'footer_servis_ep' => Setting::where('options', 'footer_nota_servis_ep')->first(),
            'footer_servis_take_ep' => Setting::where('options', 'footer_nota_servis_take_ep')->first(),
        ];

        return view('setting.footerNota', $data);
    }
    public function indexSms()
    {
        //
        $data = [
            'format' => Setting::where('options', 'format_sms')->first(),
        ];

        return view('setting.formatsms', $data);
    }
    public function indexWA()
    {
        //
        $data = [
            'format' => Setting::where('options', 'format_wa')->first(),
        ];

        return view('setting.formatWA', $data);
    }
    public function indexBatas()
    {
        //
        $data = [
            'batas' => Setting::where('options', 'batas_servis')->first(),
            'type' => Setting::where('options', 'batas_servis_type')->first(),
        ];

        return view('setting.bataspengambilan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateNotaSale(Request $request)
    {
        //
        if($request->value == null){

            return redirect()->back()->with('gagal', 'Data Yang Di Update Tidak boleh Kosong!!');
        }else{
            Setting::where('options', 'footer_nota_sale')->update([
                'value' => $request->value
            ]);
    
            return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
        }
    }
    public function updateNotaServis(Request $request)
    {
        //
        if($request->value == null){

            return redirect()->back()->with('gagal', 'Data Yang Di Update Tidak boleh Kosong!!');
        }else{

            Setting::where('options', 'footer_nota_servis')->update([
                'value' => $request->value
            ]);
    
            return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
        }
    }

    public function updateNotaServisTake(Request $request)
    {
        //
        if($request->value == null){

            return redirect()->back()->with('gagal', 'Data Yang Di Update Tidak boleh Kosong!!');
        }else{

            Setting::where('options', 'footer_nota_servis_take')->update([
                'value' => $request->value
            ]);
    
            return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
        }
    }
    public function updateNotaSaleEp(Request $request)
    {
        //
        Setting::where('options', 'footer_nota_sale_ep')->update([
            'value' => $request->value
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }
    public function updateNotaServisEp(Request $request)
    {
        //
        Setting::where('options', 'footer_nota_servis_ep')->update([
            'value' => $request->value
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }

    public function updateNotaServisTakeEp(Request $request)
    {
        //
        Setting::where('options', 'footer_nota_servis_take_ep')->update([
            'value' => $request->value
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }

    public function updateFormatSms(Request $request)
    {
        //
        Setting::where('options', 'format_sms')->update([
            'value' => $request->value
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }

    public function updateFormatWA(Request $request)
    {
        //
        Setting::where('options', 'format_wa')->update([
            'value' => $request->value
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }
    public function updateBatas(Request $request)
    {
        //
        Setting::where('options', 'batas_servis')->update([
            'value' => $request->batas
        ]);
        Setting::where('options', 'batas_servis_type')->update([
            'value' => $request->type
        ]);

        return redirect()->back()->with('berhasil', 'Data talah anda ubah!!');
    }

    public function format_wa()
    {
        $data = [
            'wa' => Setting::where('options', 'format_wa')->first(),
            'sms' => Setting::where('options', 'format_sms')->first(),
            'batas' => Setting::where('options', 'batas_servis')->first(),
            'batas_hari' => Setting::where('options', 'batas_servis_type')->first(),
        ];
        return json_encode($data);
    }
}
