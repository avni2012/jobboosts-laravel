<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_actions')){
            Schema::create('user_actions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('admin_id')->nullable()->unsigned()->comment('foreign key users');
                $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('session_id')->nullable()->unsigned()->comment('foreign key user_sessions');
                $table->foreign('session_id')->references('id')->on('user_sessions')->onDelete('cascade');
                $table->string('action_name')->nullable();
                $table->longText('content')->nullable();
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
        Schema::dropIfExists('user_actions');
    }
}
