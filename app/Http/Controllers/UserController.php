<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditInfoUserRequest ;
use App\Http\Requests\EditPassUserRequest  ;
use App\Major;
use App\User;
use App\Report;
use Auth;
use DateTime; use Hash; use File;
use Image;

class UserController extends Controller
{
    public function getEditInfoUser($id)
    {
    	$listMajors = Major::get();	
		return view('user.myEditInfoUser', compact( 'listMajors'));
    }

    public function postEditInfoUser(EditInfoUserRequest $request, $id)
    {
    	$user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = ''.$request->phone;
        $user->address = $request->address;
        $user->updated_at = new DateTime;
        $user->major_id = $request->sltMajors;


        if($request->file('fImage') !=null )
        {
            $path = storage_path('app/avatars/') ;
            if(File::exists($path . $user->image))
            {
                File::delete($path . $user->image);
                $user->image = "";
            }
            $imageName = time() . '.jpg';
            $user->image = $imageName ;

            $file = $request->file('fImage');
            $path = storage_path('app/avatars/');
            $image = Image::make($file)->encode('jpg');
            $image->save($path. $user->image );

        }


        $user->save();

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        return redirect()->route('getHome')->with(['flash_level' => 'success', 'flash_message' => 'Edited User Success !']);
    }

// edit password
    public function getEditPassUser($id)
    {
    	$listMajors = Major::get();	
		return view('user.myEditPassUser', compact( 'listMajors'));
    }

    public function postEditPassUser(EditPassUserRequest $request, $id)
    {
    	$user = User::findOrFail($id);
    	if(!password_verify($request->oldPass,$user->password ) || $request->oldPass == null)
    	{
    		return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Mật khẩu cũ không đúng !']);
    	}

        $user->password = bcrypt($request->newPass);
        $user->save();

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Changed password User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

    return redirect()->route('getLogin')->with(['flash_level' => 'success', 'flash_message' => 'Đã thay đổi mật khẩu thành công !', 'username' => $user->username]);
    }
}	
