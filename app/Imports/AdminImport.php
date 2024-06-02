<?php

namespace App\Imports;

use App\Models\User01;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User01([
            //
        ]);
    }
}
