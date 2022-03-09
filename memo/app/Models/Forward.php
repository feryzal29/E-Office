<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forward extends Model
{
    use HasFactory;
    protected $table = 'tb_forward_disposisi';
    protected $fillable = ['id_forward','no_surat','pengirim','isi_disposisi','id_disposisi_frw','created_at','update_at'];
    protected $primaryKey = 'id_forward';
}
