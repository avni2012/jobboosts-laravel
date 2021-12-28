<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_email_templates')){
            Schema::create('user_email_templates', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('uet_user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('uet_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('uet_title')->nullable()->comment('Cover Letter name saved by user');
                $table->integer('uet_name')->nullable();
                $table->longText('uet_content')->nullable();
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
        Schema::dropIfExists('user_email_templates');
    }
}
