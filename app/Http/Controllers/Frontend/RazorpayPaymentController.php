<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\User;
use Validator;
use App\Models\PricingSubscription;
use Auth;
use Razorpay\Api\Api;
use App\Helpers;
use App\Models\Course;
use App\Models\UserSession;
use App\Models\UserSubscriptionCourse;
use DB;
use Session;

class RazorpayPaymentController extends Controller
{
    public function paymentCancel(Request $request) {
        try {
                    $validator = Validator::make($request->all(), [
                    	'subscription_id' => 'exists:pricing_subscriptions,id,deleted_at,NULL'
                    ]);
                    if ($validator->fails()) {
                        return response()->json(['data' => null, 'responseMessage' => $validator->getMessageBag()->first()])->setStatusCode(400);        
                    }
                    if(!Auth::guard('users')->check()){
                    	$getUser = PricingSubscription::where('id',$request->subscription_id)->first();
	                    if($getUser){
		                    $user = User::where('id',$getUser->user_id)->first();
		                    if($user){
		                    	Auth::guard('users')->loginUsingId($user->id);
		                    }
	                    }else{
	                    	return response()->json(array('data'=> null, 'responseMessage' => 'Something went wrong, try again later.'), 400); 
	                    }
                    }
                    $redirect_url = route('dashboard-candidates-pricing');
                    // $redirect_url = route('pricing');
	                PricingSubscription::where('id',$request->subscription_id)->update(["payment_status" => 2]);
	                return response()->json(['data' => null, 'responseMessage' => 'Plan Subscription Cancel Successfully.','redirect_url' => $redirect_url])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

	public function ajaxRazorpayPayment(Request $request) {
        try {
               	$planData = json_decode($request->data['pricing_json']);
               	return [
		            "key" => $request->data['apiKey'],
		            "amount" => (($request->data['pricing_amount'])*100),
		            "name" => $planData->plan_name,
		            // "description" => json_encode($planData['plan_description']),
		            "image" => '{{ asset("/frontend/images/logo.svg") }}',
		            "subscription_id" => $request->data['id'],
		            "prefill" => [
		                "name" => '',
		                "email" => '',
		                "contact" => ''
		            ],
		            "theme" => [
		                "color" => "#0070cd"
		            ],
		            "order_id" => $request->data['order_id']
		        ];
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }    

    public function razorpayPaymentSuccess(Request $request) {
        try {
				$api_key = config('razorpay.api_key');
	            $api_secret = config('razorpay.api_secret');
	            $api = new Api($api_key, $api_secret);
				Helpers\Common::logRecorder('payments','payments', 'Razorpay Response : ' .json_encode($request->all()));  
				$course_array = array();
				$course_final_array = array();

				$details  = $api->payment->fetch($request->razorpay_payment_id);
				if($details){
					Helpers\Common::logRecorder('payments','payments', 'Payment webhook response array : ' .json_encode($details));  
					if($details->entity == 'payment' && ($details->status == 'captured' || $details->status == 'authorized')){
						$transaction_id = $details->id;
	                	$user_subscription_id = $details->description;
	                	$mobile_no = $details->contact;
	                	$email = $details->email;
	                	$paymentStatus = 1;
	                	$user_subscription =  PricingSubscription::with('pricing')->where('id',$user_subscription_id)->first();
	                		$user_plans_active = PricingSubscription::select('pricing_id')->where('user_id' ,Auth::guard('users')->user()->id)
	                        ->Where(function ($query) {
	                            $query->where('user_id' ,Auth::guard('users')->user()->id)->where('payment_status', 1)
	                            ->where('pricing_expiry_date','>=',date('Y-m-d'));
	                        })->first();
		                    if(!empty($user_plans_active)){
		                    	PricingSubscription::where('user_id',Auth::guard('users')->user()->id)->where('pricing_id',$user_plans_active->pricing_id)->delete();
		                        $get_plan_name = Pricing::select('plan_name')->where('id',$user_plans_active->pricing_id)->first();
		                        $note = "You have upgraded plan from " .$get_plan_name->plan_name. " to " .$user_subscription->pricing->plan_name;
		                        $plan_purchase_message = 'Your plan upgraded Successfully.';
		                        Helpers\Common::logRecorder('payments','payments', 'Your plan upgraded Successfully : ' .$note);
		                    }else{
		                    	PricingSubscription::where('user_id',Auth::guard('users')->user()->id)->where('pricing_expiry_date','<=',date('Y-m-d'))->delete();
		                    	$note = "You have subscribed " .$user_subscription->pricing->plan_name. " plan";
		                    	$plan_purchase_message = 'Your plan upgraded Successfully.';
		                    	Helpers\Common::logRecorder('payments','payments', 'User Subscription saved Successfully : ' .$note);
		                    }
					}
					if($details->entity == 'failed'){
						$paymentStatus = 2;
					}
					if($user_subscription){
						$payment_details_json_data = str_replace(array('\u0000','*'), "", json_encode(((array)$details)));

						DB::beginTransaction();
						$user_subscriptions = PricingSubscription::where('id',$user_subscription->id)->update([
								"transaction_id" => $transaction_id,
					            "payment_details_json" => $payment_details_json_data,
					            "payment_status" => $paymentStatus,
					            "mobile_no" => $mobile_no,
			                    "email" => $email,
			                    "notes" => $note
			                ]
						);
						Helpers\Common::logRecorder('payments','payments', 'User Subscription saved Successfully : ' .json_encode($user_subscriptions));

						if($user_subscription->pricing_id > 2){
							$sessions = 0;
							$courses = 0;
							$course_name = '';

							$sessions_and_courses = Pricing::where('id',$user_subscription->pricing_id)->first();
							if($sessions_and_courses){
								$plan_include = json_decode($sessions_and_courses->plan_include);
								if(array_key_exists('Job_Search_Training', $plan_include)){
									$courses = $plan_include->Job_Search_Training->Job_Search_Training_Course;
									$course_name = $plan_include->Job_Search_Training->Job_Search_Training_Text;
								}else{
									$courses = 0;
									$course_name = '';
								}
								if(array_key_exists('Job_Search_Coaching', $plan_include)){
									$sessions = $plan_include->Job_Search_Coaching->Job_Search_Coaching_Session;
								}else{
									$sessions = 0;
								}
							}else{
								$sessions = 0;
								$courses = 0;
							}
							if($user_subscription->pricing_id == 3){
								$sessions = $sessions;
								$courses = $courses;
								$course_name = $course_name;
							}else if($user_subscription->pricing_id == 4){
								$sessions = $sessions;
								$courses = $courses;
								$course_name = $course_name;
							}else if($user_subscription->pricing_id == 5){
								$sessions = $sessions;
								$courses = $courses;
								$course_name = $course_name;
							}
							$lastInsertedId = $user_subscription->id;
							
							$get_user_sessions = UserSession::where('user_id',Auth::guard('users')->user()->id)->get();
								if($get_user_sessions->count() > 0){
									foreach ($get_user_sessions as $key => $value) {
										$user_sessions = UserSession::where('id',$value->id)->update([
										    	"subscription_id" => $lastInsertedId
											]);
									}
									$get_count = $sessions - $get_user_sessions->count();
									for($j = 1; $j <= $get_count ; $j ++) {
										$count = $j + $get_user_sessions->count();
										$user_sessions = UserSession::insert([
											"session_name" => "Session ". $count, 
								        	"user_id" => Auth::guard('users')->user()->id,
								            "subscription_id" => $lastInsertedId,
								            "session_sequence_no" => $count,
								            "status" => 0
								        ]);
									    $count++;
									}
								}else{
									for($i = 1; $i <= $sessions; $i ++){
										$user_sessions = UserSession::insert([
											"session_name" => "Session ". $i, 
								        	"user_id" => Auth::guard('users')->user()->id,
								            "subscription_id" => $lastInsertedId,
								            "session_sequence_no" => $i,
								            "status" => 0
								        ]);
									}
								}
							
							// DB::commit();
		        			Helpers\Common::logRecorder('payments','payments', 'User Sessions saved Successfully : ' .json_encode($user_sessions));

		        			$courseName = explode(',',$course_name);
							if(count($courseName) > 0){
								$get_course = Course::whereIn('category_id',$courseName)->get();
								if(count($get_course) > 0){
									$get_user_courses = UserSubscriptionCourse::where('user_id',Auth::guard('users')->user()->id)->get();
									if(count($get_user_courses) > 0){
										foreach ($get_course as $key => $value) {
											$user_courses = UserSubscriptionCourse::updateOrCreate([
												"id" => $value->id
											],[
												"user_id" => Auth::guard('users')->user()->id,
												"subscription_id" => $lastInsertedId,
												"course_name" => $value['title'],
												"course_category_id" => $value['category_id'],
												"description" => $value['description'],
												"instructions" => $value['instructions']
											]);
										}

									}else{
										foreach ($get_course as $key => $value) {
											$user_courses = UserSubscriptionCourse::insert([
												"user_id" => Auth::guard('users')->user()->id,
												"subscription_id" => $lastInsertedId,
												"course_name" => $value['title'],
												"course_category_id" => $value['category_id'],
												"description" => $value['description'],
												"instructions" => $value['instructions'],
											]);
										}
									}
								}else{
								}
							}

							Helpers\Common::logRecorder('payments','payments', 'User Sessions saved Successfully : ' .json_encode($user_sessions));
						}
	        			$redirect_url = route('dashboard-candidates-pricing');
	        			DB::commit();
	        			return response()->json(['data' => $user_subscription, 'responseMessage' => $plan_purchase_message,'redirect_url' => $redirect_url])->setStatusCode(200);
					}else{
						// DB::rollback();
						Helpers\Common::logRecorder('payments','payments', 'User Subscription array not found : ' .$user_subscription_id);
	                }
				}else{
					Helpers\Common::logRecorder('payments','payments', 'Payment Response not found : ' .json_encode($details));
					return response()->json(array('data'=> null, 'responseMessage' => 'Payment payload must required.'), 400); 
				}
        } catch (\Exception $e) {
        	DB::rollback();
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400); 
        }
    }

}