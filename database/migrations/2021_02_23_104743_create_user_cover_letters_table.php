<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoverLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_cover_letters')){
            Schema::create('user_cover_letters', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('cl_user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('cl_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('cl_title')->nullable()->comment('Cover Letter name saved by user');
                $table->string('cl_job_title')->nullable();
                $table->integer('cl_template_name')->nullable();
                $table->string('cl_variation')->nullable()->comment('Cover Letter color variation');
                $table->string('cl_address')->nullable();
                $table->string('cl_phone')->nullable();
                $table->string('cl_emp_company_name')->nullable();
                $table->string('cl_emp_hiring_manager_name')->nullable();
                $table->string('cl_emp_address')->nullable();
                $table->string('cl_emp_phone')->nullable();
                $table->string('cl_emp_email')->nullable();
                $table->longText('cl_details')->nullable();
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
        Schema::dropIfExists('user_cover_letters');
    }
}
