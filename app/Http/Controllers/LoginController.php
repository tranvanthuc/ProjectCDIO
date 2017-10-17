<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\User;
use App\Major;
use Socialite;
use App\SocialProvider;
use DB;
use DateTime;



class LoginController extends Controller
{
    // get login
    public function getLogin()
    {
        $listMajors = Major::get(); 
        return view('user.login',compact('listMajors'));
    }

//get log out
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getIndex');
    }

// post Login
    public function postLogin(LoginRequest $request)
    {

        $login = [
        'username' => $request->username,
        'password' => $request->password
        ];

        if(Auth::attempt($login))
        {
            if(Auth::user()->level_id < 3) // 0 1 super and admin
            {
                return redirect()->route('getDashboard')->with(['flash_level' => 'success', 'flash_message'=> 'Login Success !']);
            }
            else if(Auth::user()->lock == 1)
            {
                return redirect()->back()->with(['flash_level' => 'danger', 'flash_message'=> 'Tài khoản của bạn đã bị khóa vui lòng liên hệ admin của chúng tôi !'])->withInput();
            }
            else 
                return redirect()->route('getHome');
        }

        else {
           return redirect()->back()->with(['flash_level' => 'danger', 'flash_message'=> 'Mật khẩu sai , vui lòng nhập lại !'])->withInput();
        }
    }

    // redirect login social
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

//call back login social
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        }
        catch (\Exception $e)
        {
            return redirect()->route('getIndex');
        }
            // $user->token;
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        $checkUserExists = User::where('email' , $socialUser->getEmail())->first();
        if(!$socialProvider && !$checkUserExists)
        {
            $user = new User;
            $user->email = $socialUser->getEmail();
            $user->name = $socialUser->getName();
            // $user->remember_token = $socialUser->token;

            // bỏ set size = 50 của google 
            $user->image = str_replace('?sz=50', '', $socialUser->avatar);

            //get avatar gốc của facebook 
            if ($provider == 'facebook' ) {
                $user->image = $socialUser->avatar_original;
            }

            $user->level_id = 4;
            // $user->image = $user->getAvatar();
            $user->save();

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );





        }
        else if($checkUserExists)
        {
            $user = User::where('email' , $socialUser->getEmail())->first();
        }
        else
        {
            $user = $socialProvider->user;
        }

        auth()->login($user);
        return redirect()->route('getHome');

    }
}
