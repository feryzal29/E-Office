<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $fillable = ['id_user','nip','nama','username','password','jk','jabatan_id','level','created_at','update_at','qr_code'];
    protected $primaryKey = 'id_user';
}
