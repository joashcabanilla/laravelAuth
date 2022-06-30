<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class importUser extends Model
{
    use HasFactory;
    protected $table ="users";
    protected $fillable = [
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
        'password',
    ];
}
