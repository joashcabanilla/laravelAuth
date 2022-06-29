<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $collection =  User::all();
        return view('home',['collection'=>$collection]);
    }

    public function editUserData($id){
        $collection =  User::find($id);
        return view('edit',['collection'=>$collection,'id'=>$id]);
    }

    public function userUpdateData(Request $req, $id){
        $req->validate([ 
            'email' => 'email:rfc,dns'
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
