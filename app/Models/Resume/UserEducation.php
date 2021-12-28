<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEducation extends Model
{
    use SoftDeletes;

    protected $table = 'user_education';

    protected $fillable = ['ue_user_resume_id','ue_degree','ue_school_name','ue_start_date','ue_end_date','ue_is_present','ue_city','education_description'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
