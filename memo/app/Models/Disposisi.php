<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'tb_disposisi';
    protected $fillable = ['id_disposisi','id_memo_disposisi','no_surat','sifat','perihal','pengirim_memo','jabatan_dis','tgl_surat','tgl_disposisi','pengirim_disposisi','isi','created_at','update_at'];
    protected $primaryKey = 'id_disposisi';
   
}
