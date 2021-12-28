<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
   use SoftDeletes;
   protected $table = "blog_categories";
   protected $fillable = ['name'];

   public function blogs() 
   {
	    return $this->hasMany(Blog::class, 'category');
   }
}
