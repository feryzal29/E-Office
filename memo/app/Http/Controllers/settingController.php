<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Alert;

class settingController extends Controller
{
   public function index()
   {
      return view('setting');
   }
   public function insert(Request $request)
   {
       $validated = $request->validate([
           'instansi' => 'required',
           'moto' => 'required',
           'alamat' => 'required',
           'telp' => 'required',
           'fax' => 'required',
           'logo.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

        if ($request->hasfile('logo')) {            
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
            $request->file('logo')->move(public_path('image/setting'), $filename);

            $query_insert = setting::create([
                'nama_instansi' => $request->input('instansi'),
                'motto' =>$request->input('moto'),
                'alamat' => $request->input('alamat'),
                'telepon' => $request->input('telp'),
                'fax' => $request->input('fax'),
                'logo' => $filename
            ]);
        }
        // dd($query_insert);
        if ($query_insert) {
            Alert::success('Berhasil...','Setting Berhasil Disimpan');
            return back();
        }else {
            Alert::error('Gagal...', 'Setting Gagal Disimpan');
            return back();
        }
   }
   public function setting()
   {
      $query = setting::first();
      $data = ['edit'=>$query];
      return view('setting',$data);
   }
   public function edit($id)
   {
      $query = setting::where('id_setting',$id)->first();
      $data = ['settingedit'=>$query];
      return view('editsetting',$data);
   }

   public function update(Request $request)
   {
        $validated = $request->validate([
            'instansi' => 'required',
            'moto' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'fax' => 'required',
            'logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

     if ($request->hasfile('logo')) {            
         $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('logo')->getClientOriginalName());
         $request->file('logo')->move(public_path('image/setting'), $filename);

         $query_update = setting::where('id_setting',$request->input('id'))
         ->update([
             'nama_instansi' => $request->input('instansi'),
             'motto' =>$request->input('moto'),
             'alamat' => $request->input('alamat'),
             'telepon' => $request->input('telp'),
             'fax' => $request->input('fax'),
             'logo' => $filename
         ]);
     }else {
        $query_update = setting::where('id_setting',$request->input('id'))
        ->update([
            'nama_instansi' => $request->input('instansi'),
            'motto' =>$request->input('moto'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telp'),
            'fax' => $request->input('fax'),
           
        ]);
     }
     // dd($query_insert);
     if ($query_update) {
         Alert::success('Berhasil...','Setting Berhasil Diperbaharui');
         return back();
     }else {
         Alert::error('Gagal...', 'Setting Gagal Diperbaharui');
         return back();
     }
   }
}
