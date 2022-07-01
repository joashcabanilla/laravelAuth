<?php

namespace App\Imports;

use App\Models\importUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserInfoImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new importUser([
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'birthdate' => $row['birthdate'],
            'age' => $row['age'],
            'birthplace' => $row['birthplace'],
            'phone_number' => $row['phone_number'],
            'address' => $row['address'],
            'email' => $row['email'],
            'password' =>  Hash::make($row['password']),
        ]);
    }
}
