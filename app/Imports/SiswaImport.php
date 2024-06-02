<?php

namespace App\Imports;

use App\Models\SiswaDatadiri;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SiswaDatadiri([
            'nama' => $row[1],
            'email' => $row[2],
            'username' => $row[3],
            'email_verified_at' => $row[4],
            'password' => $row[5],
            'kelas' => $row[6],
            'nta' => $row[7],
            'tempat_lahir' => $row[8],
            'tanggal_lahir' => $row[9],
            'jenis_kelamin' => $row[10],
            'agama' => $row[11],
            'alamat' => $row[12],
            'no_tlp' => $row[13],
            'roles' => $row[14],
            'id_golongan' =>$row[15],
            'foto' =>$row[16],
            'remember_token' =>$row[17]
        ]);
    }
}
