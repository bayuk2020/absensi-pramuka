<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    
    protected $table = "golongan";

    protected $fillable = [
        'id_golongan',
        'nama_golongan',
        'keterangan'
    ];

    public function data_golongans(){
        return $this -> hasMany('App\Models\User', 'id_golongan');
    }
}
