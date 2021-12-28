<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_languages')){
            Schema::create('user_languages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ul_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ul_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ul_language')->nullable();
                $table->biginteger('ul_language_level_id')->nullable()->unsigned()->comment('foreign key language levels');
                $table->foreign('ul_language_level_id')->references('id')->on('language_levels')->onDelete('cascade');
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
        Schema::dropIfExists('user_languages');
    }
}
