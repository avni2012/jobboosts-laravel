<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResumeThumbImageInUserResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_resumes', function (Blueprint $table) {
            $table->string('resume_thumb_image')->after('profile_summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_resumes', function (Blueprint $table) {
            $table->dropColumn('resume_thumb_image');
        });
    }
}
