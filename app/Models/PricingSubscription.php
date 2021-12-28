<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingSubscription extends Model
{
    use SoftDeletes;

    protected $table ="pricing_subscriptions";

    protected $fillable = ['user_id','pricing_id','pricing_expiry_date','pricing_amount','notes','pricing_json','order_id','payment_details_json','transaction_id','email','mobile_no','payment_status'];

    public function pricing()
   	{
   	  return $this->hasOne(Pricing::class ,'id','pricing_id')->select(['id','plan_slug','plan_name','plan_include','validity','discounted_price']);
   	}
   
}
