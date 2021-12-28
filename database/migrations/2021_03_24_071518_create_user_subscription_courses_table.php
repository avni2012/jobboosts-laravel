<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubscriptionCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_subscription_courses')){
            Schema::create('user_subscription_courses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('course_name')->nullable();
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('subscription_id')->nullable()->unsigned()->comment('foreign key pricing_subscriptions');
                $table->foreign('subscription_id')->references('id')->on('pricing_subscriptions')->onDelete('cascade');
                $table->bigInteger('course_category_id')->nullable()->unsigned()->comment('foreign key course_category');
                $table->foreign('course_category_id')->references('id')->on('course_category')->onDelete('cascade');
                $table->longText('description')->nullable();
                $table->longText('instructions')->nullable();
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
        Schema::dropIfExists('user_subscription_courses');
    }
}
