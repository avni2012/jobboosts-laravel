<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResumeFullnameAndResumeEmailFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('resume_fullname')->nullable()->after('remember_token')->comment('user full name used only for resume builder');
            $table->string('resume_email')->nullable()->after('resume_fullname')->comment('user email used only for resume builder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('resume_fullname');
            $table->dropColumn('resume_email');
        });
    }
}
