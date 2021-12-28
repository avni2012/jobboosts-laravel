<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Cms;
use App\Models\Course;

class CourseController extends Controller
{
    public function getCourses() {
        try {
                $cms = Cms::where('page_slug','Job-Boosts-Learning')->where('status',1)->first();
                $courses = Course::get();
                return view('frontend.courses',compact('cms','courses'));
        } catch (\Exception $e) {
            redirect()->back()
                ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }
}
