<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachAvailabilityDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('coach_availability_dates')){
            Schema::create('coach_availability_dates', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('coach')->nullable()->unsigned()->comment('foreign key coaches');
                $table->foreign('coach')->references('id')->on('coaches')->onDelete('cascade');
                $table->date('availability_start_date')->nullable();
                $table->date('availability_end_date')->nullable();
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
        Schema::dropIfExists('coach_availability_dates');
    }
}
