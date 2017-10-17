<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;
use App\User;
use App\Major;
use DB;
use ImageController;

class HomeController extends Controller
{
    
    //get news Index 
 public function getIndex()
 {
        // danh sach chuyen nganh
    $listMajors = Major::orderBy('name')->get();

        //danh sach nhung bai dang moi nhat
    $listNewsOption = News::where('status', 1)->orderBy('created_at', 'desc')->paginate(10)->appends('option', request('option'));
        //lay 3 chuyen nganh co nhieu bai dang nhat
    $listMajorsTop = DB::table('news')
    ->join('majors', 'news.major_id', '=' , 'majors.id')
    ->select('majors.id as id','majors.name as name', DB::raw('count(news.id) as numberOfNews'))
    ->groupBy('name')
    ->orderBy('numberOfNews', 'desc')
    ->take(5)
    ->get();


    if(request()->has('option') && request()->option === "old")
    {
        $listNewsOption = News::where('status', 1)->orderBy('created_at', 'asc')->paginate(10)
        ->appends('option', request('option'))
        ->appends('search', request('search')); 
    } else if(request()->has('option') && request()->option === "cheap")
    {
        $listNewsOption = News::where('status', 1)->orderBy('price', 'asc')->paginate(10)
        ->appends('option', request('option')) 
        ->appends('search', request('search'));
    } else if(request()->has('option') && request()->option === "expensive")
    {
        $listNewsOption = News::where('status', 1)->orderBy('price', 'desc')->paginate(10)
        ->appends('option', request('option')) 
        ->appends('search', request('search'));
    } else if(request()->has('option') && request()->option === "littleViewed")
    {
        $listNewsOption = News::where('status', 1)->orderBy('viewed', 'asc')->paginate(10)
        ->appends('option', request('option')) 
        ->appends('search', request('search'));
    } else if(\Request::get('search') != null)
    {
        $search = \Request::get('search');
        $listNewsOption = News::where('title', 'LIKE', '%'. $search .'%')
        ->orderBy('price', 'desc')
        ->paginate(10)
        ->appends('option', request('option'))
        ->appends('search', request('search'))
        
        ->appends('page', request('page')); 
    }

    if(Auth::check())
        return redirect('/home');
    return view('user.myIndex', compact('listNewsOption', 'listMajors', 'listMajorsTop', 'option'));
}




    // get news home
public function getHome()
{
    if(Auth::user()->level_id < 3)
    {
        return redirect()->route('getDashboard')->with(['flash_level' => 'success', 'flash_message'=> 'Login Success !']);
    }
    else 
    {
            // if(Request::select())
        $listNewsOption = News::where('status', 1)->orderBy('created_at', 'desc')->paginate(10)->appends('option', request('option'));

        $listSuggestNews = News::where('status', 1)->where('major_id',  Auth::user()->major_id)->take(5)->get();
        $listMajors = Major::orderBy('name')->get();
        $listMajorsTop = DB::table('news')
        ->join('majors', 'news.major_id', '=' , 'majors.id')
        ->select('majors.id as id','majors.name as name', DB::raw('count(news.id) as numberOfNews'))
        ->groupBy('name')
        ->orderBy('numberOfNews', 'desc')
        ->take(5)
        ->get();

        if(request()->has('option') && request()->option === "old")
        {
            $listNewsOption = News::where('status', 1)->orderBy('created_at', 'asc')->paginate(10)
            ->appends('option', request('option'))
            ->appends('search', request('search')); 
        } else if(request()->has('option') && request()->option === "cheap")
        {
            $listNewsOption = News::where('status', 1)->orderBy('price', 'asc')->paginate(10)
            ->appends('option', request('option')) 
            ->appends('search', request('search'));
        } else if(request()->has('option') && request()->option === "expensive")
        {
            $listNewsOption = News::where('status', 1)->orderBy('price', 'desc')->paginate(10)
            ->appends('option', request('option')) 
            ->appends('search', request('search'));
        } else if(request()->has('option') && request()->option === "littleViewed")
        {
            $listNewsOption = News::where('status', 1)->orderBy('viewed', 'asc')->paginate(10)
            ->appends('option', request('option')) 
            ->appends('search', request('search'));
        } else if(request()->has('option') && request()->option === "personal")
        {
            $listNewsOption = News::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->paginate(10)
            ->appends('option', request('option')) 
            ->appends('search', request('search'));
        } else if(\Request::get('search') != null)
        {
            $search = \Request::get('search');
            $listNewsOption = News::where('title', 'LIKE', '%'. $search .'%')
            ->where('status', 1)
            ->orderBy('price', 'asc')
            ->paginate(10)
            ->appends('option', request('option'))
            ->appends('search', request('search'))
            
            ->appends('page', request('page')); 
        }




        return view('user.myHome', compact('listNewsOption', 'listSuggestNews','listMajors', 'listMajorsTop', 'option'));
    }

}

    

}
