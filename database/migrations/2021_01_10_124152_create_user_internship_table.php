<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInternshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_internship')){
            Schema::create('user_internship', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ui_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ui_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ui_job_title')->nullable();
                $table->string('ui_employer')->nullable();
                $table->string('ui_start_date')->nullable();
                $table->string('ui_end_date')->nullable();
                $table->boolean('ui_is_present')->default(0)->comment('0-Past(currently not active), 1-Present(currently active)');
                $table->string('ui_city')->nullable();
                $table->longText('internship_description')->nullable();
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
        Schema::dropIfExists('user_internship');
    }
}
