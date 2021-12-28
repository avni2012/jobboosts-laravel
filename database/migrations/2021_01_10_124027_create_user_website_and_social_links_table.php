<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWebsiteAndSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_website_and_social_links')){
            Schema::create('user_website_and_social_links', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('uwsl_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('uwsl_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('uwsl_website_label')->nullable();
                $table->string('uwsl_website_link')->nullable();
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_website_and_social_links');
    }
}
