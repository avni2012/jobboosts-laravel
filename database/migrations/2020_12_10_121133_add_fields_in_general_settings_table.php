<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('sign_ups_per_day_starts_with')->after('logo')->nullable();
            $table->string('resume_built_starts_with')->after('sign_ups_per_day_starts_with')->nullable();
            $table->string('google_map_link')->after('resume_built_starts_with')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('sign_ups_per_day_starts_with');
            $table->dropColumn('resume_built_starts_with');
            $table->dropColumn('google_map_link');
        });
    }
}
