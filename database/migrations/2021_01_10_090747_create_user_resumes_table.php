<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_resumes')){
            Schema::create('user_resumes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('main_job_title')->nullable();
                $table->string('resume_title')->nullable()->comment('Resume name saved by user');
                $table->string('resume_template_name')->nullable();
                $table->string('resume_variation')->nullable()->comment('Resume color');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('phone')->nullable();
                $table->string('country')->nullable();
                $table->string('state')->nullable();
                $table->string('city')->nullable();
                $table->string('postal_code')->nullable();
                $table->string('driving_licence')->nullable();
                $table->string('nationality')->nullable();
                $table->string('place_of_birth')->nullable();
                $table->date('date_of_birth')->nullable();
                $table->string('profile_image')->nullable();
                $table->longText('profile_summary')->nullable();
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
        Schema::dropIfExists('user_resumes');
    }
}
