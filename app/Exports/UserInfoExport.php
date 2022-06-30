<?php

namespace App\Exports;

use App\Models\exportUser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserInfoExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
        'id',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'age',
        'birthplace',
        'phone_number',
        'address',
        'email',
        'password'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return exportUser::all();
        return collect(exportUser::getUserInfo());
    }
}
