<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToInformationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_categories', function (Blueprint $table) {
            $table->string('period_from')->nullable();
            $table->string('period_to')->nullable();
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
            $table->dropColumn('period_from');
            $table->dropColumn('period_to');
        });
    }
}
