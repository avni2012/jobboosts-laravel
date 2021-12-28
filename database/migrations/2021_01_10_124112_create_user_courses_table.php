<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_courses')){
            Schema::create('user_courses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ucr_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ucr_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ucr_course_name')->nullable();
                $table->string('ucr_institute')->nullable();
                $table->string('ucr_start_date')->nullable();
                $table->string('ucr_end_date')->nullable();
                $table->boolean('ucr_is_present')->default(0)->comment('0-Past(currently not active), 1-Present(currently active)');
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
        Schema::dropIfExists('user_courses');
    }
}
