<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Hash;
use Validator;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $guards = ['users', 'admin'];
    protected $guards = ['users'];

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
        
    public function redirectTo(){
        foreach($this->guards as $guard) {
            if(Auth::guard($guard)->check()){
              if($guard == 'users')
                {
                    $notification = array(
                        'notification_message' => 'Password Set Successfully!', 
                        'alert-type' => 'success'
                    );
                    return redirect('/')->with($notification);
                }
                
            }
        }
         return redirect('/');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('email',$request->email)->first();
        if($user){
            $user->password = Hash::make($request->password);
            $user->setRememberToken(Str::random(60));
            $user->save();
            if($user->email_verified_at != null && $user->status == 1)
            {
             Auth::guard('users')->login($user);
                $notification = array(
                        'notification_message' => 'Password Set Successfully!', 
                        'alert-type' => 'success'
                    );
                return redirect('/')->with($notification); 
            }else
            {
                $notification = array(
                        'notification_message' => 'Password Set Successfully! Please Login.', 
                        'alert-type' => 'success'
                    );
               
                return redirect('/')->with($notification);
            }
        }else{
           return redirect()->back()->withErrors(['email' => 'Email is not registered with us.'])->withInput();
        }
    }

    /*protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
      
            if($user->email_verified_at != null && $user->status == 1)
            {
             Auth::guard('users')->login($user);
                $notification = array(
                        'notification_message' => 'Password Set Successfully!', 
                        'alert-type' => 'success'
                    );
                return redirect('/')->with($notification); 
            }else
            {
                $notification = array(
                        'notification_message' => 'Password Set Successfully! Please Login.', 
                        'alert-type' => 'success'
                    );
               
                return redirect('/')->with($notification);
            }
    }*/
}
