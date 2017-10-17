<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Level;
use App\SocialProvider;
use App\User;
use DateTime;
use App\Report;
use File;
use App\Http\Requests\AddUserRequest ;
use App\Http\Requests\EditUserRequest ;

class UserController extends Controller
{
    //get Add user
    public function getAddUser()
    {
    	$levels = Level::all();
    	return view('sb-admin.user.add', compact('levels'));
    }

    //post add user 
    public function postAddUser(AddUserRequest $request)
    {
    	$user = new User;
    	$user->username = $request->username;
    	$user->password = bcrypt($request->password);
    	$user->name = $request->name;
        $user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->created_at = new DateTime;
    	$user->updated_at = new DateTime;
    	$user->level_id = $request->sltLevel;

    	// $user->specialization_id = $request->sltSpec;
    	$user->save();

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edit User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();
    	return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Register Success !']);
    }

//get edit user
    public function getEditUser($id)
    {
        $user = User::find($id);
        $levels = Level::all();
        return view('sb-admin.user.edit', compact('levels', 'user'));
    }

//post edit user 
    public function postEditUser(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->created_at = new DateTime;
        $user->updated_at = new DateTime;
        $user->level_id = $request->sltLevel;

        // $user->specialization_id = $request->sltSpec;
        $user->save();

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Edited User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();
        return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Edited User Success !']);
    }

//get list
    public function getListUser()
    {
        $listUser = User::all();
        return view('sb-admin.user.list', compact('listUser'));
    }
//get delete user
    public function getDelUser($id)
    {
        $user = User::find($id);
        $img = '../storage/app/news/'.  $user->image;
        if(File::exists($img))
        {
            File::delete($img);
        }

        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted User: ". $user->username ;
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        $SocialProvider = SocialProvider::where('user_id', $id)->delete();

        $user->delete();

        return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Deleted User Success !']);
    }

//get lock user
    public function getLockUser($id)
    {
        $user = User::find($id);
        ($user->lock == 0) ? $user->lock=1 : $user->lock=0; 
        $user->save();
        $report = new Report;
        $report->user_id = Auth::user()->id;
        
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        

        if($user->lock == 0){
            $report->content = "Unlocked User: ". $user->username ;
            $report->save();
            return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Unlocked User Success !']);
        }
        else {
            $report->content = "Locked User: ". $user->username ;
            $report->save();
            return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Locked User Success !']);
        }
    }

    // get delete all user
    public function getDelAllUsers()
    {
        DB::table('users')->truncate();
        return redirect()->route('getListUser')->with(['flash_level' => 'success', 'flash_message' => 'Deleted all users Success !']);
    }
}
