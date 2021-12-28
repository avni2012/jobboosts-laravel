<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLanguage extends Model
{
    use SoftDeletes;

    protected $table = 'user_languages';

    protected $fillable = ['ul_user_resume_id','ul_language','ul_language_level_id'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }

    public function language_level(){
    	return $this->hasOne('App\LanguageLevel','id','ul_language_level_id');
    }
}
