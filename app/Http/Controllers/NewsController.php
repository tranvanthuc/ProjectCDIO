<?php

namespace App\Http\Controllers;

use Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Major;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\News;
use App\User;
use App\Subject;
use App\Report;
use DateTime;
use DB;
use File;
use Session;use Validator;
use Image;
use URL;

class NewsController extends Controller
{

    //get new detail
    public function getNewsDetail($id)
    {
        //increse viewed

    	$increse = 'news'. $id;
    	if(!Session::has($increse)){
    		News::where('id',$id )->increment('viewed');
        } // check session has viewed
        else {
        	Session::flush();
            // Session::flush(); // remove all data in session
        }
        $news = News::find($id);
        $listSuggestNews = News::where('status', 1)->where('major_id',  Auth::user()->major_id)->take(5)->get();
        $listMajors = Major::orderBy('name')->get();
        $listMajorsTop = DB::table('news')
        ->join('majors', 'news.major_id', '=' , 'majors.id')
        ->select('majors.id as id','majors.name as name', DB::raw('count(news.id) as numberOfNews'))
        ->groupBy('name')
        ->orderBy('numberOfNews', 'desc')
        ->take(5)
        ->get();
        $listNewsSameMajor = News::where('major_id', $news->major_id)
                                ->where('id','<>', $id)
                                ->take(3)->get();

        return view('user.myNewsDetail', compact('news', 'listSuggestNews', 'listMajorsTop','listMajors', 'listNewsSameMajor'));
    }

    //getAddNewsUser
    // get add news
    public function getAddNewsUser()
    {
        $listMajors = Major::orderBy('name')->get();
    	$listSubjects = Subject::orderBy('name')->get();
    	return view('user.myAddNews', compact('listMajors', 'listSubjects'));
    }

// post add news
    public function postAddNewsUser(AddNewsRequest $request)
    {
    	$news = new News;
    	$news->title = $request->title;
    	$news->slug = str_slug($request->title);
    	$news->price = $request->price;
    	$news->desc = $request->desc;
    	$news->status = 0;
    	$news->user_id = Auth::user()->id;
        $news->major_id = $request->sltMajors;
    	$news->subject_id = $request->sltSubjects;

        $file = $request->file('fImage');
        $imageName = time(). '.jpg' ; // get name image

        $news->image = $imageName;
        $news->created_at = new DateTime;

        $news->save();
        //move image
        $path = storage_path('app/news/');
        $image = Image::make($file)->encode('jpg');
        $image->save($path. $news->image );

        $news->save();
        //move image

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added News: ". $news->title;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();


        return redirect()->to(URL::to('/').'/home/?option=personal')->with(['flash_level' => 'success', 'flash_message' => 'Added News Success !']);
    }

    public function getLockMyNews($id)
    {
    	$news = News::find($id);
        $news->user_lock = 1;
        $news->save();
    	// $img = storage_path('app/news/').  $news->image;
     //    if(File::exists($img))
     //    {
     //        File::delete($img);
     //    }
     //    $report = new Report;
     //    $report->user_id = Auth::user()->id;
     //    $report->content = "Deleted News: ". $news->title;
     //    $report->created_at = new DateTime;
     //    $report->updated_at = new DateTime;
     //    $report->save();

     //    $news->delete();

    	return redirect()->to(URL::to('/').'/home/?option=personal');
    }

    public function getEditNewsUser($id)
    {
        $news = News::find($id);
        $listMajors = Major::orderBy('name')->get();
        $listSubjects = Subject::orderBy('name')->get();
        return view('user.myEditNews', compact('news', 'listMajors', 'listSubjects'));
    }

    public function postEditNewsUser(EditNewsRequest $request,$id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = str_slug($request->title);
        $news->price = $request->price;
        $news->desc = $request->desc;
        // $news->user_id = Auth::user()->id;
        $news->major_id = $request->sltMajors;
        $news->subject_id = $request->sltSubjects;
        
        if($request->file('fImage') !=null )
        {
            $path = storage_path('app/news/') ;
            if(File::exists($path . $news->image))
            {
                File::delete($path . $news->image);
                $news->image = "";
            }
            $imageName = time() . '.jpg';
            $news->image = $imageName ;

            $file = $request->file('fImage');
            $path = storage_path('app/news/');
            $image = Image::make($file)->encode('jpg');
            $image->save($path. $news->image );

        }

        $news->updated_at = new DateTime;

        $news->save();
        //move image
        ;

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited News: ". $news->title;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        return redirect()->to(URL::to('/').'/home/?option=personal');
    }

    public function getNewsInMajor($id)
    {
        $listMajors = Major::orderBy('name')->get();
        $major = Major::find($id);

        //danh sach nhung bai dang moi nhat
        $listNewsOption = News::where('status', 1)
        ->where('major_id', '=', $id)
        ->orderBy('created_at', 'desc')->paginate(10)->appends('option', request('option'));
            //lay 3 chuyen nganh co nhieu bai dang nhat
        $listMajorsTop = DB::table('news')
        ->join('majors', 'news.major_id', '=' , 'majors.id')
        ->select('majors.id as id','majors.name as name', DB::raw('count(news.id) as numberOfNews'))
        ->groupBy('name')
        ->orderBy('numberOfNews', 'desc')
        ->take(5)
        ->get();


        
        return view('user.myMajor', compact('major','listNewsOption', 'listMajors', 'listMajorsTop', 'option'));
    }
    
}