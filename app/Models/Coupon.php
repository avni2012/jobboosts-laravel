<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
	use SoftDeletes;
    protected $table = 'coupons';
    protected $fillable = ['type','coupon_code','discount_type','discount_value','start_date','end_date','one_time_use','currency','created_by','updated_by'];
}
