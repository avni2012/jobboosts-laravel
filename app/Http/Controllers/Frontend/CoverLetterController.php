<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\CoverLetters;
use App\Helpers\CoverLetterExamples;
use Auth;
use App\User;
use Validator;
use PDF;
use App\Models\PricingSubscription;
use App\Models\CoverLetter\UserCoverLetter;
use Imagick;

class CoverLetterController extends Controller
{
    public function index() {
        try {
                $cover_letters = CoverLetters::coverLetters();
                $cover_letter_examples_category = CoverLetters::coverLettersCategory();
                return view('frontend.cover-letter-design-template')->with('cover_letters',json_encode($cover_letters))->with('cover_letter_examples_category',json_encode($cover_letter_examples_category));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function coverLetterExamples() {
        try {
                $cover_letter_examples = CoverLetterExamples::getCoverLetterExamples();
                $cover_letter_examples_category = CoverLetterExamples::getCoverLetterExamplesCategory();
                return view('frontend.cover-letter-example')->with('cover_letter_examples',json_encode($cover_letter_examples))->with('cover_letter_examples_category',json_encode($cover_letter_examples_category));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function saveUserCoverLetter(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'exists:users,id,deleted_at,NULL'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $letter_details = '';
                $template_id = '';
                if(url()->previous() == route('cover-letter-example')){
                    $cover_letter_examples = CoverLetterExamples::getCoverLetterExamples();
                    if(!empty($cover_letter_examples)){
                        foreach ($cover_letter_examples as $key => $value) {
                            if($request->template_id == $value['id']){
                                $letter_details = $value['letter_details'];
                                $template_id = $value['cover_template'];
                            }
                        }
                    }else{
                        $letter_details = null;
                    }
                }else{
                    $letter_details = null;
                    $template_id = $request->template_id;
                }
                $user_cover_letter = UserCoverLetter::create([
                    'cl_user_id' => $request->user_id,
                    'cl_template_name' => $template_id,
                    // 'cl_template_name' => $request->template_id,
                    'cl_details' => $letter_details
                ]);
                $redirect_url = route('cover_letters',[$user_cover_letter->id]);
                return response()->json(array('data' => $user_cover_letter, 'redirect_url' => $redirect_url, 'responseMessage' => 'success'), 200);   
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function addUserCoverLetterEmailFullname(Request $request)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                $validator = Validator::make($request->all(), [
                    "resume_email" => "required|email",
                    'resume_fullname' => 'required'
                ],[
                	'resume_email.required' => 'The email field is required.',
                	'resume_fullname.required' => 'The fullname field is required.'
                ]);
                if ($validator->fails()) {
                    return response()->json(array('responseMessage' => $validator->errors()->first()), 400); 
                }
                $save_cover_letter_details = [
                    'resume_email' => $request->resume_email,
                    'resume_fullname' => $request->resume_fullname
                ];
                $template_id = $request->template_id;
                $user_cover_letters_data = User::where('id',$user_id)->update($save_cover_letter_details);

                if($user_cover_letters_data){
                    $user_cover_letter = UserCoverLetter::create([
                        'cl_user_id' => $user_id,
                        'cl_template_name' => $template_id
                    ]);
                    $redirect_url = route('cover_letters',[$user_cover_letter->id]);
                    return response()->json(array('responseMessage' => 'You are ready to build your cover letter','redirect_url' => $redirect_url), 200); 
                }else{
                    return response()->json(array('responseMessage' => 'Something went wrong, try again later.'), 400); 
                }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400); 
        }
    }

    public function coverLettersView(Request $request, $template_id)
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

    public function thumbImageUpdate($full_name,$user_id,$cl_id)
    {
        try {
                $path = public_path('frontend/cover_letters_pdf/');
                $filename = $full_name.'_'.$user_id.'_'.$cl_id.'.pdf';
                $file_name = $full_name.'_'.$user_id.'_'.$cl_id; 
                $imagick = new Imagick();
                $imagick->setResolution(200, 200);
                $imagick->readImage($path.$filename.'[0]');
                $file_name = $file_name.'_thumb_'.$user_id.'.jpg';
                if(file_exists(public_path('/frontend/images/user_cover_letters/'.$file_name))){
                    unlink(public_path('/frontend/images/user_cover_letters/'.$file_name));
                    $imagick->writeImages(public_path('/frontend/images/user_cover_letters/'.$file_name),false);
                }else{
                    $imagick->writeImages(public_path('/frontend/images/user_cover_letters/'.$file_name),false);
                }

                UserCoverLetter::where('id',$cl_id)->update([
                    'cl_thumb_image' => $file_name
                ]);

                $this->saveAndLoadPDF($cl_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
            } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getUserThumbImageData($cl_id)
    {
        try {
                $user_id = Auth::guard('users')->user()->id;
                $user = User::where('id',$user_id)->first();
                $this->thumbImageUpdate($user->resume_fullname,$user_id,$cl_id);
            } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function coverLetterPage(Request $request, $user_cl_id)
    {
        try {   
                if(!$user_cl_id){
                    return redirect()->route('cover-letters');
                }
                if(!Auth::guard('users')->check()){
                    return redirect()->route('cover-letters');
                }
                    $color_codes = array();
                    $getCoverLetterId = UserCoverLetter::with('user')->where('cl_user_id',Auth::guard('users')->user()->id)->where('id',$user_cl_id)->first();
                    if(empty($getCoverLetterId)){
                        return redirect()->route('cover-letters');
                    }
                    $user_id = Auth::guard('users')->user()->id;
                    $template_id = $getCoverLetterId->cl_template_name;

                    $getCoverLetterFullNameEmail = $resume_email_fullname = $this->getCoverLetterFullNameEmail(Auth::guard('users')->user()->id);
                    $getPersonalDetails = $personal_details = $this->getCoverLetterDetails($user_cl_id);

                    $get_color_codes = CoverLetters::coverLetters();
                    if(!empty($get_color_codes)){
                        foreach ($get_color_codes as $key => $value) {
                            if(empty($personal_details->cl_variation)){
                                if($personal_details->resume_template_name == $value['id']){
                                    if(!empty($value['color_codes'])){
                                        UserCoverLetter::where('id',$user_cl_id)->update(['cl_variation' => array_values($value['color_codes'])[0] ]);
                                    }
                                }
                            }
                            if($template_id == $value['id']){
                                $color_codes['colors'] = $value['color_codes'];
                            }
                        }
                    }
                    $array = compact('getCoverLetterFullNameEmail','getPersonalDetails');
                    $pdf = \App::make('snappy.pdf.wrapper');
                    $path = public_path('frontend/cover_letters_pdf/');
                    $filename = $resume_email_fullname->resume_fullname.'_'.$user_id.'_'.$user_cl_id.'.pdf';

                    $htmlRender = $this->coverLettersTemplatesSelect($user_cl_id,$template_id);

                    if(file_exists($path.$filename)) {
                        unlink($path.$filename);
                        $pdf->loadHTML($htmlRender);
                        $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                        $pdf->save($path.$filename);
                    }else{
                        $pdf->loadHTML($htmlRender);
                        $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                        $pdf->save($path.$filename);
                    }       
                    $this->thumbImageUpdate($resume_email_fullname->resume_fullname,$user_id,$user_cl_id);
                    return view('frontend.cover_letters.cover_letters',compact('color_codes','user_cl_id','template_id','resume_email_fullname','personal_details'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function getCoverLetterFullNameEmail($user_id)
    {
        try{    
                $getCoverLetterFullNameEmail = User::select('resume_email','resume_fullname')->where('id',$user_id)->first();
                return $getCoverLetterFullNameEmail;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getCoverLetterDetails($user_cl_id)
    {
        try{    
                $getPersonalDetails = UserCoverLetter::where('id',$user_cl_id)->first();
                return $getPersonalDetails;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function changeCoverLetterColor(Request $request)
    {
        try{    
                $validate = Validator([
                    'id' => 'exists:user_cover_letters,id,deleted_at,NULL'
                ]);
                if ($validate->fails()) {
                    return response()->json(array('responseMessage' => $validate->errors()->first()), 400); 
                }
                UserCoverLetter::where('id',$request->cl_id)->update(['cl_variation' => $request->color]);
                $this->saveAndLoadPDF($request->cl_id,null,null);
                return response()->json(array('responseMessage' => 'Color changed.'), 200);
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function coverLettersTemplatesSelect($user_cl_id,$template_id)
    {
        try{    
                $getCoverLetterFullNameEmail = $this->getCoverLetterFullNameEmail(Auth::guard('users')->user()->id);
                $getPersonalDetails = $this->getCoverLetterDetails($user_cl_id);

                $array = compact('getCoverLetterFullNameEmail','getPersonalDetails');
                switch ($template_id) {
                  case 1:
                    $htmlRender = view('frontend.cover_letters.athena_cn',$array)->render();
                    break;
                  case 2:
                    $htmlRender = view('frontend.cover_letters.nutmeg_cn',$array)->render();
                    break;
                  case 3:
                    $htmlRender = view('frontend.cover_letters.lemon_cn',$array)->render();
                    break;
                  case 4:
                    $htmlRender = view('frontend.cover_letters.violet_cn',$array)->render();
                    break;
                  case 5:
                    $htmlRender = view('frontend.cover_letters.vanilla_cn',$array)->render();
                    break;
                  case 6:
                    $htmlRender = view('frontend.cover_letters.cotton_cn',$array)->render();
                    break;
                  case 7:
                    $htmlRender = view('frontend.cover_letters.melon_cn',$array)->render();
                    break;
                  case 8:
                    $htmlRender = view('frontend.cover_letters.honey_leather_cn',$array)->render();
                    break;
                  case 9:
                    $htmlRender = view('frontend.cover_letters.lemon_grass_cn',$array)->render();
                    break;
                  case 10:
                    $htmlRender = view('frontend.cover_letters.ginger_cn',$array)->render();
                    break;
                  case 11:
                    $htmlRender = view('frontend.cover_letters.black_pepper_cn',$array)->render();
                    break;
                  case 12:
                    $htmlRender = view('frontend.cover_letters.morocon_mint_cn',$array)->render();
                    break;
                  case 13:
                    $htmlRender = view('frontend.cover_letters.cinnamon_cn',$array)->render();
                    break;
                  case 14:
                    $htmlRender = view('frontend.cover_letters.hibiscus_cn',$array)->render();
                    break;
                  case 15:
                    $htmlRender = view('frontend.cover_letters.mochaccino_cn',$array)->render();
                    break;
                  case 16:
                    $htmlRender = view('frontend.cover_letters.bellini_cn',$array)->render();
                    break;
                  case 17:
                    $htmlRender = view('frontend.cover_letters.gardenia_cn',$array)->render();
                    break;
                  case 18:
                    $htmlRender = view('frontend.cover_letters.lavender_cn',$array)->render();
                    break;
                  case 19:
                    $htmlRender = view('frontend.cover_letters.orchid_cn',$array)->render();
                    break;
                  case 20:
                    $htmlRender = view('frontend.cover_letters.chocolate_cn',$array)->render();
                    break;
                  default:
                    $htmlRender = view('frontend.cover_letters.gardenia_cn',$array)->render();
                }
                return $htmlRender;
        } catch(Exception $e){
            return redirect()->back()->with(['message.content' => $e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function getSampleCoverTemplate(Request $request, $user_cl_id)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                    if(empty($getPersonalDetails)){
                        return redirect()->route('cover-letter-design-template');
                    }
                    $getCoverLetterFullNameEmail = $this->getCoverLetterFullNameEmail(Auth::guard('users')->user()->id);
                    $getPersonalDetails = $this->getCoverLetterDetails($user_cl_id);

                $template_id = $getPersonalDetails->cl_template_name;

                $array = compact('getCoverLetterFullNameEmail','getPersonalDetails');
                if($template_id == 21){
                        return view('frontend.cover_letters.latest_template'); 
                    }else if($template_id == 22){
                        return view('frontend.cover_letters.london_cn',$array);
                    }else if($template_id == 17){
                        return view('frontend.cover_letters.gardenia_cn',$array);
                    }else if($template_id == 2){
                        return view('frontend.cover_letters.nutmeg_cn',$array);
                    }else if($template_id == 12){
                        return view('frontend.cover_letters.morocon_mint_cn',$array);
                    }else if($template_id == 4){
                        return view('frontend.cover_letters.violet_cn',$array);
                    }else if($template_id == 6){
                        return view('frontend.cover_letters.cotton_cn',$array);
                    }else if($template_id == 11){
                        return view('frontend.cover_letters.black_pepper_cn',$array);
                    }else if($template_id == 10){
                        return view('frontend.cover_letters.ginger_cn',$array);
                    }else if($template_id == 7){
                        return view('frontend.cover_letters.melon_cn',$array);
                    }else if($template_id == 8){
                        return view('frontend.cover_letters.honey_leather_cn',$array);
                    }else if($template_id == 9){
                        return view('frontend.cover_letters.lemon_grass_cn',$array);
                    }else if($template_id == 13){
                        return view('frontend.cover_letters.cinnamon_cn',$array);
                    }else if($template_id == 16){
                        return view('frontend.cover_letters.bellini_cn',$array);
                    }else if($template_id == 3){
                        return view('frontend.cover_letters.lemon_cn',$array);
                    }else if($template_id == 18){
                        return view('frontend.cover_letters.lavender_cn',$array);
                    }else if($template_id == 19){
                        return view('frontend.cover_letters.orchid_cn',$array);
                    }else if($template_id == 20){
                        return view('frontend.cover_letters.chocolate_cn',$array);
                    }else if($template_id == 15){
                        return view('frontend.cover_letters.mochaccino_cn',$array);
                    }else if($template_id == 5){
                        return view('frontend.cover_letters.vanilla_cn',$array);
                    }else if($template_id == 14){
                        return view('frontend.cover_letters.hibiscus_cn',$array);
                    }else if($template_id == 1){
                        return view('frontend.cover_letters.athena_cn',$array);
                    }else{
                        return view('frontend.cover_letters.gardenia_cn');
                    }
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function saveAndLoadPDF($user_cl_id, $getCoverLetterFullNameEmail, $getPersonalDetails=null){
        try{    
                $user_id = Auth::guard('users')->user()->id;
                $getCoverLetterFullNameEmail = User::where('id',$user_id)->first();

                    $getPersonalDetails = UserCoverLetter::with('user')->where('cl_user_id',$user_id)->where('id',$user_cl_id)->first();
                    if(empty($getPersonalDetails)){
                        return redirect()->route('cover-letter-design-template');
                    }
                    
                $template_id = $getPersonalDetails->cl_template_name;
                $pdf = \App::make('snappy.pdf.wrapper');
                $path = public_path('frontend/cover_letters_pdf/');
                $filename = $getCoverLetterFullNameEmail->resume_fullname.'_'.$user_id.'_'.$user_cl_id.'.pdf';

                $array = compact('getCoverLetterFullNameEmail','getPersonalDetails');

                $htmlRender = $this->coverLettersTemplatesSelect($user_cl_id,$template_id);
                 
                if(file_exists($path.$filename)) {
                    unlink($path.$filename);
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    $pdf->save($path.$filename);
                    return response()->json(array('responseMessage' => 'PDF already exists replace done.'), 200);
                }else{
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0);
                    $pdf->save($path.$filename);
                    return response()->json(array('responseMessage' => 'PDF created successfully.'), 200);
                }    
        }catch(Exception $e){
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }  

    public function storeUserCoverLetterDetails(Request $request)
    {
        try {   
                $user_id = Auth::guard('users')->user()->id;
                $personal_details = [
                    'cl_title' => $request->cl_title,
                    'cl_job_title' => $request->cl_job_title,
                    'cl_phone' => $request->cl_phone,
                    'cl_address' => $request->cl_address,
                    'cl_emp_company_name' => $request->cl_emp_company_name,
                    'cl_emp_hiring_manager_name' => $request->cl_emp_hiring_manager_name,
                    'cl_emp_address' => $request->cl_emp_address,
                    'cl_emp_phone' => $request->cl_emp_phone,
                    'cl_emp_email' => $request->cl_emp_email,
                    'cl_details' => $request->cl_details
                ];
                $user_cover_letter = UserCoverLetter::where('cl_user_id',$user_id)->where('id',$request->cl_id);
                $save_personal_details = $user_cover_letter->update($personal_details);
                $user_cover_letter = $user_cover_letter->first();

                $this->saveAndLoadPDF($request->cl_id,null,$user_cover_letter);
                $this->getUserThumbImageData($request->cl_id);
                return response()->json(array('data' => $user_cover_letter, 'responseMessage' => 'saved data successfully'), 200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function generateCoverLetterPDF(Request $request)
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
                    return response()->json(array('responseMessage' => 'You have to first purchase plan.'), 400);
                }
                    $getCoverLetterFullNameEmail = User::where('id',$user_id)->first();
                
                    $user_cl_id = $request->cl_id;
                    $getPersonalDetails = UserCoverLetter::with('user')->where('cl_user_id',$user_id)->where('id',$user_cl_id)->first();
                    if(empty($getPersonalDetails)){
                        return redirect()->route('cover-letter-design-template');
                    }
                    
                    $array = compact('getCoverLetterFullNameEmail','getPersonalDetails');

                    $htmlRender = $this->coverLettersTemplatesSelect($user_cl_id,$request->template);
                     
                    $pdf = \App::make('snappy.pdf.wrapper');
                    $get_username = User::where('id',$user_id)->first();
                    if(!empty($getPersonalDetails->cl_title)){
                        $filename = $getPersonalDetails->cl_title.'_'.$user_id.'_'.$user_cl_id.'.pdf';
                    }else{
                        $filename = $get_username->resume_fullname.'_'.$user_id.'_'.$user_cl_id.'.pdf';
                    }
                    $pdf->loadHTML($htmlRender);
                    $pdf->setOption('margin-left', 0)->setOption('margin-top', 0)->setOption('margin-right',0)->setOption('margin-bottom',0)->setOption('title',$filename);
                    return $pdf->inline($filename);

        }catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function updateCoverLetter($r_id)
    {
        try {
            if(!Auth::guard('users')->check()){
                return redirect()->route('cover-letters');
            }
            $cover_letters = CoverLetters::coverLetters();
            // $cover_letters_category = CoverLetters::coverLettersCategory();
            $cover_letter_examples_category = CoverLetters::coverLettersCategory();
            $getCoverLetterId = UserCoverLetter::select('id','cl_template_name')->where('cl_user_id',Auth::guard('users')->user()->id)->where('id',$r_id)->first();
            return view('frontend.cover_letters.update-cover-letter',[$r_id], compact('getCoverLetterId'))->with('cover_letters',json_encode($cover_letters))->with('cover_letter_examples_category',json_encode($cover_letter_examples_category));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function changeCoverLetterTemplate(Request $request)
    {
        try {   
                $validate = Validator([
                    'cover_letter_id' => 'exists:user_cover_letters,id,deleted_at,NULL'
                ]);
                if ($validate->fails()) {
                    return response()->json(array('responseMessage' => $validate->errors()->first()), 400); 
                }
                $color_codes = array();
                $get_cover_letter = UserCoverLetter::where('id',$request->cover_letter_id)->first();
                $get_color_codes = CoverLetters::coverLetters();
                    if(!empty($get_color_codes)){
                        foreach ($get_color_codes as $key => $value) {
                            if(!empty($get_cover_letter->cl_variation)){
                                if($request->template_id == $value['id']){
                                    if(!empty($value['color_codes'])){
                                        UserCoverLetter::where('id',$request->cover_letter_id)->update(['cl_variation' => array_values($value['color_codes'])[0] ]);
                                    }
                                }
                            }
                            if($request->template_id == $value['id']){
                                $color_codes['colors'] = $value['color_codes'];
                            }
                        }
                    }
                UserCoverLetter::where('id',$request->cover_letter_id)->update(['cl_template_name' => $request->template_id]);
                $redirect_url = route('cover_letters',[$request->cover_letter_id]);
                return response()->json(array('responseMessage' => 'template changed.', 'redirect_url' => $redirect_url), 200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }
}
