<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFiledsInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->mediumText('our_mission_en')->nullable();
            $table->mediumText('our_mission_ar')->nullable();
            $table->mediumText('our_vision_en')->nullable();
            $table->mediumText('our_vision_ar')->nullable();
            $table->string('our_value_en')->nullable();
            $table->string('our_value_ar')->nullable();
            $table->dropColumn('thank_you_message_en');
            $table->dropColumn('thank_you_message_ar');
            $table->dropColumn('auto_reply_message_en');
            $table->dropColumn('auto_reply_message_ar');
            $table->dropColumn('aside_title_en');
            $table->dropColumn('aside_title_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('our_mission_en')->nullable();
            $table->dropColumn('our_mission_ar')->nullable();
            $table->dropColumn('our_vision_en')->nullable();
            $table->dropColumn('our_vision_ar')->nullable();
            $table->dropColumn('our_value_en')->nullable();
            $table->dropColumn('our_value_ar')->nullable();
            $table->mediumText('thank_you_message_en')->nullable();
            $table->mediumText('thank_you_message_ar')->nullable();
            $table->mediumText('auto_reply_message_en')->nullable();
            $table->mediumText('auto_reply_message_ar')->nullable();
            $table->string('aside_title_en')->nullable();
            $table->string('aside_title_ar')->nullable();
        });
    }
}
