<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailForward extends Model
{
    use HasFactory;
    protected $table = 'tb_detail_forward';
    protected $fillable = ['id_detail_forward','id_forward','tujuan_disposisi','status','tgl_dibaca','created_at','update_at'];
    protected $primaryKey = 'id_detail_forward';
}
