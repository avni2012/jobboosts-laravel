<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pricing_subscriptions')){
            Schema::create('pricing_subscriptions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->biginteger('pricing_id')->nullable()->unsigned()->comment('foreign key pricing');
                $table->foreign('pricing_id')->references('id')->on('pricing')->onDelete('cascade');
                $table->date('pricing_expiry_date')->nullable();
                $table->decimal('pricing_amount',10,2)->comment('Pricing Amount');
                $table->longText('pricing_json')->nullable();
                $table->longText('payment_details_json')->nullable();
                $table->string('transaction_id')->nullable();
                $table->string('email')->nullable();
                $table->string('mobile_no')->nullable();
                $table->tinyInteger('payment_status')->default(0)->comment('0:unpaid ,1:paid ,2:cancel');
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_subscriptions');
    }
}
