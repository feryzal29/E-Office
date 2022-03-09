<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Alert;
use App;
class jabatanController extends Controller
{
    public function index()
    {
        return view('jabatan.jabatan');
    }
    public function list(Request $request)
    {
        $kode_jabatan = IdGenerator::generate(['table' => 'tb_jabatan', 'length' => 10, 'prefix' =>'JAB-']);
        $pagination = 5;
        $query = Jabatan::get();
        $data = ['jabatan' => $query];
        $data2 = ['kode' => $kode_jabatan];
        return view('jabatan.listJabatan',$data,$data2)->with('i',($request->input('page',1)-1)*$pagination);
    }
    
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => 'required',          
        ]);
      
            $query = Jabatan::create([
                'id' => $request->input('kode'),
                'jabatan' => $request->input('jabatan')
            ]);
            // if ($query) {
               
            //     Alert::success('Berhasil...', 'Data Berhasil diHapus');
            //     return back();
            // }else {
            //     return back()->with('fail','Data Gagal Ditambahkan');
            // }            
    }
    public function update(Request $request)
    {
        $quert_update = Jabatan::where('id', $request->input('kode'))
                                ->update([
                                'id' => $request->input('kode'),
                                'jabatan' => $request->input('jabatan')
        ]);

    }
    public function delete($id)
    {
        $data = Jabatan::where('id', $id)->delete();
        
      
        if ($data) {
            Alert::success('Berhasil...','Data Jabatan Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Data Jabatan Gagal Dihapus,Masih ada User yang menggunakan Nama Jabatan');
            return back();
        }
       
            
        
      
    }
}