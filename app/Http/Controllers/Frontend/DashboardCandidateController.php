<?php

namespace App\Http\Controllers\Frontend;

require base_path() . '/vendor/autoload.php';
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use View;
use Validator;
use App\Models\Industry;
use App\Models\Resume\UserResume;
use App\Models\Resume\UserCareer;
use App\Models\Resume\UserEducation;
use App\Models\Resume\UserWebsiteSocialLink;
use App\Models\Resume\UserSkill;
use App\Models\Resume\UserHobbies;
use App\Models\Resume\UserInternship;
use App\Models\Resume\UserCourse;
use App\Models\Resume\UserExtraCurricularActivity;
use App\Models\Resume\UserCustomSection;
use App\Models\Resume\UserLanguage;
use App\Models\Resume\UserReference;
use App\Models\PricingSubscription;
use App\Models\Pricing;
use App\Models\UserSession;
use App\Models\Coach;
use App\Models\CoachAvailability;
use App\Models\CoachAvailabilityDate;
use Illuminate\Support\Facades\Hash;
use DateTime;
use App\Models\CourseCategory;
use App\Models\UserSubscriptionCourse;
use App\Models\CoverLetter\UserCoverLetter;
use App\Models\EmailTemplate\UserEmailTemplate;
use App\Helpers\ResumeTemplates;
use App\Helpers\CoverLetters;

class DashboardCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfilePicture(){
        try {
                $get_image = User::select('profile_picture')->where('id',Auth::guard('users')->user()->id)->first();
                return $get_image;
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function getUserActivePlan($user_id)
    {
        try {
                $get_user_plan = PricingSubscription::with('pricing')->select('id','pricing_id','pricing_expiry_date','pricing_json')->where('user_id',$user_id)->where('pricing_expiry_date','>=',date('Y-m-d'))->where('payment_status',1)->first();
                return $get_user_plan;
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
        }
    }

    public function getPlanExpiryDays($user_id)
    {
        try {
                $total_days = 0;
                $get_user_plan = $this->getUserActivePlan($user_id);
                if(!empty($get_user_plan)){
                    $start = strtotime(date('Y-m-d'));
                    $end = strtotime($get_user_plan->pricing_expiry_date);
                    $total_days = (int)ceil(abs($end - $start) / 86400);
                }
                return $total_days;
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
        }
    }

    public function index()
    {
        try {
                $image = $this->getProfilePicture();
                $user_id = Auth::guard('users')->user()->id;
                $resume_count = UserResume::where('user_id',$user_id)->count();
                $cover_letter_count = UserCoverLetter::where('cl_user_id',$user_id)->count();
                $course_count = UserSubscriptionCourse::where('user_id',$user_id)->count();
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $session_count = UserSession::where('user_id',$user_id)->count();
                $email_count = UserEmailTemplate::where('uet_user_id',$user_id)->count();
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                
                return view('frontend.dashboard-candidates',compact('image','resume_count','cover_letter_count','course_count','total_days','get_user_plan','user_plan','session_count','email_count'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
        }
    }

    public function indexResumeBuilder()
    {
        try {
                $user_resumes = UserResume::with('user')->where('user_id',Auth::guard('users')->user()->id)->get();
                $image = $this->getProfilePicture();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $resume_templates = ResumeTemplates::resumeTemplates();
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                return view('frontend.dashboard-candidates-resume-builder',compact('user_resumes','image','total_days','get_user_plan','user_plan','resume_templates'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexCoverLetter()
    {
        try {
                $image = $this->getProfilePicture();
                $user_cover_letters = UserCoverLetter::with('user')->where('cl_user_id',Auth::guard('users')->user()->id)->get();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $cover_letters = CoverLetters::coverLetters();
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                return view('frontend.dashboard-candidates-cover-letter',compact('image','user_cover_letters','total_days','get_user_plan','user_plan','cover_letters'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexEmailTemplates()
    {
        try {
                $image = $this->getProfilePicture();
                $user_email_templates = UserEmailTemplate::with('user')->where('uet_user_id',Auth::guard('users')->user()->id)->get();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                return view('frontend.dashboard-candidates-email-templates',compact('image','user_email_templates','total_days','get_user_plan','user_plan'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexMyCourses()
    {
        try {
                $image = $this->getProfilePicture();
                $course_name_arr = array();
                $course_name = '';
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('id','pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
                if($user_plans_active){
                    $user_courses = UserSubscriptionCourse::with('course_category')->where('user_id',$user_id)->where('subscription_id',$user_plans_active->id)->get();
                    if(count($user_courses) > 0){
                        foreach ($user_courses as $key => $value) {
                            $course_name_arr[] = $value->course_category->name;
                        }
                        $course_name = implode(", ", array_unique($course_name_arr));
                    }
                }else{
                    $user_courses = [];
                }
                return view('frontend.dashboard-candidates-my-courses',compact('user_plans_active','image','user_courses','course_name','total_days','get_user_plan','user_plan'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
        }
    }

    public function indexOnlineCoaching()
    {
        try {
                $image = $this->getProfilePicture();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                $user_sessions = UserSession::with('coach')->where('user_id',$user_id)->get();
                $coaches = Coach::with('available_dates')->with('available_days')->get();
                return view('frontend.dashboard-candidates-online-coaching',compact('image','user_sessions','coaches','total_days','get_user_plan','user_plan'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexMyProfile()
    {
        try {
                $image = $this->getProfilePicture();
                $industry = Industry::get();
                $users = User::where('id',Auth::guard('users')->user()->id)->first();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                return view('frontend.dashboard-candidates-my-profile',compact('image','users','industry','total_days','get_user_plan','user_plan'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexPricing()
    {
        try {
                $image = $this->getProfilePicture();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                $user_subscription = PricingSubscription::with('pricing')->where('user_id',Auth::guard('users')->user()->id);
                $pricing = $user_subscription->where('payment_status',1)->first();
                
                $pricing_arr = [];
                if(!empty($pricing)){
                    $pricing_json = json_decode($pricing->pricing->plan_include,true);
                    
                    $plan_includes = json_decode($pricing_json['plan_include']);
                    $upgrade_plans = Pricing::where('id','>',$pricing->pricing_id)->get();
                    
                    $pricing_date = date('Y-m-d', strtotime(date('Y-m-d', strtotime($pricing->created_at)). ' +10 days'));
                    if(!empty($upgrade_plans)){
                            foreach($upgrade_plans as $key => $value) {
                                $pricing_arr['pricing_details'][$key]['id'] = $value->id;
                                $pricing_arr['pricing_details'][$key]['plan_name'] = $value->plan_name;
                                $pricing_arr['pricing_details'][$key]['discounted_price'] = $value->discounted_price;
                                $pricing_arr['pricing_details'][$key]['active_plan_price'] = $pricing->pricing_amount;
                                $pricing_arr['pricing_details'][$key]['plan_include'] = $value->plan_include;
                                $pricing_arr['pricing_details'][$key]['plan_slug'] = $value->plan_slug;
                                if($pricing->pricing_expiry_date >= date('Y-m-d')){

                                    if(in_array($pricing->pricing_id, [2,3,4,5])){
                                        if(date('Y-m-d') >= $pricing_date){
                                            $pricing_amount = $value->discounted_price;
                                        }else{
                                            $pricing_amount = $value->discounted_price - $pricing->pricing_amount;
                                        }
                                        $pricing_arr['pricing_details'][$key]['original_amount'] = $value->discounted_price;
                                        $pricing_arr['pricing_details'][$key]['pricing_amount'] = $pricing_amount;
                                    }
                                    else{
                                        if(date('Y-m-d') >= $pricing->pricing_expiry_date){
                                            $pricing_amount = $value->discounted_price;
                                        }else{
                                            $pricing_amount = $value->discounted_price - $pricing->pricing_amount;
                                        }
                                        $pricing_arr['pricing_details'][$key]['original_amount'] = $value->discounted_price;
                                        $pricing_arr['pricing_details'][$key]['pricing_amount'] = $pricing_amount;
                                    }
                                }else{
                                    $pricing_amount = $value->discounted_price;
                                    $pricing_arr['pricing_details'][$key]['original_amount'] = $value->discounted_price;
                                    $pricing_arr['pricing_details'][$key]['pricing_amount'] = $pricing_amount;
                                }
                           }
                    }
                    $all_plans = null;
                }else{
                    $plan_includes = null;
                    $pricing_arr = null;
                    $all_plans = Pricing::get(); 
                }
                return view('frontend.dashboard-candidates-pricing',compact('image','pricing','plan_includes','all_plans','total_days','get_user_plan','user_plan'))->with('pricing_details',$pricing_arr);
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function indexChangePassword()
    {
        try {
                $image = $this->getProfilePicture();
                $user_id = Auth::guard('users')->user()->id;
                $get_user_plan = $this->getUserActivePlan($user_id);
                $total_days = $this->getPlanExpiryDays($user_id);
                $user_plan = PricingSubscription::select('pricing_id')->where('user_id',$user_id)->where('payment_status',1)->first();
                return view('frontend.dashboard-candidates-change-password',compact('image','total_days','get_user_plan','user_plan'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteResumeBuilder($r_id)
    {
        try {
                if($r_id){
                    UserResume::where('id',$r_id)->delete();
                    $redirect_url = route('dashboard-candidates-resume-builder');
                    return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Resume has been deleted successfully.'), 200);                    
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, please try again.'), 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteCoverLetter($cl_id)
    {
        try {
                if($cl_id){
                    UserCoverLetter::where('id',$cl_id)->delete();
                    $redirect_url = route('dashboard-candidates-cover-letter');
                    return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Cover letter has been deleted successfully.'), 200);                    
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, please try again.'), 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteEmailTemplate($e_id)
    {
        try {
                if($e_id){
                    UserEmailTemplate::where('id',$e_id)->delete();
                    $redirect_url = route('dashboard-candidates-email-templates');
                    return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Email template has been deleted successfully.'), 200);                    
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, please try again.'), 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function downloadDashboardResumeBuilderPDF($r_id)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
                if($user_plans_active){
                    if($r_id){
                        $get_template_id = UserResume::where('id',$r_id)->first();
                        $template_id = $get_template_id->resume_template_name;
                        $getPersonalDetails = UserResume::with('user')->where('id',$r_id)->first();
                        if(empty($getPersonalDetails)){
                            return redirect()->route('choose-resume-template');
                        }
                        $getResumeFullNameEmail = User::where('id',$user_id)->first();
                        $getCareers = UserCareer::with('user_resume')->where('uc_user_resume_id',$r_id)->get();
                        $getEducation = UserEducation::with('user_resume')->where('ue_user_resume_id',$r_id)->get();
                        $getWebsiteSocialLink = UserWebsiteSocialLink::with('user_resume')->where('uwsl_user_resume_id',$r_id)->get();
                        $getSkill = UserSkill::with('user_resume')->where('us_user_resume_id',$r_id)->get();
                        $getHobby = UserHobbies::with('user_resume')->where('uh_user_resume_id',$r_id)->first();
                        $getInternship = UserInternship::with('user_resume')->where('ui_user_resume_id',$r_id)->get();
                        $getCourse = UserCourse::with('user_resume')->where('ucr_user_resume_id',$r_id)->get();
                        $getExtraCurricularActivity = UserExtraCurricularActivity::with('user_resume')->where('ueca_user_resume_id',$r_id)->get();
                        $getCustomSection = UserCustomSection::with('user_resume')->where('ucs_user_resume_id',$r_id)->get();
                        $getLanguage = UserLanguage::with('user_resume')->where('ul_user_resume_id',$r_id)->get();
                        $getReference = UserReference::with('user_resume')->where('ur_user_resume_id',$r_id)->get();
                        $getProfilePicture = UserResume::select('profile_image')->where('id',$r_id)->first();

                    $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');
                        if($template_id == 21){
                            $htmlRender = view('frontend.resume.latest_template'); 
                        }else if($template_id == 22){
                            // return view('frontend.resume.london');
                            $htmlRender = view('frontend.resume.london',$array)->render();
                        }else if($template_id == 17){
                            $htmlRender = view('frontend.resume.tokyo',$array)->render();
                        }else if($template_id == 2){
                            $htmlRender = view('frontend.resume.nutmeg',$array)->render();
                        }else if($template_id == 12){
                            $htmlRender = view('frontend.resume.morocon_mint',$array)->render();
                        }else if($template_id == 4){
                            $htmlRender = view('frontend.resume.violet',$array)->render();
                        }else if($template_id == 6){
                            $htmlRender = view('frontend.resume.cotton',$array)->render();
                        }else if($template_id == 11){
                            $htmlRender = view('frontend.resume.madrid',$array)->render();
                        }else if($template_id == 10){
                            $htmlRender = view('frontend.resume.ginger',$array)->render();
                        }else if($template_id == 7){
                            $htmlRender = view('frontend.resume.melon',$array)->render();
                        }else if($template_id == 8){
                            $htmlRender = view('frontend.resume.honey_leather',$array)->render();
                        }else if($template_id == 9){
                            $htmlRender = view('frontend.resume.lemon_grass',$array)->render();
                        }else if($template_id == 13){
                            $htmlRender = view('frontend.resume.cinnamon',$array)->render();
                        }else if($template_id == 16){
                            $htmlRender = view('frontend.resume.bellini',$array)->render();
                        }else if($template_id == 3){
                            $htmlRender = view('frontend.resume.lemon',$array)->render();
                        }else if($template_id == 18){
                            $htmlRender = view('frontend.resume.lavender',$array)->render();
                        }else if($template_id == 19){
                            $htmlRender = view('frontend.resume.orchid',$array)->render();
                        }else if($template_id == 20){
                            $htmlRender = view('frontend.resume.chocolate',$array)->render();
                        }else if($template_id == 15){
                            $htmlRender = view('frontend.resume.mochaccino',$array)->render();
                        }else if($template_id == 14){
                            $htmlRender = view('frontend.resume.hibiscus',$array)->render();
                        }else if($template_id == 1){
                            $htmlRender = view('frontend.resume.athena',$array)->render();
                        }else{
                            $htmlRender = view('frontend.resume.latest_template')->render();
                        }

                    $pdf = \App::make('snappy.pdf.wrapper');
                    $get_username = User::where('id',$user_id)->first();
                    if(!empty($getPersonalDetails->resume_title)){
                        $filename = $getPersonalDetails->resume_title.'_'.$user_id.'_'.$r_id.'.pdf';
                    }else{
                        $filename = $get_username->resume_fullname.'_'.$user_id.'_'.$r_id.'.pdf';
                    }
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    return $pdf->inline($filename);
                    }else{
                        return redirect()->back()->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                    }
                }else{
                    return redirect()->route('dashboard-candidates-pricing');
                }
                
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function downloadDashboardCoverLetterPDF($cl_id)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
                if($user_plans_active){
                    if($cl_id){
                        $get_template_id = UserCoverLetter::where('id',$cl_id)->first();
                        $template_id = $get_template_id->cl_template_name;
                        $getPersonalDetails = UserCoverLetter::with('user')->where('id',$cl_id)->first();
                        if(empty($getPersonalDetails)){
                            return redirect()->route('cover-letters');
                        }
                        $getResumeFullNameEmail = User::where('id',$user_id)->first();

                        $array = compact('getResumeFullNameEmail','getPersonalDetails');
                        if($template_id == 21){
                            $htmlRender = view('frontend.cover_letters.latest_template'); 
                        }else if($template_id == 22){
                            $htmlRender = view('frontend.cover_letters.london_cn',$array)->render();
                        }else if($template_id == 17){
                            $htmlRender = view('frontend.cover_letters.gardenia_cn',$array)->render();
                        }else if($template_id == 2){
                            $htmlRender = view('frontend.cover_letters.nutmeg_cn',$array)->render();
                        }else if($template_id == 12){
                            $htmlRender = view('frontend.cover_letters.morocon_mint_cn',$array)->render();
                        }else if($template_id == 4){
                            $htmlRender = view('frontend.cover_letters.violet_cn',$array)->render();
                        }else if($template_id == 6){
                            $htmlRender = view('frontend.cover_letters.cotton_cn',$array)->render();
                        }else if($template_id == 11){
                            $htmlRender = view('frontend.cover_letters.black_pepper_cn',$array)->render();
                        }else if($template_id == 10){
                            $htmlRender = view('frontend.cover_letters.ginger_cn',$array)->render();
                        }else if($template_id == 7){
                            $htmlRender = view('frontend.cover_letters.melon_cn',$array)->render();
                        }else if($template_id == 8){
                            $htmlRender = view('frontend.cover_letters.honey_leather_cn',$array)->render();
                        }else if($template_id == 9){
                            $htmlRender = view('frontend.cover_letters.lemon_grass_cn',$array)->render();
                        }else if($template_id == 13){
                            $htmlRender = view('frontend.cover_letters.cinnamon_cn',$array)->render();
                        }else if($template_id == 16){
                            $htmlRender = view('frontend.cover_letters.bellini_cn',$array)->render();
                        }else if($template_id == 3){
                            $htmlRender = view('frontend.cover_letters.lemon_cn',$array)->render();
                        }else if($template_id == 18){
                            $htmlRender = view('frontend.cover_letters.lavender_cn',$array)->render();
                        }else if($template_id == 19){
                            $htmlRender = view('frontend.cover_letters.orchid_cn',$array)->render();
                        }else if($template_id == 20){
                            $htmlRender = view('frontend.cover_letters.chocolate_cn',$array)->render();
                        }else if($template_id == 15){
                            $htmlRender = view('frontend.cover_letters.mochaccino_cn',$array)->render();
                        }else if($template_id == 5){
                            $htmlRender = view('frontend.cover_letters.vanilla_cn',$array)->render();
                        }else if($template_id == 14){
                            $htmlRender = view('frontend.cover_letters.hibiscus_cn',$array)->render();
                        }else if($template_id == 1){
                            $htmlRender = view('frontend.cover_letters.athena_cn',$array)->render();
                        }else{
                            $htmlRender = view('frontend.cover_letters.gardenia_cn');
                        }

                    $pdf = \App::make('snappy.pdf.wrapper');
                    $get_username = User::where('id',$user_id)->first();
                    if(!empty($getPersonalDetails->resume_title)){
                        $filename = $getPersonalDetails->resume_title.'_'.$user_id.'_'.$cl_id.'.pdf';
                    }else{
                        $filename = $get_username->resume_fullname.'_'.$user_id.'_'.$cl_id.'.pdf';
                    }
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    return $pdf->inline($filename);
                    }else{
                        return redirect()->back()->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                    }
                }else{
                    return redirect()->route('dashboard-candidates-pricing');
                }
                
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function dashboardUpdateProfile(Request $request)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $validator = Validator::make($request->all(), [
                    'name'  => 'required|min:2|max:255',
                    'email' => 'required|email|unique:users,email,' .$user_id. ',id,deleted_at,NULL',
                    'mobile_no' => 'required|numeric|digits_between:6,16|unique:users,mobile_no,' .$user_id. ',id,deleted_at,NULL',
                    'date_of_birth' => 'required|date_format:Y-m-d|before:today',
                    'industry' => 'required|not_in:0',
                    // 'gender' => 'required|in:1,2',
                    // 'work_experience' => 'required|not_in:0',
                    // 'education_level' => 'required|not_in:0',
                    // 'address' => 'required|min:2|max:255',
                    'profile_picture' => 'nullable'
                    // 'profile_picture' => 'nullable|mimes:jpeg,png,jpg'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                if($user_id){
                    if(!empty($request->file('profile_picture'))){
                        $image = $request->file('profile_picture');
                        $name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/frontend/images/user_profiles/'), $name);
                    }else{
                        $name = null;
                    }
                    $user = User::where("id",$user_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile_no' => $request->mobile_no,
                        'date_of_birth' => $request->date_of_birth,
                        'industry' => $request->industry,
                        'gender' => $request->gender,
                        'work_experience' => $request->work_experience,
                        'education_level' => $request->education_level,
                        'address' => $request->address,
                        'profile_picture' => $name
                    ]); 
                    $redirect_url = route('dashboard-candidates-my-profile');
                    return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Profile updated successfully.'), 200); 
                }else{
                     return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeUserPassword(Request $request)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $validator = Validator::make($request->all(), [
                    'current_password' => [
                        'required', function ($attribute, $value, $fail) {
                            if (!Hash::check($value, Auth::guard('users')->user()->password)) {
                                $fail('Current Password didn\'t match');
                            }
                        },
                    ],
                    'new_password' => 'required|min:6|different:current_password|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@\!#\$\^%&*()+=\-;,":<>\?]).{6,}$/i',
                    'confirm_password' => 'required|same:new_password'
                ],
                [
                    'new_password.regex' => 'Password must contain at least 6 characters, Including Upper/Lowercase, special character and numbers'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                if($user_id){
                    $user = User::where("id",$user_id)->update([
                        'password' => Hash::make($request->confirm_password)
                    ]); 
                    $redirect_url = route('dashboard-candidates-my-profile');
                    return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Password changed successfully.'), 200); 
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);                     
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeResumeTitle(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'resume_id'  => 'exists:user_resumes,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserResume::where('id',$request->resume_id)->update(['resume_title' => $request->resume_title]);
                $redirect_url = route('dashboard-candidates-resume-builder');
                return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Resume title updated successfully.'), 200); 
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeCoverLetterTitle(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'cl_id'  => 'exists:user_cover_letters,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserCoverLetter::where('id',$request->cl_id)->update(['cl_title' => $request->cover_title]);
                $redirect_url = route('dashboard-candidates-cover-letter');
                return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Cover Letter title updated successfully.'), 200); 
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeEmailTemplateTitle(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'email_id'  => 'exists:user_email_templates,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserEmailTemplate::where('id',$request->email_id)->update(['uet_title' => $request->email_template_title]);
                $redirect_url = route('dashboard-candidates-email-templates');
                return response()->json(array('redirect_url' => $redirect_url, 'responseMessage' => 'Email template title updated successfully.'), 200); 
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getCoachAvailableDates(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'coach_id' => 'exists:coaches,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $days_arr = array();
                $dates_arr = array();
                $coach_available_dates = CoachAvailabilityDate::where('coach',$request->coach_id)->first();
                // dd($coach_available_dates);
                if(!empty($coach_available_dates)){
                    $date = $this->displayDates($coach_available_dates['availability_start_date'], $coach_available_dates['availability_end_date']);
                    $get_coach_time = CoachAvailability::where('coach_id',$request->coach_id)->get();
                    // dd($get_coach_time);
                    if(!empty($get_coach_time)){
                        foreach ($get_coach_time as $key => $value) {
                            $days_arr[] = $value->day;
                        }
                        foreach ($date as $key => $value) {
                            $day_name = date('l', strtotime($value));
                            if(in_array($day_name, $days_arr)){
                                $dates_arr[] = date('m-d-Y',strtotime($value));
                            }
                        }
                        // dd($dates_arr);
                        $dates_final_arr = json_encode(array_values($dates_arr));
                        $coach_available_dates->dates_arr = $dates_final_arr;
                        // dd($coach_available_dates);
                        return response()->json(array('data' => $coach_available_dates, 'responseMessage' => 'Available dates.'), 200); 
                    }else{
                        return response()->json(array('responseMessage' => 'No dates available.'), 200); 
                    }
                    /*return response()->json(array('data' => $coach_available_dates, 'responseMessage' => 'Available dates.'), 200); */
                }else{
                    return response()->json(array('responseMessage' => 'No dates available.'), 200); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function dashboardUserSessions(Request $request)
    {
        try {
                $user_sessions = UserSession::where('user_id',Auth::guard('users')->user()->id)->get();
                $scheduled_sessions = UserSession::select('id')->where('user_id',Auth::guard('users')->user()->id)->where('status',0)->first();
                return view('frontend.dashboard-user-sesions',compact('user_sessions','scheduled_sessions'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function dashboardUserSessionsCoachesAvailability($id)
    {
        try {
                $available_coaches = Coach::with('available_dates')->has('available_dates')->get();
                return view('frontend.dashboard-user-sesion-coaches',compact('available_coaches'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveUserSessionCoach(Request $request)
    {
        try {
                // dd($request->all());
                $validator = Validator::make($request->all(), [
                    'coach'  => 'required',
                    'coach_date' => 'required',
                    'coach_time' => 'required'
                ],[
                    'coach.required' => 'Choose atleast one coach.',
                    'coach_date.required' => 'Choose date for session.',
                    'coach_time.required' => 'Choose time for session.'
                ]);
                if ($validator->fails()) {
                   return redirect()->back()->withErrors($validator)->withInput();
                }
                $user_id = Auth::guard('users')->user()->id;
                UserSession::where('user_id',$user_id)->update([
                    'coach_id' => $request->coach,
                ]);
                UserSession::where('id',$request->c_id)->update([
                    'status' => 1,
                    'session_date' => date('Y-m-d',strtotime($request->coach_date)),
                    'session_time' => $request->coach_time,
                    'requested_on' => date('Y-m-d H:i:s')
                ]);
                return redirect()->back();
                /*$available_coaches = Coach::with('available_dates')->has('available_dates')->get();
                return view('frontend.dashboard-user-sesion-coaches',compact('available_coaches'));*/
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(),'message.level' => 'danger']);
            // return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    function displayDates($date1, $date2, $format = 'Y-m-d' ) {
      $dates = array();
      $current = strtotime($date1);
      $date2 = strtotime($date2);
      $stepVal = '+1 day';
      while( $current <= $date2 ) {
         $dates[] = date($format, $current);
         $current = strtotime($stepVal, $current);
      }
      return $dates;
    }

    public function getCoachAvailableTimeSlots(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'coach_id' => 'exists:coaches,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $time_slots = array();
                $final_time_slots = array();
                $day_name = date('l', strtotime($request->coach_date));
                $get_coach_time = CoachAvailability::where('coach_id',$request->coach_id)->where('day',$day_name)->first();
                if(!empty($get_coach_time)){
                    $start_time = strtotime($get_coach_time['start_time']);
                    $end_time = strtotime($get_coach_time['end_time']);
                    
                    for ($i = $start_time; $i < $end_time; $i+=3600) {
                        $minutes = date(":i", $i);
                        $st_time = date("h:ia",$i);
                        $en_time = date("h:ia",$i);
                        $thirty_minutes = ":30";
                        $time_slots[] = array(
                            "start_time" => date('h:ia', ceil(strtotime($st_time)/3600)*3600), 
                            "end_time" => date('h:ia', (ceil(strtotime($st_time)/3600)*3600)+3600)
                        );
                    }
                    foreach ($time_slots as $key => $value) {
                        $slot = $value['start_time']." - ".$value['end_time'];
                        $check_user_session = UserSession::where('coach_id',$request->coach_id)->where('session_time',$slot)->where('session_date',$request->coach_date)->first();
                        if(!empty($check_user_session)){
                            $final_time_slots = $final_time_slots;
                        }else{
                            $final_time_slots[] = array(
                                'start_time' => $value['start_time'],
                                'end_time' => $value['end_time']
                            );
                        }
                    }
                    return response()->json(array('data' => $final_time_slots, 'responseMessage' => 'Time slots.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Time slots not available.'), 200);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function dashboardUpdateProfilePicture(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'uId' => 'exists:users,id,deleted_at,NULL',
                    'profile_picture' => 'nullable'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                if(!empty($request->file('profile_picture'))){
                    $image = $request->file('profile_picture');
                    $name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/frontend/images/user_profiles/'), $name);
                }else{
                    $name = null;
                }
                User::where('id',$request->uId)->update(['profile_picture' => $name]);
                return response()->json(array('responseMessage' => 'Profile updated successfully.'), 200); 
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }
}
