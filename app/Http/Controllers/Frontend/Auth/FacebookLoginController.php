<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Redirect;

class FacebookLoginController extends Controller
{
	use AuthenticatesUsers;
   
    protected $redirectTo = '/';
   
    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
    }

	public function redirectToFacebook()
	{
		try {
	    	return Socialite::driver('facebook')->redirect();
	    } catch (Exception $e) {
	    	return $e->getMessage();
	    }
	}

    public function handleFacebookCallback()
    {
        try {
            	$user_social = Socialite::driver('facebook')->user(); 
				$find_user = User::where('facebook_id', $user_social->id)->first(); 
				if($find_user){ 
					$user = $find_user;
				}else{ 

					$exist_user = User::where('email',$user_social->email)->first();
					if(empty($exist_user))
					{
						$user = User::create([ 
						'name' => $user_social->name, 
						'email' => $user_social->email, 
						'facebook_id'=> $user_social->id ,
	                    'status' => 1
						]);

					}else{
						$exist_user->facebook_id = $user_social->id;
						$exist_user->save();
						$user = $exist_user;
					}
				}

				Auth::guard('users')->login($user); 
				return redirect('/');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
