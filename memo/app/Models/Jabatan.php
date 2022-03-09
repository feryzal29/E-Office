<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';
    protected $fillable = ['id','jabatan','created_at','update_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}                                                               
