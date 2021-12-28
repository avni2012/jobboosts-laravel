<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_hobbies')){
            Schema::create('user_hobbies', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('uh_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('uh_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('uh_hobby')->nullable();
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
        Schema::dropIfExists('user_hobbies');
    }
}
