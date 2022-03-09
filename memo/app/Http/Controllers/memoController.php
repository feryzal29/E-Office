<?php

namespace App\Http\Controllers;
use App\Models\Log;
use App\Models\detailkpd;
use App\Models\detailcc;
use App\Models\User;
use App\Models\memoModel;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Alert;
use Auth;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;
use File;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class memoController extends Controller
{
    public function __construct()
    {
        $this->fpdf = new Fpdf('P','mm','A4');
        
    }
    public function index(Request $request)
    {
        $jabatanid = Auth::user()->jabatan_id;
        $query = Auth::user()->nip;
        // $data1 = ['nip' => $query];
        $query_jabatan = Jabatan::whereNotIn('id',[$jabatanid])->get();
        $query_mengetahui = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('tb_user.level','kabag')->whereNotIn('tb_user.nip', [$query])->get();
        $query_user = User::join('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->whereNotIn('tb_user.nip', [$query])->get();
        // $query_bagian = User::leftJoin('tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id')->where('nip', $query)->get();
       
        $data2 = [
            'mengetahui' => $query_mengetahui,
            // 'bagian' => $query_bagian
            'jabatan' =>  $query_jabatan,
            'user' => $query_user
        ];
        return view('memo.creatememo',$data2);
    }

    public function insert(Request $request)
    {
        $kode_memo = IdGenerator::generate(['table' => 'tb_memo','field' => 'id_memo','length' => 6, 'prefix' => date('y')]);
        $jabatanid = Auth::user()->jabatan_id;
        $nama = Auth::user()->Nama;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $validated = $request->validate([
            'no_memo' => 'required',
            'sifat' => 'required',
            'perihal' => 'required',
            'mengetahui' => 'required',
            'isimemo' => 'required',
            'lampiran.*' => 'mimes:doc,docx,pdf|max:10000'
        ]);
        if ($request->hasfile('lampiran')) {
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('lampiran')->getClientOriginalName());
                $request->file('lampiran')->move(public_path('file/lampiran'), $filename);
                //Kepada
                $kpd = "";
                $kepada = $request->input('kepada');
                foreach($kepada as $value){
                    $kpd .= "$value". ",";
                }
                $kpd = substr($kpd,0,-1);
                //Tembusan
                $tembusan="";
                $cc = $request->input('cc');
                foreach ($cc as $value) {
                    $tembusan .= "$value". ",";
                }
                $tembusan = substr($tembusan,0,-1);

                //insert to database
                
                    $query = memoModel::create([
                        'id_memo' => $kode_memo,
                        'no_surat' => $request->input('no_memo'),
                        'sifat' => $request->input('sifat'),
                        'perihal' => $request->input('perihal'),
                        'jabatan_pengirim' => $jabatanid,
                        'tgl_surat' => $today,
                        'isi' => $request->input('isimemo'),
                        'mengetahui' =>  $request->input('mengetahui'),
                        'kepada' => $kpd,
                        'cc' => $tembusan,
                        'status' => '1',
                        'lampiran' => $filename
                    ]);
                
                $penerima = $request->input('penerima');
                foreach ($penerima as $value) {
                $query = detailkpd::create([
                    'no_surat' => $request->input('no_memo'),
                    'jabatan_id' => $value,
                    'status' => 'belum',
                    'id_detail_memo' => $kode_memo
                    
                ]);
                }
        }else {
            //Kepada
            $kpd = "";
            $kepada = $request->input('kepada');
            foreach($kepada as $value){
                $kpd .= "$value". ",";
            }
            $kpd = substr($kpd,0,-1);
            //Tembusan
            $tembusan="";
            $cc = $request->input('cc');
            foreach ($cc as $value) {
                $tembusan .= "$value". ",";
            }
            $tembusan = substr($tembusan,0,-1);
            //insert to database
            $query = memoModel::create([
                'id_memo' => $kode_memo,
                'no_surat' => $request->input('no_memo'),
                'sifat' => $request->input('sifat'),
                'perihal' => $request->input('perihal'),
                'jabatan_pengirim' => $jabatanid,
                'tgl_surat' => $today,
                'isi' => $request->input('isimemo'),
                'mengetahui' => $request->input('mengetahui'),
                'kepada' => $kpd,
                'cc' => $tembusan,
                'status' => '1',
            ]);
            $penerima = $request->input('penerima');
            foreach ($penerima as $value) {
            $query = detailkpd::create([
                'no_surat' => $request->input('no_memo'),
                'jabatan_id' => $value, 
                'status' => 'belum',
                'id_detail_memo' => $kode_memo
                
            ]);
            }
        }
        $log = Log::create([
            'pengguna' => $nama,
            'aksi' => "Membuat Memo",
            'memo' => $request->input('no_memo'),
            'id_jabatan' => $jabatanid,
            'tanggal' => $today,
            'jam' => $jam
        ]);
            //jika insert berhasil / dijalankan 
            if ($query) {
            Alert::success('Berhasil...','Memo Berhasil Dikirim');
            return back();
            }else {
                Alert::error('Gagal...', 'Memo Gagal Dikirim');
                return back();
            }
    }
    public function memoMasuk(Request $request)
    {
        //'tb_jabatan','tb_user.jabatan_id','=','tb_jabatan.id'
        $pagination = 5;

        if (Auth::user()->level == 'admin') {
            $query_memomasuk = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
            ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
            ->groupBy('tb_memo.id_memo')
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }else {
            $query = Auth::user()->jabatan_id;
            $query_memomasuk = memoModel::
            join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
            ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
            ->where('tb_detail_kepada.jabatan_id',$query)
            ->where('tb_memo.status_konfirm','=','2')
            //or
            ->orwhere('tb_detail_kepada.jabatan_id',$query)
            ->where('tb_memo.mengetahui','=','kosong')
            ->where('tb_memo.status_konfirm','=','1')
            
            ->Orderby('tb_memo.created_at','desc')
            ->get();
        }
        
        $data = ['memomasuk' => $query_memomasuk];
        return view('memo.memoMasuk',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function memoKeluar(Request $request)
    {
        $pagination = 5;
        $query = Auth::user()->jabatan_id;
        
        $query_keluar = memoModel::where('tb_memo.jabatan_pengirim','=',$query)
        ->Orderby('tb_memo.created_at','desc')
        ->get();

        $data = ['memokeluar' => $query_keluar];
        return view('memo.memoKeluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function detailMemo(Request $request, $id)
    {
        $pagination = 5;

        $query_detail = detailkpd::join('tb_memo','tb_detail_kepada.id_detail_memo','=','tb_memo.id_memo')
        ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
        ->join('tb_user','tb_jabatan.id','=','tb_user.jabatan_id')
        ->where('tb_memo.id_memo',$id)
        ->get();
        $data = ['detailMemo' => $query_detail];
        return view('memo.detailmemokeluar',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
   
    public function konfirm(Request $request)
    {
        $pagination = 5;
        $query = Auth::user()->jabatan_id;
       
        $query_konfirm = memoModel::join('tb_detail_kepada','tb_memo.id_memo','=','tb_detail_kepada.id_detail_memo')
        ->join('tb_jabatan','tb_memo.jabatan_pengirim','=','tb_jabatan.id')
        ->where('tb_memo.mengetahui',$query)
        ->where('tb_memo.status_konfirm','=','1')
        ->groupBy('tb_memo.id_memo')
        ->Orderby('tb_memo.created_at','desc')
        ->get();

       

        $data = ['konfirm' => $query_konfirm];
        return view('memo.konfirMemo',$data)->with('i',($request->input('page',1)-1)*$pagination);
    }
    public function accMemo($id)
    {
        $nama = Auth::user()->Nama;
        $query = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $memo = memoModel::find($id);
       
        $query_acc = memoModel::where('id_memo',$id)
            ->update([
           'tgl_konfirm'=> $today,
           'status_konfirm'=> '2'
           ]);

        //Membuat Log Aktivitas
        $log = Log::create([
            'pengguna' => $nama,
            'aksi' => "Menyetujui Memo",
            'memo' => $memo->no_surat,
            'id_jabatan' => $query,
            'tanggal' => $today,
            'jam' => $jam
        ]);

        if ($query_acc) {
            Alert::success('Disetuji...','Memo Telah disetujui');
            return back();
        }
    }
    public function tolak(Request $request)
    {
        $nama = Auth::user()->Nama;
        $query = Auth::user()->jabatan_id;
        $memo = memoModel::find($request->input('nomemo'));
        $catatan = $request->input('catatan');
        $today = date('Y-m-d');
        $jam = date('G:i:s');
        $query_acc = memoModel::where('id_memo',$request->input('nomemo'))
            ->update([
           'tgl_konfirm'=> $today,
           'status_konfirm'=> '3',
           'catatan' => $catatan
           ]);
        
        
        //Membuat Log Aktivitas
        $log = Log::create([
            'pengguna' => $nama,
            'aksi' => "Menolak Memo",
            'memo' => $memo->no_surat,
            'id_jabatan' => $query,
            'tanggal' => $today,
            'jam' => $jam
        ]);

           
        if ($query_acc) {
            Alert::success('Ditolak...','Memo Telah Ditolak');
            return back();
        }
    }
    
    public function viewmemo_pdf($id)
    {
        //update status lihat
        $jabatanid = Auth::user()->jabatan_id;
        $today = date('Y-m-d');

        $quert_update_status = detailkpd::join('tb_memo','tb_detail_kepada.id_detail_memo','=','tb_memo.id_memo')
        ->where('jabatan_id',$jabatanid)
        ->where('tb_memo.id_memo',$id)
        ->update([
            'status' => 'sudah',
            'tgl_lihat' => $today
        ]);

        //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.no_surat','=','tb_detail_kepada.no_surat')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       // ->where('tb_memo.jabatan_pengirim','=',$query)
       ->groupBy('tb_memo.no_surat')
       ->get();

       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();

       $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo.memopdf.memomasuk_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");
        //return view('memo.memopdf.memomasuk_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul", 'qrcode' => $d]);
        
    }
    public function cetakmemokeluar($id)
    {
       //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.no_surat','=','tb_detail_kepada.no_surat')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       // ->where('tb_memo.jabatan_pengirim','=',$query)
       ->groupBy('tb_memo.no_surat')
       ->get();

       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();

       $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo.memopdf.memokeluar_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");

    }
    public function cetakpdfdom($id)
    {
       //vie memo pdf
       $query_view = memoModel::join('tb_detail_kepada','tb_memo.no_surat','=','tb_detail_kepada.no_surat')
       ->join('tb_jabatan','tb_detail_kepada.jabatan_id','=','tb_jabatan.id')
       ->join('tb_user','tb_memo.jabatan_pengirim','=','tb_user.jabatan_id')
       ->where('tb_memo.id_memo','=',$id)
       // ->where('tb_memo.jabatan_pengirim','=',$query)
       ->groupBy('tb_memo.no_surat')
       ->get();

       
       $query_view3 =  Jabatan::join('tb_memo','tb_jabatan.id','=','tb_memo.jabatan_pengirim')
       ->where('tb_memo.id_memo',$id)
       ->get();
      
        $judul ="";
        foreach ($query_view as $value) {
            $jud = $value->perihal;
        }
        $judul = $jud;

        $pdf = PDF::loadview('memo.memopdf.konfirmasi_pdf',['konfir1'=>$query_view,'konfir2'=>$query_view3,'title' => "Memo $judul"]);
        return $pdf->stream("Memo-$judul.pdf");
    }
    public function hapus($id)
    {
        $nama = Auth::user()->Nama;
        $jabatanid = Auth::user()->jabatan_id;
        $today = date('Y-m-d');
        $jam = date('G:i:s');

        $query_first= memoModel::where('id_memo',$id)->first();
        File::delete(public_path('file/lampiran/').$query_first->lampiran);
        $query = memoModel::where('id_memo',$id)->delete();

        $log = Log::create([
            'pengguna' => $nama,
            'aksi' => "Hapus Memo",
            'memo' => $query_first->no_surat,
            'id_jabatan' => $jabatanid,
            'tanggal' => $today,
            'jam' => $jam
        ]);

        if ($query) {
            Alert::success('Berhasil...','Memo Berhasil Dihapus');
            return back();
        }else {
            Alert::error('Gagal...', 'Memo Gagal Dihapus');
            return back();  
        }
    }
    
}
