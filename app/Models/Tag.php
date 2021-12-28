<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use SoftDeletes;
    protected $table ="tags";
    protected $fillable = ['name','slug','status'];
    // protected $filllabe = ['name','slug','description','status'];

   public function tags() 
   {
	    return $this->hasMany(Blog::class, 'tag');
   }
}
