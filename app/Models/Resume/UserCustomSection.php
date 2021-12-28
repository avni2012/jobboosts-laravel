<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCustomSection extends Model
{
    use SoftDeletes;

    protected $table = 'user_custom_section';

    protected $fillable = ['ucs_user_resume_id','ucs_title','ucs_start_date','ucs_end_date','ucs_is_present','ucs_city','custom_description'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
