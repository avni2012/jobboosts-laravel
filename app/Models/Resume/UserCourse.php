<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use SoftDeletes;

    protected $table = 'user_courses';

    protected $fillable = ['ucr_user_resume_id','ucr_course_name','ucr_institute','ucr_start_date','ucr_end_date','ucr_is_present'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
