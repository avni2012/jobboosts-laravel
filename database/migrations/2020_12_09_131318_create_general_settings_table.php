<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_key');
            $table->string('auth_secret');
            $table->string('facebook_key');
            $table->string('facebook_secret');
            $table->string('facebook_callback_url');
            $table->string('google_key');
            $table->string('google_secret');
            $table->string('google_callback_url');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('linked_in_link');
            $table->string('web_address');
            $table->string('mob_no');
            $table->string('web_email');
            $table->string('logo');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
