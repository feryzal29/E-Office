<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'tb_surat';
    protected $fillable = ['id_surat','no_surat','sifat','pengirim','alamat','tgl','perihal','kepada','file','isi','pengirim_disposisi','created_at','update_at','tgl_dilihat'];
    protected $primaryKey = 'id_surat';
}
