<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClThumbImageInUserCoverLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_cover_letters', function (Blueprint $table) {
            $table->string('cl_thumb_image')->after('cl_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_cover_letters', function (Blueprint $table) {
            $table->dropColumn('cl_thumb_image');
        });
    }
}
