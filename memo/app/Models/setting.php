<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $table = 'tb_setting';
    protected $fillable = ['id_setting','nama_instansi','motto','alamat','telepon','fax','logo','created_at','update_at'];
    protected $primaryKey = 'tb_setting';
}
