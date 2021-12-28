<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExtraCurricularActivity extends Model
{
    use SoftDeletes;

    protected $table = 'user_extra_curricular_activity';

    protected $fillable = ['ueca_user_resume_id','ueca_function_title','ueca_employer','ueca_start_date','ueca_end_date','ueca_is_present','ueca_city','extra_curricular_description'];

    public function user_resume(){
    	return $this->belongsTo('App\Models\Resume\UserResume','id');
    }
}
