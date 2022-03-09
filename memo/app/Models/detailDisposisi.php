<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailDisposisi extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_disposisi';
    protected $fillable = ['id_detail_dispo','id_disposisi_detail','no_surat','kepada_disposisi','created_at','update_at'];
    protected $primaryKey = 'id_detail_dispo';
}
