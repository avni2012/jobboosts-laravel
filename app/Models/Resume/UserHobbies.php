<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHobbies extends Model
{
    use SoftDeletes;

    protected $table = 'user_hobbies';

    protected $fillable = ['uh_user_resume_id','uh_hobby'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
