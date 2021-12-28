<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserResume extends Model
{
    use SoftDeletes;

    protected $table = 'user_resumes';

    protected $fillable = ['user_id','main_job_title','resume_title','resume_template_name','resume_variation','first_name','last_name','phone','country','state','city','postal_code','driving_licence','nationality','place_of_birth','date_of_birth','profile_image','profile_summary'];

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function user_career(){
    	return $this->hasMany('App\Models\Resume\UserCareer');
    }
}
