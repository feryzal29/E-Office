<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'tb_log';
    protected $fillable = ['id_log','pengguna','aksi','memo','id_jabatan','tanggal','jam','created_at','update_at'];
    protected $primaryKey = 'id_log';
}
