<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
   use SoftDeletes;
   protected $table = "blogs";
   protected $fillable = ['title','slug','content','category','author','tag','publish_date','blog_image'];

   public function blog_categories()
   {
       return $this->belongsTo('App\Models\BlogCategory','category','id');
   }

   public function coaches()
   {
       return $this->belongsTo('App\Models\Coach','author','id');
   }

   public function tags()
   {
       return $this->hasMany('App\Models\Tag','id');
   }
}
