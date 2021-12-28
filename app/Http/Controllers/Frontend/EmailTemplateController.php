<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\EmailCoverLetter;
use Auth;
use App\User;
use Validator;
use PDF;
use App\Models\PricingSubscription;
use App\Models\EmailTemplate\UserEmailTemplate;

class EmailTemplateController extends Controller
{
    public function index() {
        try {
                $email_cover_templates = EmailCoverLetter::emailCoverLetters();
                $email_cover_templates_category = EmailCoverLetter::emailCoverLettersCategory();
                return view('frontend.email-cover-letter-examples')->with('email_cover_templates',json_encode($email_cover_templates))->with('email_cover_templates_category',json_encode($email_cover_templates_category));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function emailTemplatesView(Request $request, $template_id)
    {
        try {
                    if(!$template_id){
                        return response()->json(array('responseMessage' => 'Please choose any one template.'), 400); 
                    }
                    if(Auth::guard('users')->check()){
                        $getResumeUserData = User::select('resume_fullname','resume_email')->where('id',Auth::guard('users')->user()->id)->first();
                        $getResumeUserData->template_id = $template_id;
                        $getResumeUserData->user_id = Auth::guard('users')->user()->id;
                        return response()->json(array('data' => $getResumeUserData, 'responseMessage' => 'success'), 200);    
                    }
                    else{
                        return response()->json(array('responseMessage' => 'You have to first login.'), 400); 
                    }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveUserEmailTemplate(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'exists:users,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $email_template_examples = EmailCoverLetter::emailCoverLetters();
                $uet_content = '';
                $uet_title = '';
                if(!empty($email_template_examples)){
                    foreach ($email_template_examples as $key => $value) {
                        if($request->template_id == $value['id']){
                            $uet_title = $value['title'];
                            $uet_content = $value['letter_details'];
                        }
                    }
                }else{
                    $uet_content = null;
                    $uet_title = null;
                }
                $user_email_template = UserEmailTemplate::create([
                    'uet_user_id' => $request->user_id,
                    'uet_name' => $request->template_id,
                    'uet_title' => $uet_title,
                    'uet_content' => $uet_content
                ]);
                $redirect_url = route('email_templates',[$user_email_template->id]);
                return response()->json(array('data' => $user_email_template, 'redirect_url' => $redirect_url, 'responseMessage' => 'success'), 200);   
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function emailTemplatePage(Request $request, $user_cl_id)
    {
        try {   
                if(!$user_cl_id){
                    return redirect()->route('email-cover-letter-examples');
                }
                if(!Auth::guard('users')->check()){
                    return redirect()->route('email-cover-letter-examples');
                }
                    $color_codes = array();
                    $getEmailTemplateId = UserEmailTemplate::with('user')->where('uet_user_id',Auth::guard('users')->user()->id)->where('id',$user_cl_id)->first();
                    if(empty($getEmailTemplateId)){
                        return redirect()->route('email-cover-letter-examples');
                    }
                    $email_template_subject = EmailCoverLetter::emailCoverLetters();
                    $user_id = Auth::guard('users')->user()->id;
                    $template_id = $getEmailTemplateId->cl_template_name;

                    $getEmailTemplateFullNameEmail = $email_fullname = $this->getEmailTemplateFullNameEmail(Auth::guard('users')->user()->id);
                    $getPersonalDetails = $personal_details = $this->getEmailTemplateDetails($user_cl_id);

                    return view('frontend.email_templates.email_templates',compact('user_cl_id','template_id','email_fullname','personal_details','email_template_subject'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getEmailTemplateFullNameEmail($user_id)
    {
        try{    
                $getEmailTemplateFullNameEmail = User::select('resume_fullname')->where('id',$user_id)->first();
                return $getEmailTemplateFullNameEmail;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getEmailTemplateDetails($user_cl_id)
    {
        try{    
                $getPersonalDetails = UserEmailTemplate::where('id',$user_cl_id)->first();
                return $getPersonalDetails;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function storeUserEmailTemplateDetails(Request $request)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
                $redirect_url_pricing = route('dashboard-candidates-pricing');
                if(empty($user_plans_active)){
                    return response()->json(array($redirect_url_pricing, 'responseMessage' => 'You have to first purchase plan.'), 400);
                }
                if($user_plans_active->pricing_id <= 2){
                    return response()->json(array($redirect_url_pricing, 'responseMessage' => 'This plan does not include email templates, upgrade to other plan.'), 400);
                }
                $personal_details = [
                    'uet_title' => $request->uet_title,
                    'uet_content' => $request->uet_content
                ];
                $user_email_template = UserEmailTemplate::where('uet_user_id',$user_id)->where('id',$request->et_id);
                $save_personal_details = $user_email_template->update($personal_details);
                $user_email_template = $user_email_template->first();

                $redirect_url = route('email_templates',$request->et_id);
                return response()->json(array('data' => $user_email_template, 'responseMessage' => 'Email template saved successfully.','redirect_url' => $redirect_url), 200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }
}
