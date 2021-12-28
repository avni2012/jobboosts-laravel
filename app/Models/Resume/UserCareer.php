<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCareer extends Model
{
    use SoftDeletes;

    protected $table = 'user_careers';

    protected $fillable = ['uc_user_resume_id','uc_job_title','uc_company_name','uc_start_date','uc_end_date','uc_is_present','uc_city','career_description'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
