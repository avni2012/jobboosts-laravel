<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_references')){
            Schema::create('user_references', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('ur_user_resume_id')->nullable()->unsigned()->comment('foreign key user resumes');
                $table->foreign('ur_user_resume_id')->references('id')->on('user_resumes')->onDelete('cascade');
                $table->string('ur_refer_full_name')->nullable();
                $table->string('ur_refer_company_name')->nullable();
                $table->string('ur_refer_phone')->nullable();
                $table->string('ur_refer_email')->nullable();
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
        Schema::dropIfExists('user_references');
    }
}
