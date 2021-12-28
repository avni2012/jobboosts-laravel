<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoachCompletedonAndReasonForRejectAndRejectedOnInUserSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->datetime('coach_completedon')->nullable()->after('meeting_info');
            $table->text('reason_for_reject')->nullable()->after('coach_completedon');
            $table->datetime('coach_rejectedon')->nullable()->after('reason_for_reject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->dropColumn('coach_completedon');
            $table->dropColumn('reason_for_reject');
            $table->dropColumn('coach_rejectedon');
        });
    }
}
