<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferencePresentLabelInUserReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_references', function (Blueprint $table) {
            $table->boolean('ur_is_present')->default(0)->comment('0-Show(currently Showing), 1-Hide(currently not Showing)')->after('ur_refer_email')->nullable();
            $table->string('ur_present_label')->after('ur_is_present')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_references', function (Blueprint $table) {
            $table->dropColumn('ur_is_present');
            $table->dropColumn('ur_present_label');
        });
    }
}
