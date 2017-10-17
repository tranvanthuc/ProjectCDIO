<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject; use DB; use App\Report;
use Auth; use DateTime;


class SubjectController extends Controller
{
    // add subject
	public function getAddSubject()
	{
		return view('sb-admin.subject.add');
	}

	public function postAddSubject(Request $request)
	{
		$subject = new Subject;
		$subject->name = $request->subject;
		$subject->save();

		$report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added subject: ". $subject->name ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();
    	return redirect()->route('getListSubjects')->with(['flash_level' => 'success', 'flash_message' => 'Added subject Success !']);
	}

    // edit subject
    public function getEditSubject($id)
    {
        $subject = Subject::find($id);
        return view('sb-admin.subject.edit', compact('subject'));
    }

    public function postEditSubject(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->name =$request->subject;
        $subject->save();

        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited subject: ". $subject->name ;
        $report->updated_at = new DateTime;
        $report->save();
        return redirect()->route('getListSubjects')->with(['flash_level' => 'success', 'flash_message' => 'Edited subject Success !']);
    }

    // delete subject 
    public function getDelSubject(Request $request, $id)
    {
        $subject = Subject::find($id);

        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted subject: ". $subject->name ;
        $report->updated_at = new DateTime;
        $report->save();

        $subject->delete();
        return redirect()->route('getListSubjects')->with(['flash_level' => 'success', 'flash_message' => 'Deleted subject Success !']);
    }

    public function getListSubjects()
    {
    	
    	if(request()->has('filter'))
    	{
    		$listSubjects = Subject::orderBy('name',request('filter'))
                ->paginate(10)->appends('filter',request('filter'));
    	}
    	else if(request()->has('Z-A'))
    	{
    		$listSubjects = Subject::orderBy('name',request('filter'))->paginate(5);
    	}
    	else {
    		$listSubjects = Subject::orderBy('created_at', 'desc')->paginate(10);
    	}
    	return view('sb-admin.subject.list', compact('listSubjects'));
    }
}
