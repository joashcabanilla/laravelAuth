<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class exportUser extends Model
{
    use HasFactory;
    protected $table ="users";

    public static function getUserInfo(){
        $records = DB::table('users')->select(
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
        'password',)->get()->toArray();
        return $records;
    }
}
