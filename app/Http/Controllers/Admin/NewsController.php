<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Major;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\News;use App\User;use App\Subject;
use Image;
use App\Report;
use DateTime;
use DB;
use File;
use Session;use Validator;

class NewsController extends Controller
{
// get add news
    public function getAddNews()
    {
        $listMajors = Major::orderBy('name')->get();
        $listSubjects = Subject::orderBy('name')->get();
        return view('sb-admin.news.add', compact('listMajors','listSubjects'));
    }

// post add news
    public function postAddNews(AddNewsRequest $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->slug = str_slug($request->title);
        $news->price = $request->price;
        $news->desc = $request->desc;
        $news->status = 1;
        $news->user_id = Auth::user()->id;
        $news->major_id = $request->sltMajors;
        $news->subject_id = $request->sltSubjects;

        $file = $request->file('fImage');
        $imageName = time() . '.jpg';
        $news->image = $imageName ;
        $news->created_at = new DateTime;

        $news->save();
        //move image
        $path = storage_path('app/news/');
        $image = Image::make($file)->encode('jpg');
        $image->save($path. $news->image );
       

        // $image->move('../storage/app/news' , $imageName);

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added News: ". str_limit($news->title,30);
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();


        return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Added News Success !']);
    }
// get lock news
    public function getLockNews($id)
    {
        $news = News::find($id);
        ($news->status == 0) ? $news->status=1 : $news->status=0; 
        $news->save();

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        

        if($news->status == 1){
            $report->content = "Unlocked News: ". str_limit($news->title,30);
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Unlocked News Success !']);
        }
        else {
            $report->content = "Locked News: ". str_limit($news->title,30);
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Locked News Success !']);
        }
    }

    // user lock them news
    public function getUserLockNews($id)
    {
        $news = News::find($id);
        ($news->user_lock == 0) ? $news->user_lock=1 : $news->user_lock=0; 
        $news->save();

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        

        if($news->status == 1){
            $report->content = "Unlocked User News: ". $news->title;
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Unlocked User News Success !']);
        }
        else {
            $report->content = "Locked User News: ". $news->title;
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Locked User News Success !']);
        }
    }


    //get edit news
    public function getEditNews($id)
    {
        $news = News::find($id);
        $listMajors = Major::orderBy('name')->get();
        $listSubjects = Subject::orderBy('name')->get();
        return view('sb-admin.news.edit', compact('news', 'listMajors', 'listSubjects'));
    }
//post edit news
    public function postEditNews(EditNewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = str_slug($request->title);
        $news->price = $request->price;
        $news->desc = $request->desc;
        $news->major_id = $request->sltMajors;

        if($request->file('fImage') !=null )
        {
            $path = storage_path('app/news/') ;
            if(File::exists($path . $news->image))
            {
                File::delete($path . $news->image);
                $news->image = "";
            }
            $imageName = time(). '.jpg';
            $news->image = $imageName;
            $file = $request->file('fImage');
            $path = storage_path('app/news/');
            $image = Image::make($file)->encode('jpg');
            $image->save($path. $news->image );

        }

        $news->updated_at = new DateTime;

        $news->save();

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited News: ". $news->title;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();


        return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Edited News Success !']);
    }

// get list news
    public function getListNews()
    {
        $listNews = DB::table('news')
        ->join('users', 'users.id', '=', 'news.user_id')
        ->select('news.*', 'users.level_id')
        ->orderBy('news.status')
        ->get();

        return view('sb-admin.news.list', compact('listNews'));
    }

//get delete news
    public function getDelNews($id)
    {
        $news = News::find($id);
        $img = '../storage/app/news/'.  $news->image;
        if(File::exists($img))
        {
            File::delete($img);
        }

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted News: ". str_limit($news->title,30);
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        //delete news
        $news->delete();
        return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Deleted News Success !']);
    }

//delete image display in edit news
    public function getDelImg($id)
    {
        if(Request::ajax()){
            $news = News::find($id); //4
            $img = '../storage/app/news/'.  $news->image;

                 //delete img
            if(File::exists($img))
            {
                File::delete($img);
                $news->image = "";
                $news->save();
                return "success";
            }
            return "fail";
        }
        else 
            return "Not Working" ;
        
    }

    // get delete all news
    public function getDelAllNews()
    {
        DB::table('news')->truncate();

        // delete all file in folder 
        File::cleanDirectory(storage_path('app/news'));
        return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Deleted all news Success !']);
    }

}








//-----------------------------USER --------------------------------

    
