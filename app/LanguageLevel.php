<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageLevel extends Model
{
    use SoftDeletes;
    protected $table = 'language_levels';

    protected $fillable = ['level'];
}
