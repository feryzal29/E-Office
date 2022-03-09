<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailkpd extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_kepada';
    protected $fillable = ['id','no_surat','jabatan_id','status','kategori','created_at','update_at','id_detail_memo'];
    protected $primaryKey = 'tb_detail_kepada';
}
