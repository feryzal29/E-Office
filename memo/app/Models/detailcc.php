<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailcc extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_cc';
    protected $fillable = ['id','no_surat','jabatan_id','status','created_at','update_at'];
    protected $primaryKey = 'id';
}
