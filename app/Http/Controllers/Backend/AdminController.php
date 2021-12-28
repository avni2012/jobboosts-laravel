<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Validator;
use App\User;
use Mail;
use Auth;
use Hash;
use App\Helpers;

class AdminController extends Controller
{
    public function dashboard()
    {
    	try{
    		return view('backend.index');
    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }
    public function profile()
    {
        try {
            return view('backend.profile');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function profileUpdate(Request $request)
    {
        try {
               $validator = Validator::make($request->all(), [
                'username'  => 'required|string|max:255|min:2',
                //'email'     => 'required|unique:users,email,NULL,id,deleted_at,NULL',
                'mobile_no' => 'required|digits:10|min:10'
                ]);

                if ($validator->fails()) {

                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $id = Auth::guard()->user()->id;
                $user = User::findOrFail($id);
                $user->name = $request->username;
                // $user->username = $request->username;
                //$user->email    = $request->email;
                $user->mobile_no= $request->mobile_no;

                if($request->file('profile_picture')) {
                    $img = Helpers\FileUpload::fileUpload($request->file('profile_picture'),$user,$path="/frontend/images/avatar/");
                    if($img) {
                        $user->profile_picture = $img;
                    } else {
                        Log::error(['user-img' => 'Error saving user profile picture']);
                        return redirect()->route('profile')
                            ->with(['message.content' => 'Error updating user\'s profile picture, please try again!','message.level' => 'danger']);
                    }
                }
                $user->save();
                return redirect()->back()
                                 ->with(['message.content' => "Profile updated succesfully!!",'message.level' => 'success']);
        } catch (Exception $e) {
        return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);        }
    }
    public function changePassword(Request $request)
    {
        // if validation fails it automatically redirect back
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            auth()->user()->update([
                'password'=> Hash::make($request->new_password)
            ]);

        return redirect()->back()->with(['message.content' => 'Password change succesfully.' ,'message.level' => 'success']);
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
        }
    }
}
