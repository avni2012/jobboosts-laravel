<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCouponCodeAndAmountAndJsonInPricingSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pricing_subscriptions', function (Blueprint $table) {
            $table->string('coupon_code')->after('pricing_amount')->nullable();
            $table->bigInteger('coupon_amount')->after('coupon_code')->nullable();
            $table->text('coupon_json')->after('coupon_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pricing_subscriptions', function (Blueprint $table) {
            $table->dropColumn('coupon_code');
            $table->dropColumn('coupon_amount');
            $table->dropColumn('coupon_json');
        });
    }
}
