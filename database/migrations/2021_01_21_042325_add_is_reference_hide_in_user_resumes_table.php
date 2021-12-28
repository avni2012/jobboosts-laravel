<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsReferenceHideInUserResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_resumes', function (Blueprint $table) {
            $table->boolean('is_reference_hide')->after('profile_summary')->default(0)->comment('0-Active(currently showing), 1-Hide(currently hide)');
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
            $table->dropColumn('is_reference_hide');
        });
    }
}
