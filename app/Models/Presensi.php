<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = "presensi";

    protected $fillable = [
        'id_user',
        'tanggal_absen',
        'j_masuk',
        'foto',
        'ket',
    ];

    protected $hidden = [];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function datauser(){
        return $this -> belongsTo('App\Models\User01', 'id_user');
    }
//ta jelasin dek 
//yang rekap itu isinya tabel presensi rekapcontroller
//yang presensi itu isinya eksekusi buat absen masuknya di presensicontroller
//iya sek tak memahami
}
