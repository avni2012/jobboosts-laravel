<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSession extends Model
{
   use SoftDeletes;
   protected $table = "user_sessions";
   protected $fillable = ['session_name','user_id','subscription_id','session_sequence_no','status','session_date','session_time','requested_on','coach_id','coach_accpetedon','meeting_info'];

   public function coach() 
   {
	    return $this->hasOne(Coach::class, 'id', 'coach_id');
   }

   	public function users(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function coaches(){
    	return $this->belongsTo('App\Models\Coach','coach_id','id');
    }
} 
