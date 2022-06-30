<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class crudController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function editUserData($id){
        $collection =  User::find($id);
        return view('edit',['collection'=>$collection,'id'=>$id]);
    }

    public function userUpdateData(Request $req, $id){
        $req->validate([ 
            'firstname' => ['required', 'string', 'max:255','min:2'],
            'middlename' => ['required', 'string', 'max:255','min:2'],
            'lastname' => ['required', 'string', 'max:255','min:2'],
            'birthdate' => ['required'],
            'age' => ['required'],
            'birthplace' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','min:10'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','email:rfc,dns'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $userModel = User::find($id);
        $userModel->firstname = $req->input('firstname');
        $userModel->middlename = $req->input('middlename');
        $userModel->lastname = $req->input('lastname');
        $userModel->birthdate = $req->input('birthdate');
        $userModel->age = $req->input('age');
        $userModel->birthplace = $req->input('birthplace');
        $userModel->phone_number = $req->input('phone_number');
        $userModel->address = $req->input('address');
        $userModel->email = $req->input('email');
        $userModel->password = $req->input('password');
        $userModel->update();
        return redirect('/home');
    }

    public function deleteUserData($id){
        $userModel = User::find($id);
        $userModel->delete();
        return redirect('/home');
    }
}
