<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_education')){
            Schema::create('user_education', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ue_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ue_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ue_degree')->nullable();
                $table->string('ue_school_name')->nullable();
                $table->string('ue_start_date')->nullable();
                $table->string('ue_end_date')->nullable();
                $table->boolean('ue_is_present')->default(0)->comment('0-Past(currently not studying), 1-Present(currently studying)');
                $table->string('ue_city')->nullable();
                $table->longText('education_description')->nullable();
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
        Schema::dropIfExists('user_education');
    }
}
