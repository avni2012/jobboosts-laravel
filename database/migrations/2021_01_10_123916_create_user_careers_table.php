<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_careers')){
            Schema::create('user_careers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('uc_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('uc_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('uc_job_title')->nullable();
                $table->string('uc_company_name')->nullable();
                $table->string('uc_start_date')->nullable();
                $table->string('uc_end_date')->nullable();
                $table->boolean('uc_is_present')->default(0)->comment('0-Past(currently not working), 1-Present(currently working)');
                $table->string('uc_city')->nullable();
                $table->longText('career_description')->nullable();
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
        Schema::dropIfExists('user_careers');
    }
}
