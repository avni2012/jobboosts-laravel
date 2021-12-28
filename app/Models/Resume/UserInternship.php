<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInternship extends Model
{
    use SoftDeletes;

    protected $table = 'user_internship';

    protected $fillable = ['ui_user_resume_id','ui_job_title','ui_employer','ui_start_date','ui_end_date','ui_is_present','ui_city','internship_description'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
