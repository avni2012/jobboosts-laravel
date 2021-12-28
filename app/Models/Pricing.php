<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pricing extends Model
{
    use SoftDeletes;

    protected $table ="pricing";

    protected $fillable = ['plan_name','plan_image','plan_description','plan_include','validity','price','discount_type','discount_value','discounted_price','status'];

    public function PricingSubscriptions()
    {
        return $this->hasOne('App\Models\PricingSubscription', 'pricing_id', 'id');
    }

}
