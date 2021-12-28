<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cms extends Model
{
    use SoftDeletes;

    protected $table = 'cms';

    protected $fillable = ['page_slug','page_name','description','status','page_title','image','seo_keyword','seo_description'];
}
