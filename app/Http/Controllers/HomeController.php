<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Excel;
use PDF;
use App\Imports\UserInfoImport;
use App\Exports\UserInfoExport;


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

    public function importForm(){
        return view('excel.import');
    }

    public function importUser(Request $req){
        Excel::Import(new UserInfoImport, $req->file);
        return redirect('/home');
    }

    public function exportExcel(){
        return Excel::download(new UserInfoExport,'UserInfo.xlsx');
    }

    public function exportCSV(){
        return Excel::download(new UserInfoExport,'UserInfo.csv');
    }

    public function exportPDFview(){
        $collection =  User::all();
        return view('pdfView',['collection' => $collection]);
    }
    
    public function savePDF(){
        $collection =  User::all();
        $pdf = PDF::loadView('pdfSave', compact('collection'));
        return $pdf->download('UserInfo.pdf');
    }

    public function PDF(){
        $collection =  User::all();
        return view('pdfSave',['collection' => $collection]);
    }
}
