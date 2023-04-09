<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_categories',function(Blueprint $table){
            $table->bigInteger('parent_id')->nullable();
            $table->string('page_view')->nullable()->default('list'); 
            $table->string('ref')->nullable()->default('info');
        });

        Schema::table('informations', function (Blueprint $table) {
            $table->date('info_date')->nullable();
            $table->string('period_from')->nullable();
            $table->string('period_to')->nullable();
            $table->string('ref')->nullable()->default('info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information_categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('page_view');
            $table->dropColumn('ref');
        });

        Schema::table('informations', function (Blueprint $table) {
            $table->dropColumn('info_date');
            $table->dropColumn('period_from');
            $table->dropColumn('period_to');
            $table->dropColumn('ref');
        });

    }
}
