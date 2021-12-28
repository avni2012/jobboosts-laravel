<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $table ="faqs";

    protected $fillable = ['title','description','status'];

    public function category()
    {
        return $this->hasOne('App\Models\FaqCategory','id','category_id');
    }
}
