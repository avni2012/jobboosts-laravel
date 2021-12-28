<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoachAvailabilityDate extends Model
{
    use SoftDeletes;

    protected $table = 'coach_availability_dates';

    protected $fillable = ['coach','availability_start_date','availability_end_date'];
}
