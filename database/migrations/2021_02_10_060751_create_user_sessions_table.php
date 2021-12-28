<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_sessions')){
            Schema::create('user_sessions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('session_name')->nullable();
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('subscription_id')->nullable()->unsigned()->comment('foreign key pricing_subscriptions');
                $table->foreign('subscription_id')->references('id')->on('pricing_subscriptions')->onDelete('cascade');
                $table->integer('session_sequence_no')->nullable();
                $table->boolean('status')->default(0)->comment('0-unassigned,1-requested,2-accepted,3-completed,4-request_rescheduled)');
                $table->date('session_date')->nullable();
                $table->time('session_time')->nullable();
                $table->datetime('requested_on')->nullable();
                $table->integer('coach_id')->nullable()->unsigned()->comment('foreign key coaches');
                $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');
                $table->datetime('coach_accpetedon')->nullable();
                $table->longText('meeting_info')->comment('Meeting info json')->nullable();
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
        Schema::dropIfExists('user_sessions');
    }
}
