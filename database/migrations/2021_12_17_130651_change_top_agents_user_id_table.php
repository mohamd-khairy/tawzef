<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTopAgentsUserIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('top_agents', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('top_agents', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index();
            $table->dropColumn('image');
        });
    }
}
