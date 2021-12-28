<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsInGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('cover_letters_starts_with')->nullable()->after('resume_built_starts_with');
            $table->string('email_templates_starts_with')->nullable()->after('cover_letters_starts_with');
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
            $table->dropColumn('cover_letters_starts_with');
            $table->dropColumn('email_templates_starts_with');
        });
    }
}
