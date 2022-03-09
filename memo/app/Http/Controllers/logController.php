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


class logController extends Controller
{
    public function index(Request $request)
    {
       
        $query = Log::join('tb_jabatan','tb_log.id_jabatan','=','tb_jabatan.id')
        ->orderBy('tb_log.jam','desc')
        ->get();
        $data = ['log'=> $query];
        return view('log',$data);
    }
}
