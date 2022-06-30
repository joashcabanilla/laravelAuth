<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
use App\Imports\UserInfoImport;
use App\Exports\UserInfoExport;

class importExportController extends Controller
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
