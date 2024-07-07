<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\TestImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

//    public function test(Request $request)
//    {
//        try {
//            Excel::import(new TestImport, request()->file('file'));
//        }catch (\Exception $exception){
//            dd($exception);
//            return back()->with('failed','nooooo');
//        }
//        return back()->with('success','done');
//    }
}
