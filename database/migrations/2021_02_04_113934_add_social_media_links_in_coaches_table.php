<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialMediaLinksInCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->text('facebook_link')->after('experience')->nullable();
            $table->text('instagram_link')->after('facebook_link')->nullable();
            $table->text('twitter_link')->after('instagram_link')->nullable();
            $table->text('linkedin_link')->after('twitter_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->dropColumn('facebook_link');
            $table->dropColumn('instagram_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('linkedin_link');
        });
    }
}
