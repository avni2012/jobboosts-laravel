<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubscriptionCourse extends Model
{
   use SoftDeletes;
   protected $table = "user_subscription_courses";
   protected $fillable = ['course_name','user_id','subscription_id','course_category_id','description','instructions'];

   	public function users(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function course_category(){
    	return $this->hasOne('App\Models\CourseCategory','id','course_category_id');
    }
} 
