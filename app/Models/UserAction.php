<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAction extends Model
{
   use SoftDeletes;
   protected $table = "user_actions";
   protected $fillable = ['user_id','admin_id','session_id','action_name','content'];

} 
