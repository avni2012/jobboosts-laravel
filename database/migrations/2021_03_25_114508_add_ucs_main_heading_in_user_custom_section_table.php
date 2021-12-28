<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUcsMainHeadingInUserCustomSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_custom_section', function (Blueprint $table) {
            $table->string('ucs_main_heading')->nullable()->after('ucs_user_resume_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_custom_section', function (Blueprint $table) {
            $table->dropColumn('ucs_main_heading');
        });
    }
}
