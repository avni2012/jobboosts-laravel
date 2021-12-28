<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCustomSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_custom_section')){
            Schema::create('user_custom_section', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ucs_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ucs_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ucs_title')->nullable();
                $table->string('ucs_start_date')->nullable();
                $table->string('ucs_end_date')->nullable();
                $table->boolean('ucs_is_present')->default(0)->comment('0-Past(currently not active), 1-Present(currently active)');
                $table->string('ucs_city')->nullable();
                $table->longText('custom_description')->nullable();
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
        Schema::dropIfExists('user_custom_section');
    }
}
