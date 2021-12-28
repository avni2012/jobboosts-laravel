<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use SoftDeletes;

    protected $table = 'coaches';

    protected $fillable = ['name','about_me','experience','facebook_link','instagram_link','twitter_link','linkedin_link','display_image'];

    public function available_days()
    {
        return $this->hasMany('App\Models\CoachAvailability','coach_id','id');
    }

    public function available_dates()
    {
        return $this->hasMany('App\Models\CoachAvailabilityDate','coach','id')->where('availability_start_date','>=',date('Y-m-d'))->where('availability_end_date','>=',date('Y-m-d'));
    }
}
