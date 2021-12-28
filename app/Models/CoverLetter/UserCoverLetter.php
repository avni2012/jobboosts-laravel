<?php

namespace App\Models\CoverLetter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCoverLetter extends Model
{
    use SoftDeletes;

    protected $table = 'user_cover_letters';

    protected $fillable = ['cl_user_id', 'cl_title', 'cl_job_title', 'cl_template_name', 'cl_variation', 'cl_address', 'cl_phone', 'cl_emp_company_name', 'cl_emp_hiring_manager_name', 'cl_emp_address', 'cl_emp_phone', 'cl_emp_email', 'cl_details'];

    public function user(){
    	return $this->belongsTo('App\User','cl_user_id','id');
    }
    
}
