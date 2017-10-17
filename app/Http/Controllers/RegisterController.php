<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Major;
use DateTime;
use Auth;
use Socialite;
use App\SocialProvider;

class RegisterController extends Controller
{
	public function getRegister()
    {
    	$listMajors = Major::all();
    	return view('user.register', compact('listMajors'));
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->created_at = new DateTime;
        $user->updated_at = new DateTime;
        $user->level_id = 4;
        $user->save();
        
    	return redirect()->route('getLogin')->with(['flash_level' => 'success', 'flash_message' => 'Đăng ký thành công  !'])->withInput();
    }


}