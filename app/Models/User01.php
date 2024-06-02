<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User01 extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'nta',
        'roles',
        'username',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_tlp',
        'id_golongan',
        'jabatan',
        'foto'
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    public function golongan(){
        return $this -> belongsTo('App\Models\Golongan', 'id_golongan');
    }

    protected $hidden = [];
}
