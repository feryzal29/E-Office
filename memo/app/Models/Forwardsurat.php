<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forwardsurat extends Model
{
    use HasFactory;
    protected $table = 'tb_forward_surat';
    protected $fillable = ['id_forward','id_surat','no_surat','pengirim','penerima','isi_forward','tgl_dibaca','tgl_forward','created_at','updated_at'];
    protected $primaryKey = 'id_forward';
}
