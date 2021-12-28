<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\User\StoreNewUser;
use Illuminate\Support\Facades\Mail;
use App\Models\Pricing;
use App\Models\Industry;
use App\User;
use App\RoleUser;
use Validator;
use App\Models\PricingSubscription;
use Auth;
use DB;
use Razorpay\Api\Api;
use Log;
use App\Helpers;
use Session;
use App\Mail\EmailVerify;
use App\Models\Coupon;
// use App\Mail\RegisterUserQueueEmail;
// use App\Jobs\SendRegisterEmail;

class RegisterController extends Controller
{
	public function __construct()
    {
      $this->middleware('guest:users');
    }
    
    public function index(Request $request) {
        try {
            $select_plan = null;
	        if(!empty($request->get('plan'))){
	        	$validator = Validator::make($request->all(), [
	        		'plan'  => 'required'
		        ]);
		        if($validator->fails()) {
		        	return redirect()->back()->withErrors($validator)->withInput();
		        }else{ 
	        		$select_plan = $request->get('plan');
	        	}
	        } 
        	$pricing = Pricing::get();
        	$industry = Industry::get();
            return view('frontend.auth.register',compact('pricing','select_plan','industry'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function register(Request $request) {
        try {
		    	DB::beginTransaction();
        		$validator = Validator::make($request->all(), [
	                'name'  => 'required|min:2|max:255',
                    // 'email' => 'unique:users,email,NULL,id,deleted_at,NULL',
	                'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
	                // "email" => "required|email|unique:users,email,NULL,id,deleted_at,NULL|unique:users,resume_email,NULL,id,deleted_at,NULL|different:resume_email",
	                'password' => 'required|min:8',
	                'confirm_password' => 'required|min:8|same:password',
	                'mobile_no' => 'required|numeric|digits_between:6,16|unique:users,mobile_no,NULL,id,deleted_at,NULL',
                    'industry' => 'required',
	                'plan' => 'required|not_in:0',
	                'agree_terms' => 'required'
	                /*'resume_fullname' => 'nullable',
	                // 'resume_email' => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL'
            		"resume_email" => "sometimes|nullable|unique:users,resume_email,NULL,id,deleted_at,NULL|unique:users,email,NULL,id,deleted_at,NULL|different:email",*/
	            ],[
                    'industry.required' => 'The function field is required.'
                ]);
	            if ($validator->fails()) {
	            	return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
	            }
	            date_default_timezone_set("Asia/Kolkata");
	            $user = User::create([
		            "name" => $request->name,
		            "email" => $request->email,
                    "country_code" => $request->country_code,
		            "mobile_no" => $request->mobile_no,
		            "password" => Hash::make($request->password),
		            // "resume_fullname" => $request->resume_fullname,
		            // "resume_email" => $request->resume_email,
                    "industry" => $request->industry,
                    "email_verified_at" => date('Y-m-d H:i:s'),
		            "created_at" => date('Y-m-d H:i:s'),
		            "updated_at" => date('Y-m-d H:i:s')
		        ]);
                // Session::put('login_user', $user->id);
		        // Auth::login($user);
                Auth::guard('users')->loginUsingId($user->id);
		        $lastInsertedId = $user->id;

		        $roleuser = RoleUser::insert([
		        	"user_id" => $lastInsertedId,
		            "role_id" => 5
		        ]);
		        if(!empty($request->plan)){
	        		$get_pricing_details = Pricing::where('id',$request->plan)->first();
                    $plan_expiry_date = date('Y-m-d', strtotime(date('Y-m-d'). '+' . $get_pricing_details->validity_in_days. ' days'));
	        	}else{
	        		return response()->json(array('data'=> null, 'responseMessage' => 'Something went wrong, please try again.'), 400);
	        	}
	        	$api_key = config('razorpay.api_key');
        		$api_secret = config('razorpay.api_secret');
                $api = new Api($api_key, $api_secret);
                // Creates order
                $order  = $api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR'));
				$orderId = $order['id'];

                if(Session::has('coupon')){
                    $coupon_code = session('coupon_code');
                    $coupon_amount = session('coupon.coupon_amount');
                    $coupon_json = session('coupon.coupon_json');
                    $final_price = session('coupon.final_price');
                }else{
                    $coupon_code = null;
                    $coupon_amount = null;
                    $coupon_json = null;
                    $final_price = $get_pricing_details->discounted_price;
                }
		        $user_subscription = PricingSubscription::create([
		        	"user_id" => $lastInsertedId,
		            "pricing_id" => $request->plan,
		            "pricing_expiry_date" => $plan_expiry_date,
		            "pricing_amount" => $final_price,
                    "coupon_code" => $coupon_code,
                    "coupon_amount" => $coupon_amount,
                    "coupon_json" => $coupon_json,
		            "pricing_json" => json_encode($get_pricing_details),
		            "payment_status" => 0,
		            "order_id" => $orderId
		        ]);
		        $user_subscription->apiKey = $api_key;

		    	DB::commit();
	        	return response()->json(array('data'=> $user_subscription, 'responseMessage' => 'User registered successfully'), 200); 	
        } catch (\Exception $e) {
		    DB::rollback();
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }
    
    public function planSelect(Request $request, $plan_id) {
        try {
        		$validator = Validator::make($request->all(), [
                    'plan_id' => 'exists:pricing,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                	return response()->json(['data' => null, 'responseMessage' => $validator->getMessageBag()->first()])->setStatusCode(400);        
                }
        		return redirect()->route('register.index',["plan" => $plan_id]);
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function loginUserAfterSubscribe(Request $request) {
        try {
        		$validator = Validator::make($request->all(), [
                    'user_id' => 'exists:users,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                	return response()->json(['data' => null, 'responseMessage' => $validator->getMessageBag()->first()])->setStatusCode(400);        
                }
                Auth::guard('users')->loginUsingId($request->user_id);
                $redirect_url = route('pricing');
        		return response()->json(array('responseMessage' => 'You have logged in successfully.','redirect_url' => $redirect_url), 200); 
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function verifyEmail(Request $request) {
        try {
        		$validator = Validator::make($request->all(), [
                    'email' => 'email|unique:users,email,NULL,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                	return response()->json(['data' => null, 'responseMessage' => $validator->getMessageBag()->first()])->setStatusCode(400);        
                }
                $otp = rand(1000,9999);
                Session::put('user_email', $request->email);
                Session::put('user_otp', $otp);

                // $data = array('otp' => $otp);
                // SendRegisterEmail::dispatch($request->email, new RegisterUserQueueEmail($otp));
                Mail::to($request->email)->send(new EmailVerify($otp));
                return response()->json(array('responseMessage' => 'We have sent you an email verification OTP on your email to verify.'), 200); 
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function verifyOTP(Request $request) {
        try {
                $validator = Validator::make($request->all(), [
                    'otp' => 'required|numeric'
                ]);
                if ($validator->fails()) {
                    return response()->json(['data' => null, 'responseMessage' => $validator->getMessageBag()->first()])->setStatusCode(400);        
                }
        			// Get session value 
        			$email = Session::get('user_email');
        			$otp = Session::get('user_otp');
        			if($request->otp == $otp){
        				/*$user = User::create([
        					'email' => $email
        				]);*/
        				return response()->json(array('responseMessage' => 'Your email is verified successfully.'), 200);
        			}else{
        				return response()->json(array('responseMessage' => 'Invalid OTP.'), 400);
        			}
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function getOTPForm()
    {
        try {
                return view('frontend.auth.otp-verification');
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function resendOTP(Request $request) {
        try {
                if($request->email == Session::get('user_email')){
                    $otp = rand(1000,9999);
                    Session::put('user_otp', $otp);

                    Mail::to($request->email)->send(new EmailVerify($otp));
                    return response()->json(array('responseMessage' => 'We have again sent you an email verification OTP on your email to verify.'), 200); 
                }else{
                    return response()->json(array('responseMessage' => 'Email is Invalid.'), 400); 
                }
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function applyCoupon(Request $request) {
        try {
                $rules = [
                    'coupon_code' => 'required|exists:coupons,coupon_code,deleted_at,NULL'
                ];
                $msg = ['coupon_code.required'=>'Enter Coupon Code!',
                        'coupon_code.exists'=>'Invalid coupon code!'];

                $validator = Validator::make($request->all(), $rules,$msg);
                $error = $validator->getMessageBag()->first();
                if($validator->fails()) {
                    return response()->json(['data' => null, 'responseMessage' => $error])->setStatusCode(400);
                }
                $coupon = Coupon::where('coupon_code',$request->coupon_code)->where('end_date','>=',date('Y-m-d'))->first();
                if(empty($coupon)){
                    return response()->json(['data' => null, 'responseMessage' => "Invalid coupon code!"])->setStatusCode(400);
                }else{
                    $total_discount = 0;
                    $final_price = 0;
                    $coupon_arr = array();
                    $pricing = Pricing::where('id',$request->plan_id)->first();

                    if($coupon->discount_type == 2){
                        $total_discount = ($pricing->discounted_price * ($coupon->discount_value / 100));
                        $final_price = $pricing->discounted_price - ($pricing->discounted_price * ($coupon->discount_value / 100));
                    }else{
                        $total_discount = $coupon->discount_value;
                        $final_price = $pricing->discounted_price - $coupon->discount_value;
                    }
                    session()->put('coupon', [
                       'coupon_code' => $request->coupon_code,
                       'coupon_amount' => $total_discount,
                       'coupon_json' => json_encode($coupon),
                       'final_price' => $final_price,
                       'plan_id' => $request->plan_id
                    ]);
                    if($total_discount >= $pricing->discounted_price){
                        $error_message = 'Invalid Coupon code';
                        return response()->json(['data' => $coupon_arr, 'responseMessage' => $error_message ])->setStatusCode(400);
                    }else{
                        $message = 'Congratulations! You have got INR '.number_format((float)$total_discount, 2, '.', '').' discount';
                        return response()->json(['data' => $coupon_arr, 'responseMessage' => $message ])->setStatusCode(200);
                    }
                } 
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function removeCoupon() {
        try {
                if(Session::has('coupon')){
                    session()->forget('coupon');
                    return response()->json(array('responseMessage' => 'Coupon removed.'), 200); 
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400); 
                }
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function expireOTP() {
        try {
                Session::forget('user_otp');
                return response()->json(array('responseMessage' => 'OTP expired.'), 200); 
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }
}
