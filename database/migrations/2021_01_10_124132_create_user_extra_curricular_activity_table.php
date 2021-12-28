<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtraCurricularActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_extra_curricular_activity')){
            Schema::create('user_extra_curricular_activity', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ueca_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ueca_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ueca_function_title')->nullable();
                $table->string('ueca_employer')->nullable();
                $table->string('ueca_start_date')->nullable();
                $table->string('ueca_end_date')->nullable();
                $table->boolean('ueca_is_present')->default(0)->comment('0-Past(currently not active), 1-Present(currently active)');
                $table->string('ueca_city')->nullable();
                $table->longText('extra_curricular_description')->nullable();
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
        Schema::dropIfExists('user_extra_curricular_activity');
    }
}
