<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('blogs')){
            Schema::create('blogs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title')->nullable();
                $table->string('slug')->nullable();
                $table->unsignedBigInteger('category');
                $table->foreign('category')->references('id')->on('blog_categories')->onDelete('cascade');
                $table->longText('content')->nullable();
                $table->integer('author')->unsigned()->nullable();
                $table->foreign('author')->references('id')->on('coaches')->onDelete('cascade');
                $table->string('tag')->nullable();
                $table->date('publish_date')->nullable();
                $table->string('blog_image')->nullable();
                $table->boolean('status')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
