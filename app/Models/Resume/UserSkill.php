<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSkill extends Model
{
    use SoftDeletes;

    protected $table = 'user_skill';

    protected $fillable = ['us_user_resume_id','us_skill','us_skill_level'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
