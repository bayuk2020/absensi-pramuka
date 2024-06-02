<?php

namespace App\Exports;

use App\Models\User01;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User01::all()->where('roles', 'ADMIN');
    }
}
