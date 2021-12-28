<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Redirect;
use App\Models\GeneralSetting;

class GoogleLoginController extends Controller
{
    use AuthenticatesUsers;
   
    protected $redirectTo = '/';
   
    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
    }

    public function redirectToGoogle()
    {
        try {
             $google_cred = GeneralSetting::select('google_key','google_secret','google_callback_url')->get();
             return Socialite::driver('google')->redirect();
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $user_social = Socialite::driver('google')->user();
            $find_user = User::where('google_id', $user_social->id)->first();
            if($find_user){
                $user = $find_user; 
            }else{
                $exist_user = User::where('email',$user_social->email)->first();
                if(empty($exist_user))
                {
                    $user = User::create([
                        'name' => $user_social->name,
                        'email' => $user_social->email,
                        'google_id'=> $user_social->id,
                        'status' => 1,
                    ]);
                }else{
                    $exist_user->google_id = $user_social->id;
                    $exist_user->save();
                    $user = $exist_user;
                }
            }

            Auth::guard('users')->login($user); 
            return redirect('/');
            // return redirect()->back();

        } catch (Exception $e) {
            return redirect('auth/google');
        }

    }   
}
