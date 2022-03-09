<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memoModel extends Model
{
    use HasFactory;
    protected $table = 'tb_memo';
    protected $fillable = ['id_memo','no_surat','sifat','perihal','jabatan_pengirim','tgl_surat','isi','mengetahui','tgl_konfirm','status_konfirm','kepada','cc','lampiran','created_at','update_at'];
    protected $primaryKey = 'id_memo';
}
