<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pricing')){
            Schema::create('pricing', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('plan_name')->nullable();
                $table->string('plan_image')->nullable();
                $table->text('plan_description')->nullable();
                $table->text('plan_include')->nullable()->comment('This is from helper class called PlanIncludes');
                $table->tinyInteger('validity')->nullable()->comment('In Month');
                $table->bigInteger('price');
                $table->tinyInteger('discount_type')->nullable()->comment('1=Percentage, 2=fixed');
                $table->bigInteger('discount_value')->nullable();
                $table->bigInteger('discounted_price')->nullable();
                $table->tinyInteger('status')->nullable()->comment('1=Activate,0=Deactivate');
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
        Schema::dropIfExists('pricing');
    }
}
