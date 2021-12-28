<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Faq;
use App\Models\FaqCategory;
use Auth;
use App\Models\PricingSubscription;
use Validator;
use Razorpay\Api\Api;
use App\Models\CourseCategory;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $category_id = FaqCategory::where('category','Pricing')->pluck('id')->first();
            if(Auth::guard("users")->check())
            {
                $user_id = Auth::guard("users")->user()->id;
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
            }else{
                $user_plans_active = null;
            }
            if($category_id) {
                $faqs = Faq::where('status', 1)->where('category_id',$category_id)->get();
            } else {
                $faqs = [];
            }
            $course_category = CourseCategory::select('id','name')->get();
            $pricing = Pricing::where('status','!=','0');
            $pricing_details = $pricing->select('id','plan_name','plan_slug','price','discounted_price')->get();
            $pricing_validity = $pricing->select('validity')->get();
            $pricing_includes = $pricing->select('plan_include')->get();
            $pricing_includes_json_decode = json_decode($pricing_includes,true);
            $plan_includes_arr = array();
            $final_array = array();
            $job_search_plans_arr = array();
            $job_search_coaching_arr = array();
            $job_search_training_arr = array();
            if(!empty($pricing_includes_json_decode)){
                foreach ($pricing_includes_json_decode as $includes) {
                    foreach($includes as $keys => $vals) {
                        $arr = json_decode($vals);
                        $plan_includes_arr[] = $arr->plan_include;
                        $final_array[] = $arr;
                    }
                }
            }
            foreach ($final_array as $key => $value) {
                if(array_key_exists('Job_Search_Plan', $value) == true) {
                    if(array_key_exists('Job_Search_Plan_Detail', $value->Job_Search_Plan) == true){
                        $job_search_plans_arr[]['Job_Search_Plan_Detail'] = $value->Job_Search_Plan->Job_Search_Plan_Detail; 
                    }else{
                        $job_search_plans_arr[]['Job_Search_Plan_Detail'] = null;
                    }
                }else{
                    $job_search_plans_arr[] = null;
                }
                if(array_key_exists('Job_Search_Coaching', $value) == true) {
                    if(array_key_exists('Job_Search_Coaching_Session', $value->Job_Search_Coaching) == true){
                        $job_search_coaching_arr[$key]['Job_Search_Coaching_Session'] = $value->Job_Search_Coaching->Job_Search_Coaching_Session; 
                    }else{
                        $job_search_coaching_arr[$key]['Job_Search_Coaching_Session'] = null;
                    }
                    if(array_key_exists('Job_Search_Coaching_Time', $value->Job_Search_Coaching) == true){
                        $job_search_coaching_arr[$key]['Job_Search_Coaching_Time'] = $value->Job_Search_Coaching->Job_Search_Coaching_Time; 
                    }else{
                        $job_search_coaching_arr[$key]['Job_Search_Coaching_Time'] = null;
                    }
                }else{
                    $job_search_coaching_arr[$key] = null;
                }
                if(array_key_exists('Job_Search_Training', $value) == true) {
                    if(array_key_exists('Job_Search_Training_Course', $value->Job_Search_Training) == true){
                        $job_search_training_arr[$key]['Job_Search_Training_Course'] = $value->Job_Search_Training->Job_Search_Training_Course; 
                    }else{
                        $job_search_training_arr[$key]['Job_Search_Training_Course'] = null;
                    }
                    if(array_key_exists('Job_Search_Training_Text', $value->Job_Search_Training) == true){
                        $job_search_training_arr[$key]['Job_Search_Training_Text'] = $value->Job_Search_Training->Job_Search_Training_Text; 
                    }else{
                        $job_search_training_arr[$key]['Job_Search_Training_Text'] = null;
                    }
                }else{
                    $job_search_training_arr[$key] = null;
                }
            }
            return view('frontend.pricing', compact('faqs','pricing_details','pricing_validity','user_plans_active','course_category'))->with('plan_includes',$plan_includes_arr)->with('job_search_plans',$job_search_plans_arr)->with('job_search_coaching',$job_search_coaching_arr)->with('job_search_training',$job_search_training_arr);
            //->with('active_plan',json_encode($user_plans_active));
        } catch (\Exception $e) {
            return redirect()->back()->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function subscribePlan(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'plan'  => 'exists:pricing,plan_slug,deleted_at,NULL',
                    'price' => 'regex:/^\d+(\.\d{1,2})?$/'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $get_plan_id = Pricing::where('plan_slug',$request->plan)->first();
                if($get_plan_id){
                    $check_user_subscriptions = PricingSubscription::where('user_id',Auth::guard('users')->user()->id)->where('pricing_id',$get_plan_id->id)->where('payment_status','!=',1)->get();
                    if($check_user_subscriptions){
                        
                        $plan_expiry_date = date('Y-m-d', strtotime(date('Y-m-d'). '+' . $get_plan_id->validity_in_days. ' days'));
                        $api_key = config('razorpay.api_key');
                        $api_secret = config('razorpay.api_secret');
                        $api = new Api($api_key, $api_secret);
                        // Creates order
                        $order  = $api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR'));
                        $orderId = $order['id'];
                        
                        $user_subscription = PricingSubscription::create([
                            "user_id" => Auth::guard('users')->user()->id,
                            "pricing_id" => $get_plan_id->id,
                            "pricing_expiry_date" => $plan_expiry_date,
                            // "pricing_amount" => $get_plan_id->discounted_price,
                            "pricing_amount" => $request->price,
                            "pricing_json" => json_encode($get_plan_id),
                            "payment_status" => 0,
                            "order_id" => $orderId
                            // "notes" => $note
                        ]);
                        $user_subscription->apiKey = $api_key;
                        return response()->json(array('data'=> $user_subscription), 200);
                    }else{
                        return response()->json(array('data'=> null, 'responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
                }else{
                    return response()->json(array('data'=> null, 'responseMessage' => 'Invalid plan'), 400);
                }
        } catch (\Exception $e) {
            return response()->json(array('data'=> null, 'responseMessage' => $e->getMessage()), 400);
        }
    }

    public function pricingTwoDayPass()
    {
        try {
                if(!Auth::guard('users')->user()){
                    $pricing = Pricing::select('plan_slug')->first();
                    return view('frontend.pricing-two-days-pass',compact('pricing'));
                }else{
                    $user_id = Auth::guard('users')->user()->id;
                    $pricing_details = Pricing::with(['PricingSubscriptions' => function($q) use($user_id){ $q->where('user_id', '=', $user_id);
                        }])->first();
                    return view('frontend.pricing-two-days-pass',compact('pricing_details'));  
                }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

}
