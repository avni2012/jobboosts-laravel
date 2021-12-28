<?php

namespace App\Http\Controllers\Frontend;

require base_path() . '/vendor/autoload.php';
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use App\LanguageLevel;
use App\Helpers\ResumeTemplates;
use Response;
use PDF;
use App;
use Validator;
use Auth;
use App\User;
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
use DB;
use File;
use App\Models\PricingSubscription;
use Imagick;

class ResumeController extends Controller
{
    //
    public function index()
    {
        try {
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function ConvertHTMLtoPDF(Request $request)    
    {
        try {
            return view('frontend.resume.check_pdf');
        } catch (Exception $e) {
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function HTMLtoPDF(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'html'  => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $pdf = \App::make('snappy.pdf.wrapper');
				$header='<!DOCTYPE html><img style="width:100%; height:30px;margin:0;padding:0;" src="http://demo-host.co/mumbailall/jay/JobBoosts/images/violate_back_2.jpeg"/>';
//->setOption('margin-top', 0)
				//background ->setOption('no-header-line')
				//->setOption('header-html',$header)
				//->setOption('no-header-line',true)
				//->setOption('background','http://demo-host.co/mumbailall/jay/JobBoosts/images/violate_back.jpeg')
                $pdf->loadHTML($request->html)->setOption('background',true)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0)->setOption('margin-left',0);
                return $pdf->inline();
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function chooseResumeTemplate(Request $request)
    {
        try {
            $resume_templates = ResumeTemplates::resumeTemplates();
            $resume_templates_category = ResumeTemplates::resumeTemplatesCategory();
            return view('frontend.resume.choose_template')->with('resume_templates',json_encode($resume_templates))->with('resume_templates_category',json_encode($resume_templates_category));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function updateResumeTemplate($r_id)
    {
        try {
            if(!Auth::guard('users')->check()){
                return redirect()->route('choose-resume-template');
            }
            $resume_templates = ResumeTemplates::resumeTemplates();
            $resume_templates_category = ResumeTemplates::resumeTemplatesCategory();
            $getResumeId = UserResume::select('id','resume_template_name')->where('user_id',Auth::guard('users')->user()->id)->where('id',$r_id)->first();
            return view('frontend.resume.update-resume-template',[$r_id], compact('getResumeId'))->with('resume_templates',json_encode($resume_templates))->with('resume_templates_category',json_encode($resume_templates_category));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeResumeTemplate(Request $request)
    {
        try {
                $validate = Validator([
                    'resume_id' => 'exists:user_resumes,id,deleted_at,NULL'
                ]);
                if ($validate->fails()) {
                    return response()->json(array('responseMessage' => $validate->errors()->first()), 400); 
                }
                $color_codes = array();
                $get_resume = UserResume::where('id',$request->resume_id)->first();
                $get_color_codes = ResumeTemplates::resumeTemplates();
                    if(!empty($get_color_codes)){
                        foreach ($get_color_codes as $key => $value) {
                            if(!empty($get_resume->resume_variation)){
                                if($request->template_id == $value['id']){
                                    if(!empty($value['color_codes'])){
                                        UserResume::where('id',$request->resume_id)->update(['resume_variation' => array_values($value['color_codes'])[0] ]);
                                    }
                                }
                            }
                            if($request->template_id == $value['id']){
                                $color_codes['colors'] = $value['color_codes'];
                            }
                        }
                    }
                UserResume::where('id',$request->resume_id)->update(['resume_template_name' => $request->template_id]);
                $redirect_url = route('resumes',[$request->resume_id]);
                return response()->json(array('responseMessage' => 'template changed.', 'redirect_url' => $redirect_url), 200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function resumeBuilderPage(Request $request, $user_resume_id)
    {
        try {   
                if(!$user_resume_id){
                    return redirect()->route('choose-resume-template');
                }
                if(!Auth::guard('users')->check()){
                    return redirect()->route('choose-resume-template');
                }
                    $custom_section_heading = '';
                    $color_codes = array();
                    $skill = Skill::get();
                    $getResumeTemplateId = UserResume::with('user')->where('user_id',Auth::guard('users')->user()->id)->where('id',$user_resume_id)->first();
                    if(empty($getResumeTemplateId)){
                        return redirect()->route('choose-resume-template');
                    }
                    // $getCareers = UserCareer::with('user_resume')->where('uc_user_resume_id',$user_resume_id)->get();
                    $getCareers = $this->getEmploymentDetails($user_resume_id);
                    $getEducation = $this->getEducationDetails($user_resume_id);
                    $getWebsiteSocialLink = $this->getWebsiteSocialDetails($user_resume_id);
                    $getSkill = $this->getSkillDetails($user_resume_id);
                    $getHobby = $this->getHobbyDetails($user_resume_id);
                    $getInternship = $this->getInternshipDetails($user_resume_id);
                    $getCourse = $this->getCourseDetails($user_resume_id);
                    $getExtraCurricularActivity = $this->getExtraCurricularActivityDetails($user_resume_id);
                    $getCustomSection = $this->getCustomSectionDetails($user_resume_id);
                    if(count($getCustomSection) > 0){
                        foreach ($getCustomSection as $key => $value) {
                            $custom_section_heading = $value->ucs_main_heading;
                        }
                    }
                    $getLanguage = $this->getLanguageDetails($user_resume_id);
                    $getReference = $this->getReferenceDetails($user_resume_id);
                    $getProfilePicture = $this->getProfilePictureData($user_resume_id);

                    $user_id = Auth::guard('users')->user()->id;
                    $template_id = $getResumeTemplateId->resume_template_name;

                    /*$getResumeFullNameEmail = $resume_email_fullname = User::select('resume_email','resume_fullname')->where('id',Auth::guard('users')->user()->id)->first();*/
                    // $getPersonalDetails = $personal_details = UserResume::where('user_id',$user_id)->where('resume_template_name',$template_id)->first();
                    $getResumeFullNameEmail = $resume_email_fullname = $this->getResumeFullNameEmail(Auth::guard('users')->user()->id);
                    $getPersonalDetails = $personal_details = $this->getResumePersonalDetails($user_resume_id);
                    /*$getPersonalDetails = $personal_details = UserResume::where('id',$user_resume_id)->first();*/

                    $get_color_codes = ResumeTemplates::resumeTemplates();
                    if(!empty($get_color_codes)){
                        foreach ($get_color_codes as $key => $value) {
                            if(empty($personal_details->resume_variation)){
                                if($personal_details->resume_template_name == $value['id']){
                                    if(!empty($value['color_codes'])){
                                        UserResume::where('id',$user_resume_id)->update(['resume_variation' => array_values($value['color_codes'])[0] ]);
                                    }
                                }
                            }
                            if($template_id == $value['id']){
                                $color_codes['colors'] = $value['color_codes'];
                            }
                        }
                    }
                    $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');
                    $pdf = \App::make('snappy.pdf.wrapper');
                    $path = public_path('frontend/resume_pdf/');
                    $filename = $resume_email_fullname->resume_fullname.'_'.$user_id.'_'.$user_resume_id.'.pdf';

                    $htmlRender = $this->resumeTemplatesSelect($user_resume_id,$template_id);

                    if(file_exists($path.$filename)) {
                        unlink($path.$filename);
                        $pdf->loadHTML($htmlRender);
                        $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',5);
                        $pdf = $this->resumeHeaders($pdf,$filename,$template_id,$getPersonalDetails->resume_variation,$user_resume_id);
                        $pdf->save($path.$filename);
                        // $image_path = public_path('frontend/images/user_resumes_pdfs/');
                    }else{
                        $pdf->loadHTML($htmlRender);
                        $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',5);
                        $pdf = $this->resumeHeaders($pdf,$filename,$template_id,$getPersonalDetails->resume_variation,$user_resume_id);
                        $pdf->save($path.$filename);
                    }       
                    // Generate image
                    $this->thumbImageUpdate($resume_email_fullname->resume_fullname,$user_id,$user_resume_id);
                    /*$file_name = $resume_email_fullname->resume_fullname.'_'.$user_id.'_'.$user_resume_id; 
                    $imagick = new Imagick();
                    $imagick->setResolution(200, 200);
                    $imagick->readImage($path.$filename.'[0]');
                    $file_name = $file_name.'_thumb_'.$user_id.'.jpg';
                    $imagick->writeImages(public_path('/frontend/images/user_resumes/'.$file_name),false);

                    UserResume::where('id',$user_resume_id)->update([
                        'resume_thumb_image' => $file_name
                    ]);*/
                    return view('frontend.resume.resumes',compact('color_codes','user_resume_id','template_id','resume_email_fullname','personal_details','skill','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture','custom_section_heading'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function thumbImageUpdate($full_name,$user_id,$user_resume_id)
    {
        try {
                $path = public_path('frontend/resume_pdf/');
                $filename = $full_name.'_'.$user_id.'_'.$user_resume_id.'.pdf';
                $file_name = $full_name.'_'.$user_id.'_'.$user_resume_id; 
                $imagick = new Imagick();
                $imagick->setResolution(200, 200);
                $imagick->readImage($path.$filename.'[0]');
                $file_name = $file_name.'_thumb_'.$user_id.'.jpg';
                if(file_exists(public_path('/frontend/images/user_resumes/'.$file_name))){
                    unlink(public_path('/frontend/images/user_resumes/'.$file_name));
                    $imagick->writeImages(public_path('/frontend/images/user_resumes/'.$file_name),false);
                }else{
                    $imagick->writeImages(public_path('/frontend/images/user_resumes/'.$file_name),false);
                }

                UserResume::where('id',$user_resume_id)->update([
                    'resume_thumb_image' => $file_name
                ]);

                // $this->saveAndLoadPDF($user_resume_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
            } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getUserThumbImageData($resume_id)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $user = User::where('id',$user_id)->first();
                $this->thumbImageUpdate($user->resume_fullname,$user_id,$resume_id);
            } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveUserResume(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'exists:users,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $add_user_resume = [
                    'user_id' => $request->user_id,
                    'resume_template_name' => $request->template_id
                ];
                $user_resume = UserResume::create([
                    'user_id' => $request->user_id,
                    'resume_template_name' => $request->template_id
                ]);
                $redirect_url = route('resumes',[$user_resume->id]);
                $get_color_codes = ResumeTemplates::resumeTemplates();
                    if(!empty($get_color_codes)){
                        foreach ($get_color_codes as $key => $value) {
                            if(!empty($user_resume->resume_variation)){
                                if($user_resume->resume_template_name == $value['id']){
                                    if(!empty($value['color_codes'])){
                                        UserResume::where('id',$user_resume->id)->update(['resume_variation' => array_values($value['color_codes'])[0] ]);
                                    }
                                }
                            }
                            if($user_resume->resume_template_name == $value['id']){
                                $color_codes['colors'] = $value['color_codes'];
                            }
                        }
                    }
                $this->saveAndLoadPDF($user_resume->id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('data' => $user_resume, 'redirect_url' => $redirect_url, 'responseMessage' => 'success'), 200);   
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function resumeBuildingView(Request $request, $template_id)
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

    public function addUserResumeEmailFullname(Request $request)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                $validator = Validator::make($request->all(), [
                    /*"resume_email" => "required|unique:users,resume_email," . $user_id . ",id,deleted_at,NULL|unique:users,email,NULL,id,deleted_at,NULL",*/
                    "resume_email" => "required|email",
                    'resume_fullname' => 'required'
                ],
                [
                    'resume_email.unique' => ':attribute is already used and your email id for resume builder must be different from signin email'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $save_resume_details = [
                    'resume_email' => $request->resume_email,
                    'resume_fullname' => $request->resume_fullname
                ];
                $template_id = $request->template_id;
                $user_resume_data = User::where('id',$user_id)->update($save_resume_details);

                if($user_resume_data){
                    $user_resume = UserResume::create([
                        'user_id' => $user_id,
                        'resume_template_name' => $template_id
                    ]);
                    $redirect_url = route('resumes',[$user_resume->id]);
                    // $this->saveAndLoadPDF($user_resume->id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'You are ready to build your resume','redirect_url' => $redirect_url), 200); 
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function AppendEmployment($employment_count, Request $request)
    {
        try {
                $getCareer = $request->employment_details;
                $get_careers = $this->getEmploymentDetails($request->r_id);
                $employment_count = $get_careers->count();
                if(empty($getCareer)){
                    $get_careers = UserCareer::create([
                        'uc_user_resume_id' => $request->r_id
                    ]);
                }
                $careers = $get_careers;
                if($employment_count >= 0) {
                    $index = $employment_count;
                    $returnHTML = view('frontend.resume.employment',compact('index'),['careers' => $careers])->render();
                    return response()->json(array('html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with employment section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function AppendEducation($education_count, Request $request)
    {
        try {   
                $getEducation = $request->education_details;
                $get_education = $this->getEducationDetails($request->r_id);
                $education_count = $get_education->count();
                if(empty($getEducation)){
                    $get_education = UserEducation::create([
                        'ue_user_resume_id' => $request->r_id
                    ]);
                }
                $education = $get_education;
                if($education_count >= 0) {
                    $education_index = $education_count;
                    $returnHTML = view('frontend.resume.education',compact('education_index'),['education' => $education])->render();
                    return response()->json(array('data' => $get_education, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with education section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendWebsiteSocialLinks($website_social_link_count, Request $request)
    {
        try {   
                $getWebsiteSocial = $request->website_links;
                $get_website_links = $this->getWebsiteSocialDetails($request->r_id);
                $website_social_link_count = $get_website_links->count();
                if(empty($getWebsiteSocial)){
                    $get_website_links = UserWebsiteSocialLink::create([
                        'uwsl_user_resume_id' => $request->r_id
                    ]);
                }
                $websiteLinks = $get_website_links;
                if($website_social_link_count >= 0) {
                    $website_social_link_index = $website_social_link_count;
                    $returnHTML = view('frontend.resume.website-and-social-link',['website_social_link_index' => $website_social_link_index, 'websiteLinks' => $websiteLinks])->render();
                    return response()->json(array('data' => $get_website_links, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with website link section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendSkills(Request $request, $skills_count)
    {
        try {   
                $getSkills = $request->skill_details;
                $get_skills = $this->getSkillDetails($request->r_id);
                $skills_count = $get_skills->count();
                $validator = Validator::make($request->all(), [
                    'skill' => 'nullable',
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                if(empty($getSkills)){
                    $get_skills = UserSkill::create([
                        'us_user_resume_id' => $request->r_id
                    ]);
                }
                $skillData = $get_skills;
                if($skills_count >= 0){
                    $skill_index = $skills_count;
                    $skill_name = $request->skill;
                    $returnHTML = view('frontend.resume.skill',['skill_index' => $skill_index,'skill_name' => $skill_name, 'skillData' => $skillData])->render();
                    return response()->json(array('data' => $get_skills, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with skill section, please try again.'), 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendCustomSection($custom_section_count, Request $request)
    {
        try {   
                $getCustomSection = $request->custom_details;
                $get_custom_section = $this->getCustomSectionDetails($request->r_id);
                $custom_section_count = $get_custom_section->count();
                if(empty($getCustomSection)){
                    $get_custom_section = UserCustomSection::create([
                        'ucs_user_resume_id' => $request->r_id
                    ]);
                }
                $custom = $get_custom_section;
                if($custom_section_count >= 0) {
                    $custom_section_count_index = $custom_section_count;
                    $returnHTML = view('frontend.resume.custom_section',['custom_section_count_index' => $custom_section_count_index, 'custom' => $custom])->render();
                    return response()->json(array('data' => $get_custom_section, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with custom section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendCourse($course_link_count, Request $request)
    {
        try {   
                $getCourse = $request->course_details;
                $get_course = $this->getCourseDetails($request->r_id);
                $course_link_count = $get_course->count();
                if(empty($getCourse)){
                    $get_course = UserCourse::create([
                        'ucr_user_resume_id' => $request->r_id
                    ]);
                }
                $course = $get_course;
                if($course_link_count >= 0) {
                    $course_link_count_index = $course_link_count;
                    $returnHTML = view('frontend.resume.course',['course_link_count_index' => $course_link_count_index, 'course' => $course])->render();
                    return response()->json(array('data' => $get_course, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with course section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendExtraCurricularActivity($extra_curricular_activity_count, Request $request)
    {
        try {   
                $getExtraCurricularActivity = $request->extra_activity_details;
                $get_extra_activity = $this->getExtraCurricularActivityDetails($request->r_id);
                $extra_curricular_activity_count = $get_extra_activity->count();
                if(empty($getExtraCurricularActivity)){
                    $get_extra_activity = UserExtraCurricularActivity::create([
                        'ueca_user_resume_id' => $request->r_id
                    ]);
                }
                $extra_activity = $get_extra_activity;
                if($extra_curricular_activity_count >= 0) {
                    $extra_curricular_activity_count_index = $extra_curricular_activity_count;
                    $returnHTML = view('frontend.resume.extra-curricular-activity',['extra_curricular_activity_count_index' => $extra_curricular_activity_count_index, 'extra_activity' => $extra_activity])->render();
                    return response()->json(array('data' => $get_extra_activity, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with extra curricular activity section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendHobbies(Request $request)
    {
        try {   
                $get_hobbies = $request->hobbies;
                if(empty($get_hobbies)){
                    UserHobbies::insert([
                        'uh_user_resume_id' => $request->r_id
                    ]);
                }
                if($request->ajax()){
                    return view('frontend.resume.hobbies',compact('get_hobbies')); 
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with hobby section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendInternship($internship_count, Request $request)
    {
        try {   
                $getInternship = $request->internship_details;
                $get_internship = $this->getInternshipDetails($request->r_id);
                $internship_count = $get_internship->count();
                if(empty($getInternship)){
                    $get_internship = UserInternship::create([
                        'ui_user_resume_id' => $request->r_id
                    ]);
                }
                $internship = $get_internship;
                if($internship_count >= 0) {
                    $internship_count_index = $internship_count;
                    $returnHTML = view('frontend.resume.internship',['internship_count_index' => $internship_count_index, 'internship' => $internship])->render();
                    return response()->json(array('data' => $get_internship, 'html'=>$returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with internship section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendLanguage($language_count, Request $request)
    {
        try {   
                $getLanguage = $request->language_details;
                $get_language = $this->getLanguageDetails($request->r_id);
                $language_count = $get_language->count();
                if(empty($getLanguage)){
                    $get_language = UserLanguage::create([
                        'ul_user_resume_id' => $request->r_id
                    ]);
                }
                $language = $get_language;
                if($language_count >= 0) {
                    $language_count_index = $language_count;
                    $language_levels = LanguageLevel::get();
                    $returnHTML = view('frontend.resume.language',['language_count_index' => $language_count_index,'language_levels' => $language_levels, 'language' => $language])->render();
                    return response()->json(array('data' => $get_language, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with language section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function AppendReference($reference_count, Request $request)
    {
        try {   
                $getReference = $request->reference_details;
                $get_reference = $this->getReferenceDetails($request->r_id);
                $reference_count = $get_reference->count();
                if(empty($getReference)){
                    $get_reference = UserReference::create([
                        'ur_user_resume_id' => $request->r_id
                    ]);
                }
                $reference = $get_reference;
                if($reference_count >= 0) {
                    $reference_count_index = $reference_count;
                    $returnHTML = view('frontend.resume.reference',['reference_count_index' => $reference_count_index, 'reference' => $reference])->render();
                    return response()->json(array('data' => $get_reference, 'html' => $returnHTML));
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong with reference section, please try again.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getAutoSuggestSkills()
    {
        try {
                $skill = Skill::get();
                if(!empty($skill)){
                    return response()->json(['skills' => $skill, 'status' => 1, 'message' => 'Skills get successfully.']);
                }else{
                    return response()->json(['skills' => null, 'status' => 0, 'message' => 'Skills not found.']);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getSampleTemplate(Request $request, $user_resume_id)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                // $getResumeFullNameEmail = User::where('id',$user_id)->first();
                
                    // $getPersonalDetails = UserResume::with('user')->where('user_id',Auth::guard('users')->user()->id)->where('id',$user_resume_id)->first();
                    if(empty($getPersonalDetails)){
                        return redirect()->route('choose-resume-template');
                    }
                    $getCareers = $this->getEmploymentDetails($user_resume_id);
                    $getEducation = $this->getEducationDetails($user_resume_id);
                    $getWebsiteSocialLink = $this->getWebsiteSocialDetails($user_resume_id);
                    $getSkill = $this->getSkillDetails($user_resume_id);
                    $getHobby = $this->getHobbyDetails($user_resume_id);
                    $getInternship = $this->getInternshipDetails($user_resume_id);
                    $getCourse = $this->getCourseDetails($user_resume_id);
                    $getExtraCurricularActivity = $this->getExtraCurricularActivityDetails($user_resume_id);
                    $getCustomSection = $this->getCustomSectionDetails($user_resume_id);
                    $getLanguage = $this->getLanguageDetails($user_resume_id);
                    $getReference = $this->getReferenceDetails($user_resume_id);
                    $getProfilePicture = $this->getProfilePictureData($user_resume_id);
                    $getResumeFullNameEmail = $this->getResumeFullNameEmail(Auth::guard('users')->user()->id);
                    $getPersonalDetails = $this->getResumePersonalDetails($user_resume_id);

                $template_id = $getPersonalDetails->resume_template_name;

                $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');
                if($template_id == 21){
                        return view('frontend.resume.latest_template'); 
                    }else if($template_id == 22){
                        return view('frontend.resume.london',$array);
                    }else if($template_id == 17){
                        return view('frontend.resume.tokyo',$array);
                    }else if($template_id == 2){
                        return view('frontend.resume.nutmeg',$array);
                    }else if($template_id == 12){
                        return view('frontend.resume.morocon_mint',$array);
                    }else if($template_id == 4){
                        return view('frontend.resume.violet',$array);
                    }else if($template_id == 6){
                        return view('frontend.resume.cotton',$array);
                    }else if($template_id == 11){
                        return view('frontend.resume.madrid',$array);
                    }else if($template_id == 10){
                        return view('frontend.resume.ginger',$array);
                    }else if($template_id == 7){
                        return view('frontend.resume.melon',$array);
                    }else if($template_id == 8){
                        return view('frontend.resume.honey_leather',$array);
                    }else if($template_id == 9){
                        return view('frontend.resume.lemon_grass',$array);
                    }else if($template_id == 13){
                        return view('frontend.resume.cinnamon',$array);
                    }else if($template_id == 16){
                        return view('frontend.resume.bellini',$array);
                    }else if($template_id == 3){
                        return view('frontend.resume.lemon',$array);
                    }else if($template_id == 18){
                        return view('frontend.resume.lavender',$array);
                    }else if($template_id == 19){
                        return view('frontend.resume.orchid',$array);
                    }else if($template_id == 20){
                        return view('frontend.resume.chocolate',$array);
                    }else if($template_id == 15){
                        return view('frontend.resume.mochaccino',$array);
                    }else if($template_id == 5){
                        return view('frontend.resume.vanilla',$array);
                    }else if($template_id == 14){
                        return view('frontend.resume.hibiscus',$array);
                    }else if($template_id == 1){
                        return view('frontend.resume.athena',$array);
                    }else{
                        return view('frontend.resume.latest_template');
                    }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    /*public function ProfilePictureCrop(Request $request)
    {
        try {   
                if($request->ajax()){
                    $image_file = $request->image;
                    list($type, $image_file) = explode(';', $image_file);
                    list(, $image_file)      = explode(',', $image_file);
                    $image_file = base64_decode($image_file);
                    $image_name= time().'_'.rand(100,999).'.png';
                    $path = public_path('frontend/images/profile_pictures/'.$image_name);
                    file_put_contents($path, $image_file);
                    $data = $request->image;
                    $image_array_1 = explode(";", $data);
                    $image_array_2 = explode(",", $image_array_1[1]);
                    $data = base64_decode($image_array_2[1]);
                    $imageName = time().'_'.rand(100,999).'.png';
                    file_put_contents($imageName, $data);
                    $image_file = addslashes(file_get_contents($imageName));
                    dd($image_file);
                    $save_profile = UserResume::updateOrCreate([
                        'user_id'   => Auth::guard('users')->user()->id,
                        'id' => $request->r_id
                    ],[
                        'profile_image' => $image_name
                    ]);
                    $get_template_id = UserResume::where('user_id',Auth::guard('users')->user()->id)->where('id',$request->r_id)->first();
                    // PDF load
                    $this->saveAndLoadPDF($request->r_id,null,null,$image_name,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(['responseMessage' => 'Profile saved successfully'], 200);
                }else{
                    return response()->json(['responseMessage' => 'Something went wrong, try again later.'], 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }*/
    public function ProfilePictureUpload(Request $request)
    {
        try {   
                if($request->ajax()){
                    
                    if($request->file('profile_picture'))
                    {
                        $imageName = time().'.'.request()->profile_picture->getClientOriginalExtension();
                        request()->profile_picture->move(public_path().'/frontend/images/profile_pictures/', $imageName);
                        $user_resume = UserResume::find($request->resume_id);
                        $user_resume->profile_image = $imageName;
                        $user_resume->save();
                    }
                    // PDF load
                    $this->saveAndLoadPDF($request->resume_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(['responseMessage' => 'Profile saved successfully'], 200);
                }else{
                    return response()->json(['responseMessage' => 'Something went wrong, try again later.'], 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deletePictureCrop(Request $request)
    {
        try {   
                $getProfile = UserResume::where('id',$request->r_id)->first();
                if($getProfile){
                    $profile_image = UserResume::where('id',$request->r_id);
                    $get_profile_image = $profile_image->first();
                    $delete_profile = $get_profile_image->update(['profile_image' => null]);
                    $image_path = public_path().'/frontend/images/profile_pictures/'.$get_profile_image->profile_image;
                    /*if(File::exists($image_path)) {
                        File::delete($image_path);
                    }*/
                    $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Profile deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Invalid Resume Id.'), 400);
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function storeUserResumeDetails(Request $request)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                $personal_details = [
                    'main_job_title' => $request->job_title,
                    'resume_title' => $request->main_title,
                    // 'resume_variation' => $request->resume_variation,
                    // 'resume_template_name' => $request->template_id,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                    'driving_licence' => $request->driving_licence,
                    'nationality' => $request->nationality,
                    'place_of_birth' => $request->place_of_birth,
                    'date_of_birth' => $request->date_of_birth,
                    'profile_summary' => $request->professional_summary
                ];
                $user_resume = UserResume::where('user_id',$user_id)->where('id',$request->resume_id);
                $save_personal_details = $user_resume->update($personal_details);
                $user_resume = $user_resume->first();

                $this->saveAndLoadPDF($request->resume_id,null,$user_resume,null,null,null,null,null,null,null,null,null,null,null,null);
                $this->getUserThumbImageData($request->resume_id);
                return response()->json(array('data' => $user_resume, 'responseMessage' => 'saved data successfully'), 200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveCareers(Request $request)
    {
        try{
                $data = $request->all();        
                $employment = array();
                parse_str($data['employment_data'], $employment);
                // User Resume Careers Section
                    $user_id = Auth::guard('users')->user()->id;
                    if(!empty($employment)){
                        $get_career = UserCareer::where('uc_user_resume_id',$request->r_id)->get();
                        if(!empty($get_career)){
                            foreach ($get_career as $key => $value) {
                                if($employment['present_label'][$key] == 0){
                                    $employment_end_date = $employment['employer_end_date'][$key];
                                }else if($employment['present_label'][$key] == 1){
                                    $employment_end_date = "Present";
                                }

                                $user_careers = UserCareer::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'uc_job_title' => $employment['employer_job_title'][$key],
                                    'uc_company_name' => $employment['employer'][$key], 
                                    'uc_start_date' => $employment['employer_start_date'][$key], 
                                    'uc_end_date' => $employment_end_date,
                                    'uc_is_present' => $employment['present_label'][$key], 
                                    'uc_city' => $employment['employer_city'][$key], 
                                    'career_description' => $employment['employment_description'][$key] 
                                ]);
                            }
                            if(!empty($user_careers)){
                                $this->saveAndLoadPDF($user_careers->uc_user_resume_id,null,null,null,$user_careers,null,null,null,null,null,null,null,null,null,null);
                                $this->getUserThumbImageData($user_careers->uc_user_resume_id);
                            }
                            return response()->json(array('data' => $user_careers, 'responseMessage' => 'Employment saved successfully.'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveEducation(Request $request)
    {
        try{
                $data = $request->all();        
                $education = array();
                parse_str($data['education_data'], $education);
                // User Resume Education Section
                    $user_id = Auth::guard('users')->user()->id;
                    if(!empty($education)){
                        $get_education_data = UserEducation::where('ue_user_resume_id',$request->r_id)->get();
                        if(!empty($get_education_data)){
                            foreach ($get_education_data as $key => $value) {
                                if($education['education_label'][$key] == 0){
                                    $education_end_date = $education['education_end_date'][$key];
                                }else if($education['education_label'][$key] == 1){
                                    $education_end_date = "Present";
                                }
                                $user_education = UserEducation::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ue_degree' => $education['education_degree'][$key], 
                                    'ue_school_name' => $education['education_school'][$key], 
                                    'ue_start_date' => $education['education_start_date'][$key], 
                                    'ue_end_date' => $education_end_date,
                                    'ue_is_present' => $education['education_label'][$key], 
                                    'ue_city' => $education['education_city'][$key], 
                                    'education_description' => $education['education_description'][$key] 
                                ]);
                            }
                            if(!empty($user_education)){
                                $this->saveAndLoadPDF($user_education->ue_user_resume_id,null,null,null,null,$user_education,null,null,null,null,null,null,null,null,null);
                                $this->getUserThumbImageData($user_education->ue_user_resume_id);
                            }
                            return response()->json(array('data' => $user_education, 'responseMessage' => 'Education saved successfully.'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveWebsiteSocialLinks(Request $request)
    {
        try{
                $data = $request->all();        
                $website_links = array();
                parse_str($data['website_social_link_data'], $website_links);
                // User Resume Website Social Link Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($website_links)){
                        $get_website_link = UserWebsiteSocialLink::where('uwsl_user_resume_id',$request->r_id)->get();
                        if(!empty($get_website_link)){
                            foreach ($get_website_link as $key => $value) {
                                $user_website_links = UserWebsiteSocialLink::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'uwsl_website_label' => $website_links['website_social_label'][$key], 
                                    'uwsl_website_link' => $website_links['website_social_link'][$key] 
                                ]);
                            }
                            if(!empty($user_website_links)){
                                $this->saveAndLoadPDF($user_website_links->uwsl_user_resume_id,null,null,null,null,null,$user_website_links,null,null,null,null,null,null,null,null);
                                $this->getUserThumbImageData($user_website_links->uwsl_user_resume_id);
                            }
                            return response()->json(array('data' => $user_website_links, 'responseMessage' => 'Website links saved successfully.'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveSkills(Request $request)
    {
        try{
                $data = $request->all();        
                $skills = array();
                parse_str($data['skill_data'], $skills);
                // User Resume Skill Section
                    $user_id = Auth::guard('users')->user()->id;
                    if(!empty($skills)){
                        $get_skill = UserSkill::where('us_user_resume_id',$request->r_id)->get();
                        if(!empty($get_skill)){
                            foreach ($get_skill as $key => $value) {
                                $user_skills = UserSkill::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'us_skill' => $skills['skill'][$key], 
                                    'us_skill_level' => $skills['skill_level'][$key] 
                                ]);
                            }
                            if(!empty($user_skills)){
                                $this->saveAndLoadPDF($user_skills->us_user_resume_id,null,null,null,null,null,null,$user_skills,null,null,null,null,null,null,null);
                                $this->getUserThumbImageData($user_skills->us_user_resume_id);
                            }
                            return response()->json(array('data' => $user_skills, 'responseMessage' => 'Skill saved successfully.'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveHobby(Request $request)
    {
        try{
                $data = $request->all();        
                $hobby = array();
                parse_str($data['hobby_data'], $hobby);

                $user_id = Auth::guard('users')->user()->id;
                if(!empty($hobby)){
                        $get_hobby = UserHobbies::where('uh_user_resume_id',$request->r_id)->first();
                        if(!empty($get_hobby)){
                            $user_hobby = UserHobbies::updateOrCreate([
                                'id' => $get_hobby->id
                            ],[
                                'uh_hobby' => $hobby['hobbies']
                            ]);
                            if(!empty($user_hobby)){
                                $this->saveAndLoadPDF($user_hobby->uh_user_resume_id,null,null,null,null,null,null,null,$user_hobby,null,null,null,null,null,null);
                                $this->getUserThumbImageData($user_hobby->uh_user_resume_id);
                            }
                            return response()->json(array('data' => $user_hobby, 'responseMessage' => 'Hobby saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveCustomSection(Request $request)
    {
        try{
                $data = $request->all();        
                $custom = array();
                parse_str($data['custom_data'], $custom);
                // User Resume Custom Section
                    $user_id = Auth::guard('users')->user()->id;
                    if(!empty($custom)){
                        $get_custom_data = UserCustomSection::where('ucs_user_resume_id',$request->r_id)->get();
                        if(!empty($get_custom_data)){
                            foreach ($get_custom_data as $key => $value) {
                                if($custom['custom_present_label'][$key] == 0){
                                    $custom_end_date = $custom['custom_end_date'][$key];
                                }else if($custom['custom_present_label'][$key] == 1){
                                    $custom_end_date = "Present";
                                }
                                $user_custom_section = UserCustomSection::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ucs_title' => $custom['custom_title'][$key], 
                                    'ucs_start_date' => $custom['custom_start_date'][$key], 
                                    'ucs_end_date' => $custom_end_date,
                                    'ucs_is_present' => $custom['custom_present_label'][$key], 
                                    'ucs_city' => $custom['custom_section_city'][$key], 
                                    'custom_description' => $custom['custom_description'][$key] 
                                ]);
                            }
                            if(!empty($user_custom_section)){
                                $this->saveAndLoadPDF($user_custom_section->ucs_user_resume_id,null,null,null,null,null,null,null,null,null,$user_custom_section,null,null,null,null);
                                $this->getUserThumbImageData($user_custom_section->ucs_user_resume_id);
                            }
                            return response()->json(array('data' => $user_custom_section, 'responseMessage' => 'custom section saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveInternship(Request $request)
    {
        try{
                $data = $request->all();        
                $internship = array();
                parse_str($data['internship_data'], $internship);
                // User Resume Internship Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($internship)){
                        $get_internship_data = UserInternship::where('ui_user_resume_id',$request->r_id)->get();
                        if(!empty($get_internship_data)){
                            foreach ($get_internship_data as $key => $value) {
                                if($internship['internship_present_label'][$key] == 0){
                                    $internship_end_date = $internship['internship_end_date'][$key];
                                }else if($internship['internship_present_label'][$key] == 1){
                                    $internship_end_date = "Present";
                                }
                                $user_internship = UserInternship::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ui_job_title' => $internship['internship_job_title'][$key], 
                                    'ui_employer' => $internship['internship_employer'][$key], 
                                    'ui_start_date' => $internship['internship_start_date'][$key], 
                                    'ui_end_date' => $internship_end_date,
                                    'ui_is_present' => $internship['internship_present_label'][$key], 
                                    'ui_city' => $internship['internship_city'][$key], 
                                    'internship_description' => $internship['internship_description'][$key] 
                                ]);
                            }
                            if(!empty($user_internship)){
                                $this->saveAndLoadPDF($user_internship->ui_user_resume_id,null,null,null,null,null,null,null,null,null,$user_internship,null,null,null,null,null);
                                $this->getUserThumbImageData($user_internship->ui_user_resume_id);
                            }
                            return response()->json(array('data' => $user_internship, 'responseMessage' => 'Internship saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveCourse(Request $request)
    {
        try{
                $data = $request->all();        
                $course = array();
                parse_str($data['course_data'], $course);
                // User Resume Course Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($course)){
                        $get_course_data = UserCourse::where('ucr_user_resume_id',$request->r_id)->get();
                        if(!empty($get_course_data)){
                            foreach ($get_course_data as $key => $value) {
                                if($course['course_present_label'][$key] == 0){
                                    $course_end_date = $course['course_end_date'][$key];
                                }else if($course['course_present_label'][$key] == 1){
                                    $course_end_date = "Present";
                                }
                                $user_course = UserCourse::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ucr_course_name' => $course['course_title'][$key], 
                                    'ucr_institute' => $course['institution'][$key], 
                                    'ucr_start_date' => $course['course_start_date'][$key], 
                                    'ucr_end_date' => $course_end_date,
                                    'ucr_is_present' => $course['course_present_label'][$key] 
                                ]);
                            }
                            if(!empty($user_course)){
                                $this->saveAndLoadPDF($user_course->ucr_user_resume_id,null,null,null,null,null,null,null,null,null,null,$user_course,null,null,null);
                                $this->getUserThumbImageData($user_course->ucr_user_resume_id);
                            }
                            return response()->json(array('data' => $user_course, 'responseMessage' => 'Course saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function ajaxExtraCurricularActivitySave(Request $request)
    {
        try{
                $data = $request->all();        
                $extra_activity = array();
                parse_str($data['extra_activity_data'], $extra_activity);
                // User Resume Careers Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($extra_activity)){
                        $get_extra_activity_data = UserExtraCurricularActivity::where('ueca_user_resume_id',$request->r_id)->get();
                        if(!empty($get_extra_activity_data)){
                            foreach ($get_extra_activity_data as $key => $value) {
                                if($extra_activity['extra_curricular_present_label'][$key] == 0){
                                    $extra_curricular_end_date = $extra_activity['extra_curricular_end_date'][$key];
                                }else if($extra_activity['extra_curricular_present_label'][$key] == 1){
                                    $extra_curricular_end_date = "Present";
                                }
                                $user_extra_activity = UserExtraCurricularActivity::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ueca_function_title' => $extra_activity['function_title'][$key], 
                                    'ueca_employer' => $extra_activity['extra_curricular_section_employer'][$key], 
                                    'ueca_start_date' => $extra_activity['extra_curricular_start_date'][$key], 
                                    'ueca_end_date' => $extra_curricular_end_date,
                                    'ueca_is_present' => $extra_activity['extra_curricular_present_label'][$key], 
                                    'ueca_city' => $extra_activity['extra_curricular_city'][$key], 
                                    'extra_curricular_description' => $extra_activity['extra_curricular_description'][$key] 
                                ]);
                            }
                            if(!empty($user_extra_activity)){
                                $this->saveAndLoadPDF($user_extra_activity->ueca_user_resume_id,null,null,null,null,null,null,null,null,null,null,null,$user_extra_activity,null,null);
                                $this->getUserThumbImageData($user_extra_activity->ueca_user_resume_id);
                            }
                            return response()->json(array('data' => $user_extra_activity, 'responseMessage' => 'Extra curricular saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveLanguage(Request $request)
    {
        try{
                if(!isset($request->language_data)){
                    $get_level_id = LanguageLevel::where('level',$request->language_level)->first();

                    UserLanguage::where('id',$request->p_id)->update([
                        'ul_language_level_id' => $get_level_id->id
                    ]);
                    $get_language = UserLanguage::where('id',$request->p_id)->first();
                    $this->saveAndLoadPDF($get_language['ul_user_resume_id'],null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    $this->getUserThumbImageData($get_language['ul_user_resume_id']);
                }else{
                    $data = $request->all(); 
                    $language = array();
                    parse_str($data['language_data'], $language);
                    // User Resume Careers Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($language)){
                        $get_language = UserLanguage::with('language_level')->where('ul_user_resume_id',$request->r_id)->get();
                        if(!empty($get_language)){
                            foreach ($get_language as $key => $value) {
                                $get_level_id = LanguageLevel::where('level',$language['language_level'][$key])->first();
                                $language_level = $get_level_id['id'];

                                $user_language = UserLanguage::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ul_language' => $language['language_title'][$key], 
                                    'ul_language_level_id' => $language_level
                                ]);
                            }
                            if(!empty($user_language)){
                                $this->saveAndLoadPDF($user_language->ul_user_resume_id,null,null,null,null,null,null,null,null,null,null,null,null,$user_language,null);
                                $this->getUserThumbImageData($user_language->ul_user_resume_id);
                            }
                            return response()->json(array('data' => $user_language, 'responseMessage' => 'Language saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
                }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveReference(Request $request)
    {
        try{    
                $data = $request->all();        
                $reference = array();
                parse_str($data['reference_data'], $reference);
                // User Resume Careers Section
                    $user_id = Auth::guard('users')->user()->id;

                    if(!empty($reference)){
                        $get_reference_data = UserReference::where('ur_user_resume_id',$request->r_id)->get();

                        $user_resume = UserResume::where('user_id',$user_id)->where('id',$request->r_id);
                        if($reference['reference_present_label'] == 1){
                            $user_reference = $user_resume->update(['is_reference_hide' => 1 ]);
                        }else{
                            $user_reference = $user_resume->update(['is_reference_hide' => 0]);
                        }
                        if(!empty($get_reference_data)){
                            foreach ($get_reference_data as $key => $value) {
                                $user_reference = UserReference::updateOrCreate([
                                    'id' => $value->id
                                ],[
                                    'ur_refer_full_name' => $reference['referent_name'][$key], 
                                    'ur_refer_company_name' => $reference['reference_company'][$key], 
                                    'ur_refer_phone' => $reference['referent_phone'][$key], 
                                    'ur_refer_email' => $reference['reference_email'][$key]
                                ]);
                            }
                            
                            if(!empty($user_reference)){
                                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,$user_reference);
                                $this->getUserThumbImageData($request->r_id);
                            }
                            return response()->json(array('data' => $user_reference, 'responseMessage' => 'Reference saved successfully'), 200);
                        }else{
                            return response()->json(array('responseMessage' => 'Invalid resume Id.'), 400);
                        }
                    }else{
                        return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400);
                    }
        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function generateResumePDF(Request $request)
    {
        try{
                $user_id = Auth::guard('users')->user()->id;
                $today_date = date('Y-m-d');
                $user_plans_active =  PricingSubscription::select('pricing_id')->where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })->first();
                if(empty($user_plans_active)){
                    // $redirect_url = route('dashboard-candidates-pricing');
                    return response()->json(array('responseMessage' => 'You have to first purchase plan.'), 400);
                }
                    $getResumeFullNameEmail = User::where('id',$user_id)->first();
                
                    $user_resume_id = $request->r_id;
                    $getPersonalDetails = UserResume::with('user')->where('user_id',$user_id)->where('id',$user_resume_id)->first();
                    if(empty($getPersonalDetails)){
                        return redirect()->route('choose-resume-template');
                    }
                    
                    $getCareers = $this->getEmploymentDetails($user_resume_id);
                    $getEducation = $this->getEducationDetails($user_resume_id);
                    $getWebsiteSocialLink = $this->getWebsiteSocialDetails($user_resume_id);
                    $getSkill = $this->getSkillDetails($user_resume_id);
                    $getHobby = $this->getHobbyDetails($user_resume_id);
                    $getInternship = $this->getInternshipDetails($user_resume_id);
                    $getCourse = $this->getCourseDetails($user_resume_id);
                    $getExtraCurricularActivity = $this->getExtraCurricularActivityDetails($user_resume_id);
                    $getCustomSection = $this->getCustomSectionDetails($user_resume_id);
                    $getLanguage = $this->getLanguageDetails($user_resume_id);
                    $getReference = $this->getReferenceDetails($user_resume_id);
                    $getProfilePicture = $this->getProfilePictureData($user_resume_id);

                    $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');

                    $htmlRender = $this->resumeTemplatesSelect($user_resume_id,$request->template);
                        /*if($request->template == 21){
                            $htmlRender = view('frontend.resume.latest_template'); 
                        }else if($request->template == 22){
                            // return view('frontend.resume.london');
                            $htmlRender = view('frontend.resume.london',$array)->render();
                        }else if($request->template == 17){
                            $htmlRender = view('frontend.resume.tokyo',$array)->render();
                        }else if($request->template == 2){
                            $htmlRender = view('frontend.resume.nutmeg',$array)->render();
                        }else if($request->template == 12){
                            $htmlRender = view('frontend.resume.morocon_mint',$array)->render();
                        }else if($request->template == 4){
                            $htmlRender = view('frontend.resume.violet',$array)->render();
                        }else if($request->template == 6){
                            $htmlRender = view('frontend.resume.cotton',$array)->render();
                        }else if($request->template == 11){
                            $htmlRender = view('frontend.resume.madrid',$array)->render();
                        }else if($request->template == 10){
                            $htmlRender = view('frontend.resume.ginger',$array)->render();
                        }else if($request->template == 7){
                            $htmlRender = view('frontend.resume.melon',$array)->render();
                        }else if($request->template == 8){
                            $htmlRender = view('frontend.resume.honey_leather',$array)->render();
                        }else if($request->template == 9){
                            $htmlRender = view('frontend.resume.lemon_grass',$array)->render();
                        }else if($request->template == 13){
                            $htmlRender = view('frontend.resume.cinnamon',$array)->render();
                        }else if($request->template == 16){
                            $htmlRender = view('frontend.resume.bellini',$array)->render();
                        }else if($request->template == 3){
                            $htmlRender = view('frontend.resume.lemon',$array)->render();
                        }else if($request->template == 18){
                            $htmlRender = view('frontend.resume.lavender',$array)->render();
                        }else if($request->template == 19){
                            $htmlRender = view('frontend.resume.orchid',$array)->render();
                        }else if($request->template == 20){
                            $htmlRender = view('frontend.resume.chocolate',$array)->render();
                        }else if($request->template == 15){
                            $htmlRender = view('frontend.resume.mochaccino',$array)->render();
                        }else if($request->template == 5){
                            $htmlRender = view('frontend.resume.vanilla',$array)->render();
                        }else if($request->template == 14){
                            $htmlRender = view('frontend.resume.hibiscus',$array)->render();
                        }else if($request->template == 1){
                            $htmlRender = view('frontend.resume.athena',$array)->render();
                        }else{
                            $htmlRender = view('frontend.resume.latest_template')->render();
                        }*/

                    $pdf = \App::make('snappy.pdf.wrapper');
                    $get_username = User::where('id',$user_id)->first();
                    if(!empty($getPersonalDetails->resume_title)){
                        $filename = $getPersonalDetails->resume_title.'_'.$user_id.'_'.$user_resume_id.'.pdf';
                    }else{
                        $filename = $get_username->resume_fullname.'_'.$user_id.'_'.$user_resume_id.'.pdf';
                    }
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top',0)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $pdf = $this->resumeHeaders($pdf,$filename,$getPersonalDetails->resume_template_name,$getPersonalDetails->resume_variation,$user_resume_id);
                    return $pdf->inline($filename);

        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveAndLoadPDF($user_resume_id, $getResumeFullNameEmail, $getPersonalDetails=null, $getProfilePicture=null, $getCareers=null, $getEducation=null, $getWebsiteSocialLink=null, $getSkill=null, $getHobby=null, $getInternship=null, $getCustomSection=null, $getCourse=null, $getExtraCurricularActivity=null, $getLanguage=null, $getReference=null){
        try{    
                $user_id = Auth::guard('users')->user()->id;
                // $user_id = Auth::guard('users')->user()->id;
                $getResumeFullNameEmail = User::where('id',$user_id)->first();

                    $getPersonalDetails = UserResume::with('user')->where('user_id',$user_id)->where('id',$user_resume_id)->first();
                    if(empty($getPersonalDetails)){
                        return redirect()->route('choose-resume-template');
                    }
                    
                    $getCareers = $this->getEmploymentDetails($user_resume_id);
                    $getEducation = $this->getEducationDetails($user_resume_id);
                    $getWebsiteSocialLink = $this->getWebsiteSocialDetails($user_resume_id);
                    $getSkill = $this->getSkillDetails($user_resume_id);
                    $getHobby = $this->getHobbyDetails($user_resume_id);
                    $getInternship = $this->getInternshipDetails($user_resume_id);
                    $getCourse = $this->getCourseDetails($user_resume_id);
                    $getExtraCurricularActivity = $this->getExtraCurricularActivityDetails($user_resume_id);
                    $getCustomSection = $this->getCustomSectionDetails($user_resume_id);
                    $getLanguage = $this->getLanguageDetails($user_resume_id);
                    $getReference = $this->getReferenceDetails($user_resume_id);
                    $getProfilePicture = $this->getProfilePictureData($user_resume_id);

                $template_id = $getPersonalDetails->resume_template_name;
                $pdf = \App::make('snappy.pdf.wrapper');
                $path = public_path('frontend/resume_pdf/');
                // $template_id = $request->template_id;
                $filename = $getResumeFullNameEmail->resume_fullname.'_'.$user_id.'_'.$user_resume_id.'.pdf';

                $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');

                $htmlRender = $this->resumeTemplatesSelect($user_resume_id,$template_id);
                    /*if($template_id == 21){
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
                    }else if($template_id == 5){
                        $htmlRender = view('frontend.resume.vanilla',$array)->render();
                    }else if($template_id == 14){
                        $htmlRender = view('frontend.resume.hibiscus',$array)->render();
                    }else if($template_id == 1){
                        $htmlRender = view('frontend.resume.athena',$array)->render();
                    }else{
                        $htmlRender = view('frontend.resume.latest_template')->render();
                    }*/

                if(file_exists($path.$filename)) {
                    unlink($path.$filename);
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    $pdf = $this->resumeHeaders($pdf,$filename,$template_id,$getPersonalDetails->resume_variation,$user_resume_id);
                    $pdf->save($path.$filename);
                    return response()->json(array('responseMessage' => 'PDF already exists replace done.'), 200);
                }else{
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    $pdf = $this->resumeHeaders($pdf,$filename,$template_id,$getPersonalDetails->resume_variation,$user_resume_id);
                    $pdf->save($path.$filename);
                    return response()->json(array('responseMessage' => 'PDF created successfully.'), 200);
                }    
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }    

    public function deleteCareers(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_careers,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserCareer::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Employee deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteEducation(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_education,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserEducation::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Education deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }
    
    public function deleteWebsiteLinks(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_website_and_social_links,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserWebsiteSocialLink::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Website Links deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteSkills(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_skill,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserSkill::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Skill deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteCustomSection(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_custom_section,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserCustomSection::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Custom section deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteInternship(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_internship,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserInternship::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Internship deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteCourse(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_courses,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserCourse::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Course deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteExtraActivity(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_extra_curricular_activity,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserExtraCurricularActivity::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Extra activity deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteLanguage(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_languages,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserLanguage::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Language deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteReference(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_references,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserReference::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Reference deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function deleteHobbies(Request $request)
    {
        try{
                $validator = Validator::make($request->all(), [
                    'p_id' => 'exists:user_hobbies,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                UserHobbies::where('id',$request->p_id)->delete();
                $this->saveAndLoadPDF($request->r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Hobbies deleted successfully.'), 200);
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getCustomSectionIds($r_id)
    {
        try{
                $custom_section_ids = UserCustomSection::where('ucs_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($custom_section_ids) > 0){
                    UserCustomSection::whereIn('id',$custom_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Custom sections deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Custom section data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getCourseSectionIds($r_id)
    {
        try{
                $course_section_ids = UserCourse::where('ucr_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($course_section_ids) > 0){
                    UserCourse::whereIn('id',$course_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Courses deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Course data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getExtraCurricularSectionIds($r_id)
    {
        try{
                $extra_section_ids = UserExtraCurricularActivity::where('ueca_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($extra_section_ids) > 0){
                    UserExtraCurricularActivity::whereIn('id',$extra_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Extra curricular activities deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Extra curricular activities data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getHobbySectionIds($r_id)
    {
        try{
                $hobby_section_ids = UserHobbies::where('uh_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($hobby_section_ids) > 0){
                    UserHobbies::whereIn('id',$hobby_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Hobbies deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Hobbies data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getInternshipSectionIds($r_id)
    {
        try{
                $internship_section_ids = UserInternship::where('ui_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($internship_section_ids) > 0){
                    UserInternship::whereIn('id',$internship_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Internship deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Internship data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getLanguageSectionIds($r_id)
    {
        try{
                $language_section_ids = UserLanguage::where('ul_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($language_section_ids) > 0){
                    UserLanguage::whereIn('id',$language_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'Languages deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'Languages data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getReferenceSectionIds($r_id)
    {
        try{
                $reference_section_ids = UserReference::where('ur_user_resume_id',$r_id)->pluck('id')->toArray();
                if(count($reference_section_ids) > 0){
                    UserReference::whereIn('id',$reference_section_ids)->delete();
                    $this->saveAndLoadPDF($r_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                    return response()->json(array('responseMessage' => 'References deleted successfully.'), 200);
                }else{
                    return response()->json(array('responseMessage' => 'References data not found.'), 400);
                }
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeResumeColor(Request $request)
    {
        try{    
                $validate = Validator([
                    'id' => 'exists:user_resumes,id,deleted_at,NULL'
                ]);
                if ($validate->fails()) {
                    return response()->json(array('responseMessage' => $validate->errors()->first()), 400); 
                }
                UserResume::where('id',$request->resume_id)->update(['resume_variation' => $request->color]);
                $this->saveAndLoadPDF($request->resume_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'Color changed.'), 200);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getEmploymentDetails($user_resume_id)
    {
        try{    
                $getCareers = UserCareer::with('user_resume')->where('uc_user_resume_id',$user_resume_id)->get();
                return $getCareers;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getEducationDetails($user_resume_id)
    {
        try{    
                $getEducation = UserEducation::with('user_resume')->where('ue_user_resume_id',$user_resume_id)->get();
                return $getEducation;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getWebsiteSocialDetails($user_resume_id)
    {
        try{    
                $getWebsiteSocialLink = UserWebsiteSocialLink::with('user_resume')->where('uwsl_user_resume_id',$user_resume_id)->get();
                return $getWebsiteSocialLink;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getSkillDetails($user_resume_id)
    {
        try{    
                $getSkill = UserSkill::with('user_resume')->where('us_user_resume_id',$user_resume_id)->get();
                return $getSkill;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getHobbyDetails($user_resume_id)
    {
        try{    
                $getHobby = UserHobbies::with('user_resume')->where('uh_user_resume_id',$user_resume_id)->first();
                return $getHobby;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getInternshipDetails($user_resume_id)
    {
        try{    
                $getInternship = UserInternship::with('user_resume')->where('ui_user_resume_id',$user_resume_id)->get();
                return $getInternship;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getCustomSectionDetails($user_resume_id)
    {
        try{    
                $getCustomSection = UserCustomSection::with('user_resume')->where('ucs_user_resume_id',$user_resume_id)->get();
                return $getCustomSection;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getCourseDetails($user_resume_id)
    {
        try{    
                $getCourse = UserCourse::with('user_resume')->where('ucr_user_resume_id',$user_resume_id)->get();
                return $getCourse;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getExtraCurricularActivityDetails($user_resume_id)
    {
        try{    
                $getExtraCurricularActivity = UserExtraCurricularActivity::with('user_resume')->where('ueca_user_resume_id',$user_resume_id)->get();
                return $getExtraCurricularActivity;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getLanguageDetails($user_resume_id)
    {
        try{    
                $getLanguage = UserLanguage::with('language_level')->with('user_resume')->where('ul_user_resume_id',$user_resume_id)->get();
                return $getLanguage;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getReferenceDetails($user_resume_id)
    {
        try{    
                $getReference = UserReference::with('user_resume')->where('ur_user_resume_id',$user_resume_id)->get();
                return $getReference;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getProfilePictureData($user_resume_id)
    {
        try{    
                $getProfilePicture = UserResume::select('profile_image')->where('user_id',Auth::guard('users')->user()->id)->where('id',$user_resume_id)->first();
                return $getProfilePicture;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getResumeFullNameEmail($user_id)
    {
        try{    
                $getResumeFullNameEmail = User::select('resume_email','resume_fullname')->where('id',$user_id)->first();
                return $getResumeFullNameEmail;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getResumePersonalDetails($user_resume_id)
    {
        try{    
                $getPersonalDetails = UserResume::where('id',$user_resume_id)->first();
                return $getPersonalDetails;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getEmployment($user_resume_id)
    {
        try{    
                $employment_count = 0;
                $get_careers = $this->getEmploymentDetails($user_resume_id);
                $index = $employment_count;
                return view('frontend.resume.employment',compact('index'), ['get_careers' => $get_careers]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getEducation($user_resume_id)
    {
        try{    
                $education_count = 0;
                $get_education = $this->getEducationDetails($user_resume_id);
                $education_index = $education_count;
                return view('frontend.resume.education',compact('education_index'), ['get_education' => $get_education]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getWebsiteSocialLinks($user_resume_id)
    {
        try{    
                $website_social_link_count = 0;
                $get_website_links = $this->getWebsiteSocialDetails($user_resume_id);
                $website_social_link_index = $website_social_link_count;
                return view('frontend.resume.website-and-social-link',compact('website_social_link_index'), ['get_website_links' => $get_website_links]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getSkill($user_resume_id)
    {
        try{    
                $skills_count = 0;
                $get_skills = $this->getSkillDetails($user_resume_id);
                $skill_index = $skills_count;
                return view('frontend.resume.skill',compact('skill_index'), ['get_skills' => $get_skills]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getCustomSection($user_resume_id)
    {
        try{    
                $custom_section_count = 0;
                $get_custom_section = $this->getCustomSectionDetails($user_resume_id);
                $custom_section_count_index = $custom_section_count;
                return view('frontend.resume.custom_section',compact('custom_section_count_index'), ['get_custom_section' => $get_custom_section]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getInternship($user_resume_id)
    {
        try{    
                $internship_count = 0;
                $get_internship = $this->getInternshipDetails($user_resume_id);
                $internship_count_index = $internship_count;
                return view('frontend.resume.internship',compact('internship_count_index'), ['get_internship' => $get_internship]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getCourse($user_resume_id)
    {
        try{    
                $course_link_count = 0;
                $get_course = $this->getCourseDetails($user_resume_id);
                $course_link_count_index = $course_link_count;
                return view('frontend.resume.course',compact('course_link_count_index'), ['get_course' => $get_course]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getExtraCurricularActivity($user_resume_id)
    {
        try{    
                $extra_curricular_activity_count = 0;
                $get_extra_activity = $this->getExtraCurricularActivityDetails($user_resume_id);
                $extra_curricular_activity_count_index = $extra_curricular_activity_count;
                return view('frontend.resume.extra-curricular-activity',compact('extra_curricular_activity_count_index'), ['get_extra_activity' => $get_extra_activity]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getLanguage($user_resume_id)
    {
        try{    
                $language_count = 0;
                $get_language = $this->getLanguageDetails($user_resume_id);
                $language_levels = LanguageLevel::get();
                $language_count_index = $language_count;
                return view('frontend.resume.language',compact('language_count_index'), ['get_language' => $get_language, 'language_levels' => $language_levels]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getReference($user_resume_id)
    {
        try{    
                $reference_count = 0;
                $get_reference = $this->getReferenceDetails($user_resume_id);
                $reference_count_index = $reference_count;
                return view('frontend.resume.reference',compact('reference_count_index'), ['get_reference' => $get_reference]);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function resumeTemplatesSelect($user_resume_id,$template_id)
    {
        try{    
                $getCareers = $this->getEmploymentDetails($user_resume_id);
                $getEducation = $this->getEducationDetails($user_resume_id);
                $getWebsiteSocialLink = $this->getWebsiteSocialDetails($user_resume_id);
                $getSkill = $this->getSkillDetails($user_resume_id);
                $getHobby = $this->getHobbyDetails($user_resume_id);
                $getInternship = $this->getInternshipDetails($user_resume_id);
                $getCourse = $this->getCourseDetails($user_resume_id);
                $getExtraCurricularActivity = $this->getExtraCurricularActivityDetails($user_resume_id);
                $getCustomSection = $this->getCustomSectionDetails($user_resume_id);
                $getLanguage = $this->getLanguageDetails($user_resume_id);
                $getReference = $this->getReferenceDetails($user_resume_id);
                $getProfilePicture = $this->getProfilePictureData($user_resume_id);
                $getResumeFullNameEmail = $this->getResumeFullNameEmail(Auth::guard('users')->user()->id);
                $getPersonalDetails = $this->getResumePersonalDetails($user_resume_id);

                $array = compact('getResumeFullNameEmail','getPersonalDetails','getCareers','getEducation','getWebsiteSocialLink','getSkill','getHobby','getInternship','getCourse','getExtraCurricularActivity','getCustomSection','getLanguage','getReference','getProfilePicture');
                switch ($template_id) {
                  case 1:
                    $htmlRender = view('frontend.resume.athena',$array)->render();
                    break;
                  case 2:
                    $htmlRender = view('frontend.resume.nutmeg',$array)->render();
                    break;
                  case 3:
                    $htmlRender = view('frontend.resume.lemon',$array)->render();
                    break;
                  case 4:
                    $htmlRender = view('frontend.resume.violet',$array)->render();
                    break;
                  case 5:
                    $htmlRender = view('frontend.resume.vanilla',$array)->render();
                    break;
                  case 6:
                    $htmlRender = view('frontend.resume.cotton',$array)->render();
                    break;
                  case 7:
                    $htmlRender = view('frontend.resume.melon',$array)->render();
                    break;
                  case 8:
                    $htmlRender = view('frontend.resume.honey_leather',$array)->render();
                    break;
                  case 9:
                    $htmlRender = view('frontend.resume.lemon_grass',$array)->render();
                    break;
                  case 10:
                    $htmlRender = view('frontend.resume.ginger',$array)->render();
                    break;
                  case 11:
                    $htmlRender = view('frontend.resume.madrid',$array)->render();
                    break;
                  case 12:
                    $htmlRender = view('frontend.resume.morocon_mint',$array)->render();
                    break;
                  case 13:
                    $htmlRender = view('frontend.resume.cinnamon',$array)->render();
                    break;
                  case 14:
                    $htmlRender = view('frontend.resume.hibiscus',$array)->render();
                    break;
                  case 15:
                    $htmlRender = view('frontend.resume.mochaccino',$array)->render();
                    break;
                  case 16:
                    $htmlRender = view('frontend.resume.bellini',$array)->render();
                    break;
                  case 17:
                    $htmlRender = view('frontend.resume.tokyo',$array)->render();
                    break;
                  case 18:
                    $htmlRender = view('frontend.resume.lavender',$array)->render();
                    break;
                  case 19:
                    $htmlRender = view('frontend.resume.orchid',$array)->render();
                    break;
                  case 20:
                    $htmlRender = view('frontend.resume.chocolate',$array)->render();
                    break;
                  default:
                    $htmlRender = view('frontend.resume.tokyo',$array)->render();
                }
                return $htmlRender;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function saveCustomSectionHeading(Request $request)
    {
        try{
                $user_id = Auth::guard('users')->user()->id;
                $validate = Validator([
                    'resume_id' => 'exists:user_resumes,id,deleted_at,NULL'
                ]);
                if ($validate->fails()) {
                    return response()->json(array('responseMessage' => $validate->errors()->first()), 400); 
                }
                UserCustomSection::where('ucs_user_resume_id',$request->resume_id)->update([
                    'ucs_main_heading' => $request->ucs_main_heading
                ]);
                $this->saveAndLoadPDF($request->resume_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                return response()->json(array('responseMessage' => 'User custom section heading updated.'), 200); 
        } catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function resumeHeaders($pdf,$filename,$temp_id,$temp_color=null,$user_resume_id){
        try{
                $getProfilePicture = $this->getProfilePictureData($user_resume_id);
                $getResumeFullNameEmail = $this->getResumeFullNameEmail(Auth::guard('users')->user()->id);
                $getPersonalDetails = $this->getResumePersonalDetails($user_resume_id);

                if($temp_id == 4){
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 55)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    // $header='<!DOCTYPE html><img style="margin:-5px;" src="' .asset("/frontend/images/resume_headers/violet_back.jpg").'"/>';
                    // $header='<!DOCTYPE html><img style="margin:-7px;" src="' .asset("/frontend/images/resume_templates/violet-images/violate_back.jpg").'"/>';
                    $header = view('frontend.resume.violet_header',compact('getProfilePicture','getResumeFullNameEmail','getPersonalDetails'))->render();
                    $footer = view('frontend.resume.violet_footer')->render();
                    $pdf->setOption('header-html',$header);
                    $pdf->setOption('footer-html',$footer);
                }elseif($temp_id == 11){
                    /*$color = str_replace(array('#'), '', $temp_color);
                    $image_name = 'madrid_'.$color.'.jpg';
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 3)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-7px;" src="' .asset("/frontend/images/resume_headers/" .$image_name. "").'"/>';
                    $pdf->setOption('header-html',$header);*/
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 50)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header = view('frontend.resume.madrid_header',compact('getProfilePicture','getResumeFullNameEmail','getPersonalDetails'))->render();
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 17){
                    /*$color = str_replace(array('#'), '', $temp_color);
                    $image_name = 'tokyo_'.$color.'.jpg';
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 4)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-7px;" src="' .asset("/frontend/images/resume_headers/" .$image_name. "").'"/>';
                    $pdf->setOption('header-html',$header);*/
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 35)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header = view('frontend.resume.tokyo_header',compact('getProfilePicture','getResumeFullNameEmail','getPersonalDetails'))->render();
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 18 || $temp_id == 2 || $temp_id == 7 || $temp_id == 10 || $temp_id == 15){
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 4)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img src="' .asset("/frontend/images/resume_headers/white_back.jpg").'"/>';
                    $pdf->setOption('header-html',$header);
                    return $pdf;
                }elseif($temp_id == 8 || $temp_id == 12 || $temp_id == 16 || $temp_id == 19){
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img src="' .asset("/frontend/images/resume_headers/white_back.jpg").'"/>';
                    $pdf->setOption('header-html',$header);
                    // return $pdf;//hibiscus_bg.jpg
                }elseif($temp_id == 14){
                    $pdf->setOption('margin-bottom',7)->setOption('title',$filename);
                }elseif($temp_id == 3){
                    $color = str_replace(array('#'), '', $temp_color);
                    $image_name = 'lemon_'.$color.'.jpg';
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-8px; border-left: 7px solid ' .$temp_color. ';" src="' .asset("/frontend/images/resume_headers/" .$image_name. "").'"/>';
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 6){
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-8px;" src="' .asset("/frontend/images/resume_headers/cotton_header.jpg").'"/>';
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 20){
                    $pdf->setOption('margin-top', 5)->setOption('margin-bottom',5)->setOption('title',$filename);
                }elseif($temp_id == 9){
                    $color = str_replace(array('#'), '', $temp_color);
                    $image_name = 'lemongrass_'.$color.'.jpg';
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-7px -7px;" src="' .asset("/frontend/images/resume_headers/" .$image_name. "").'"/>';
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 13){
                    $color = str_replace(array('#'), '', $temp_color);
                    $image_name = 'cinnamon_'.$color.'.jpg';
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin: 0 -5px -8px;" src="' .asset("/frontend/images/resume_headers/" .$image_name. "").'"/>';
                    $pdf->setOption('header-html',$header);
                }elseif($temp_id == 5){
                    $pdf->setOption('margin-left', '0mm')->setOption('margin-top', '6mm')->setOption('margin-right','0mm')->setOption('margin-bottom','0mm')->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-8px;" src="' .asset("/frontend/images/resume_headers/vanilla_header.jpg").'"/>';
                    $pdf->setOption('header-html',$header);
                }/*elseif($temp_id == 1){
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 5)->setOption('margin-right',0)->setOption('margin-bottom',5)->setOption('title',$filename);
                    $header='<!DOCTYPE html><img style="margin:-8px;" src="' .asset("/frontend/images/resume_headers/athena_header.jpg").'"/>';
                    $pdf->setOption('header-html',$header);
                }*/
                return $pdf;
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }
}
