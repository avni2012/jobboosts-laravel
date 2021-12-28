<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReference extends Model
{
    use SoftDeletes;

    protected $table = 'user_references';

    protected $fillable = ['ur_user_resume_id','ur_refer_full_name','ur_refer_company_name','ur_refer_phone','ur_refer_email'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
