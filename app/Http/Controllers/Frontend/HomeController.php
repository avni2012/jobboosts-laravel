<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Helpers;
use App\Models\Cms;
use App\Models\ContactUsCategory;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Coach;
use App\Models\ContactUs;
use App\Models\HomepageSlider;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;

class HomeController extends Controller
{
    public function home() {
        try {
            $images = HomepageSlider::get();
            $coaches = Coach::get();
            return view('frontend.home',compact('images','coaches'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function contactUs(){
        try {
            $contact_us_categories = ContactUsCategory::get();
            $contact = GeneralSetting::first();
            if(count($contact_us_categories) == 0) {
                redirect()->back()
                    ->with(['message.content' => 'Contact us categories not found.','message.level' => 'danger']);
            }
            return view('frontend.contact-us', compact('contact_us_categories','contact'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function about(){
        try {
            return view('frontend.about');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function teams(){
        try {
            $coaches = Coach::get();
            return view('frontend.team',compact('coaches'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function blogs(){
        try {
            return view('frontend.blog');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function blogDetails(){
        try {
            return view('frontend.blog-detail');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    /*public function pricing(){
        try {
            $category_id = FaqCategory::where('category','Pricing')->pluck('id')->first();
            if($category_id) {
                $faqs = Faq::where('status', 1)->where('category_id',$category_id)->get();
            } else {
                $faqs = [];
            }
            return view('frontend.pricing', compact('faqs'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }*/

    public function resumeBuilder() {
        try {
            return view('frontend.resume-builder');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function contactUsSubmit(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'name'  => 'required|min:2|max:255',
                'email' => 'required|email',
                'mobile_no' => 'required|numeric|digits_between:6,16',
                'subject' => 'required|exists:contact_us_categories,id',
                'message' => 'required|min:10'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $contact_us_category = ContactUsCategory::find($request->subject);

            $new_contact_us = new ContactUs();
            $new_contact_us->name = $request->name;
            $new_contact_us->email = $request->email;
            $new_contact_us->mobile_no = $request->mobile_no;
            $new_contact_us->category_id = $contact_us_category->id;
            $new_contact_us->subject = $contact_us_category->category;
            $new_contact_us->message = $request->message;
            if($new_contact_us->save()) {
                try {
                    $emailtemplate = EmailTemplate::where('keyword', 'CONTACT FORM NOTIFICATION TO ADMIN')->first();
                    $vars = ['{{NAME}}' => $request->name, '{{EMAIL}}' => $request->email, '{{MESSAGE}}' => $request->message, '{{CREATED_AT}}' => date('d/m/Y h:i A'), '{{APP_NAME}}' => env('APP_NAME')];

                    $emailtemplate->content = Helpers\EmailTemplate::email_template_replace_tags($emailtemplate->content,
                        $vars);
                    $mail = Helpers\EmailTemplate::sendMail($emailtemplate, config('services.contact_us.to'));
                    if($mail) {
                        Helpers\Common::logRecorder('contact-us','contact-us', "Contact us email from user ( ".$request->name." ) sent to admin at ".date('Y-m-d h:i A'));
                    } else {
                        Helpers\Common::logRecorder('contact-us','contact-us', "Error sending contact us email from user ( ".$request->name." ) at ".date('Y-m-d h:i A'));
                    }
                } catch (\Exception $e) {
                    Log::error('sendMail', ['Exception' => $e->getMessage()]);
                }
                return redirect()->back()
                    ->with(['message.content' => 'Your Contact Details has been sended successfully.','message.level' => 'success']);
            } else {
                return redirect()->back()
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function faqs() {
        try {
            $faqs = Faq::where('status', 1)->get();
            $faqs_category = FaqCategory::get();
            return view('frontend.faq', compact('faqs','faqs_category'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function faqSubmit(Request $request){
        try {
                $validator = Validator::make($request->all(), [
                    'name'  => 'required|min:2|max:255',
                    'email' => 'required|email',
                    'mobile_no' => 'required|numeric|digits_between:6,16',
                    'message' => 'required|min:10'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $new_contact_us = new ContactUs();
                $new_contact_us->name = $request->name;
                $new_contact_us->email = $request->email;
                $new_contact_us->mobile_no = $request->mobile_no;
                $new_contact_us->message = $request->message;
                if($new_contact_us->save()) {
                    try {
                        $emailtemplate = EmailTemplate::where('keyword', 'FAQ FORM NOTIFICATION TO ADMIN')->first();
                        $vars = ['{{NAME}}' => $request->name, '{{EMAIL}}' => $request->email, '{{MESSAGE}}' => $request->message, '{{CREATED_AT}}' => date('d/m/Y h:i A'), '{{APP_NAME}}' => env('APP_NAME')];

                        $emailtemplate->content = Helpers\EmailTemplate::email_template_replace_tags($emailtemplate->content,
                            $vars);
                        $mail = Helpers\EmailTemplate::sendMail($emailtemplate, config('services.faq.to'));
                        if($mail) {
                            Helpers\Common::logRecorder('faq','faq', "Contact us email from user ( ".$request->name." ) sent to admin at ".date('Y-m-d h:i A'));
                        } else {
                            Helpers\Common::logRecorder('faq','faq', "Error sending contact us email from user ( ".$request->name." ) at ".date('Y-m-d h:i A'));
                        }
                    } catch (\Exception $e) {
                        Log::error('sendMail', ['Exception' => $e->getMessage()]);
                    }
                    return redirect()->back()
                        ->with(['message.content' => 'Your Question has been sended successfully.','message.level' => 'success']);
                } else {
                    return redirect()->back()
                        ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                }
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function cms(Request $request) {
        try {
            $cms = Cms::where('page_slug', $request->slug)->first();
            if(!$cms) {
                redirect()->back()
                    ->with(['message.content' => 'No CMS page found.','message.level' => 'danger']);
            } else {
                return view('frontend.cms', compact('cms'));
            }
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function coverLetters(Request $request)
    {
        try {
            return view('frontend.cover-letters');
        } catch(\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function emailCoverLetter(Request $request)
    {
        try {
            return view('frontend.email-cover-letter');
        } catch(\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function emailTemplates(Request $request)
    {
        try {
            return view('frontend.email-templates');
        } catch(\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function termsConditions(){
        try {
            return view('frontend.terms-conditions');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }

    public function privacyPolicy(){
        try {
            return view('frontend.privacy-policy');
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }
}
