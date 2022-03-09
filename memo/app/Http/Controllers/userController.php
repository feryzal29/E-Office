<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Alert;
use Auth;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use File;
class userController extends Controller
{
    public function index(Request $request)
    { 
        $pagination = 5;
        $query_user = User::leftJoin('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->get();
        $data_user = ['getuser' => $query_user];
        return view('user.listuser',$data_user)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function tambah_user()
    {
        $query = Jabatan::get();
        $data = ['getjabatan' => $query];
        return view('user.createUser',$data);
    }
    
    public function insert(Request $request)
    {
        
     
        $validated = $request->validate([
            'nip' =>'required|unique:tb_user',
            'nama' =>'required',
            'username' =>'required|unique:tb_user',
            'psw' =>'required',
            'jk' => 'required',
            'level' => 'required',
            'jabatan' => 'required'
        ]);
        

        if ($validated) {
            $d = new DNS2D();
            $d->setStorPath(public_path('/image/qrcode'));
            //Data yang dimasujkkan QR-Code
            $dataqr = $request->input('nip').$request->input('nama');
            //Generate
            $qrcode = $d->getBarcodePNGPath($dataqr, 'QRCODE');
            $file_name= Str::slug($dataqr);

            $hash_password = Hash::make($request->input('psw'));
            $query = User::create(
                [
                'nip' => $request->input('nip'),
                'nama' => $request->input('nama'),
                'username' => $request->input('username'),
                'password' =>  $hash_password,
                'jk' => $request->input('jk'),
                'level' => $request->input('level'),
                'jabatan_id' => $request->input('jabatan'),
                'qr_code' =>  $file_name."qrcode.png"
            ]);
            if ($query) {
                Alert::success('Berhasil...','Data Berhasil Disimpan');
                return back();
            }else {
                Alert::error('Gagal...', 'Data Gagal Disimpan');
                return back();
            }
        }
    }
    public function delete($id)
    {
        //Hapus File QRcode
        $query_first= User::where('id_user',$id)->first();
        File::delete(public_path('image/qrcode/').$query_first->qr_code);
        //Hapus Data User
        $data = User::where('id_user', $id)->delete();
      
        if ($data) {
            alert()->success('Berhasil...','Data Berhasil diHapus');
            //Alert::success('Berhasil...', 'Data Berhasil diHapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Data Belum diHapus');
            return back();
        }
        
      
    }
    public function edituser($id)
    {
        $query = Jabatan::get();
      
        $query2 = User::where('id_user',$id)->first();
        $data = ['getjabatan' => $query];
        $data2 = ['user' => $query2];
        return view('user.edituser',$data,$data2);
    }
    public function updateuser(Request $request)
    {
        $validated = $request->validate([
            'nip' =>'required',
            'nama' =>'required',
            'username' =>'required',
            'jk' => 'required',
            'level' => 'required',
            'jabatan' => 'required'
        ]);
        if ($validated) {
            //Hapus QRcode
            $query_first= User::where('id_user',$request->input('cid'))->first();
            File::delete(public_path('image/qrcode/').$query_first->qr_code);

            //buat QR-code
            $d = new DNS2D();
            $d->setStorPath(public_path('/image/qrcode'));
            //Data yang dimasujkkan QR-Code
            $dataqr = $request->input('nip').$request->input('nama');
            //Generate
            $qrcode = $d->getBarcodePNGPath($dataqr, 'QRCODE');
            $file_name= Str::slug($dataqr);

            $hash_password_update = Hash::make($request->input('psw'));
            $update = User::where('id_user', $request->input('cid'))->update([
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' =>  $hash_password_update,
            'jk' => $request->input('jk'),
            'level' => $request->input('level'),
            'jabatan_id' => $request->input('jabatan'),
            'qr_code' =>  $file_name."qrcode.png"
           ]);
           if ($update) {
                Alert::success('Berhasil...','Data Berhasil Diupdate');
                return back();
            }else {
                Alert::error('Gagal...', 'Data Gagal Diupdate');
                return back();
            }
        }
        
    }
    public function profile()
    {
        $query = Auth::user()->nip;
        $query_user = User::leftJoin('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('nip', $query)->get();
        $data_user = ['getprofile' => $query_user];
        return view('user.profile',$data_user);
    }
    public function gantipsw()
    {
        return view('user.ubahpassword');
    }
    public function updatepsw(Request $request)
    {
        $validated = $request->validate([
            'password1' =>'required',
            'password2' =>'required',
        ]);
        $pass1 = $request->input('password1');
        $pass2 = $request->input('password2');
        if ($pass2 == $pass1) {
            $hash_password_update = Hash::make($pass2);
            $update = User::where('id_user', $request->input('cid'))->update([
            'password' =>  $hash_password_update
           ]);

            Alert::success('Berhasil...','Password Berhasil Diubah');
            return back();
        }else {
            Alert::error('Gagal...', 'Ketik Password Ulang');
            return back();
        }
    }
}