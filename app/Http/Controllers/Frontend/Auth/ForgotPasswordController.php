<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
// use App\Helpers\EmailSave;
use App\User;
use Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('users');
    }
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('guest:users');
    }
    protected function broker()
    {
        return Password::broker('users');
    }

    public function sendResetLinkEmail(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'email'=> 'required|email'
            ]);
            if ($validator->fails()) {
               return response()->json(array(
                    'responseMessage' => $validator->errors()->first()
                ), 400);
            }
            $user = User::where('email',$request->email)->first();
            if(empty($user))
            {
                return response()->json(['data' => null, 'responseMessage' => 'This email is not registered with us!'],400); 
            }else{
            if($user->is_admin == 1 && $user->roles)
            {
                return response()->json(['data' => null, 'responseMessage' => 'The selected email is invalid.'],400);
            }else{
                if($user->status == 1)
                {
                    $response = $this->broker()->sendResetLink(
                        $request->only('email')
                    );
                    /*$response = Password::sendResetLink($request->only('email'), function (Message $message) {
                        $message->subject($this->getEmailSubject());
                    });
                    switch ($response) {
                        case Password::RESET_LINK_SENT:
                            return response()->json([
                                'responseMessage' => trans($response),
                                ], 200);
                        case Password::INVALID_USER:
                            return response()->json([
                                'responseMessage' =>   'Unable to send password reset link.'
                            ], 400);
                    }  */
                    return response()->json(['data' => null, 'responseMessage'=>trans($response)],200);
                }else{
                    return response()->json(['data' => null, 'responseMessage' => 'Your account is not activated. Please activate it first.'],400); 
                }
            }  
        }
    }
}
