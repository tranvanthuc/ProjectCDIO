<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Major; use DB; use App\Report;
use Auth; use DateTime;

class MajorController extends Controller
{
    // add major
	public function getAddMajor()
	{
		return view('sb-admin.major.add');
	}

	public function postAddMajor(Request $request)
	{
		$major = new Major;
		$major->name = $request->major;
		$major->save();

		$report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added Major: ". $major->name ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();
    	return redirect()->route('getListMajors')->with(['flash_level' => 'success', 'flash_message' => 'Added Major Success !']);
	}

    // edit major
    public function getEditMajor($id)
    {
        $major = Major::find($id);
        return view('sb-admin.major.edit', compact('major'));
    }

    public function postEditMajor(Request $request, $id)
    {
        $major = Major::find($id);
        $major->name =$request->major;
        $major->save();

        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited Major: ". $major->name ;
        $report->updated_at = new DateTime;
        $report->save();
        return redirect()->route('getListMajors')->with(['flash_level' => 'success', 'flash_message' => 'Edited Major Success !']);
    }

    // delete major 
    public function getDelMajor(Request $request, $id)
    {
        $major = Major::find($id);

        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted Major: ". $major->name ;
        $report->updated_at = new DateTime;
        $report->save();

        $major->delete();
        return redirect()->route('getListMajors')->with(['flash_level' => 'success', 'flash_message' => 'Deleted Major Success !']);
    }

    public function getListMajors()
    {
    	
    	if(request()->has('filter'))
    	{
    		$listMajors = Major::orderBy('name',request('filter'))
                ->paginate(10)->appends('filter',request('filter'));
    	}
    	else if(request()->has('Z-A'))
    	{
    		$listMajors = Major::orderBy('name',request('filter'))->paginate(10);
    	}
    	else {
    		$listMajors = Major::paginate(10);
    	}
    	return view('sb-admin.major.list', compact('listMajors'));
    }
}
