<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWebsiteSocialLink extends Model
{
    use SoftDeletes;

    protected $table = 'user_website_and_social_links';

    protected $fillable = ['uwsl_user_resume_id','uwsl_website_label','uwsl_website_link'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
