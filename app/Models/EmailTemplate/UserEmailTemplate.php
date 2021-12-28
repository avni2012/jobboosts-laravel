<?php

namespace App\Models\EmailTemplate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEmailTemplate extends Model
{
    use SoftDeletes;

    protected $table = 'user_email_templates';

    protected $fillable = ['uet_user_id', 'uet_title', 'uet_name', 'uet_content'];

    public function user(){
    	return $this->belongsTo('App\User','uet_user_id','id');
    }
    
}
