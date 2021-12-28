<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;

    protected $table = 'contact_us';

    public function category()
    {
        return $this->hasOne('App\Models\ContactUsCategory','id','category_id');
    }
}
