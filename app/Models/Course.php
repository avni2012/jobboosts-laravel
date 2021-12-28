<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';

    protected $fillable = ['title','image','description','category_id','what_you_learn','outcomes'];

    public function course_category()
   	{
       return $this->belongsTo('App\Models\CourseCategory','category_id','id');
   	}
}
