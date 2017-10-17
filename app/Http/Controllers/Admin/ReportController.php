<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;
use DB;

class ReportController extends Controller
{
    public function getReport()
    {
    	$list = Report::orderBy('created_at', 'desc')->get(); 
    	return view('sb-admin.report.report', compact('list'));
    }

    //getDelReport
    public function getDelReport()
    {
    	DB::table('reports')->truncate();
    	return redirect()->route('getReport')->with(['flash_level' => 'success', 'flash_message' => 'Deleted all report Success !']);
    }
}
