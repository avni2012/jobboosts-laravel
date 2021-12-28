<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoachAvailability extends Model
{
    use SoftDeletes;

    protected $table = 'coach_availabilities';

    protected $fillable = ['coach_id','day','start_time','end_time'];
}
