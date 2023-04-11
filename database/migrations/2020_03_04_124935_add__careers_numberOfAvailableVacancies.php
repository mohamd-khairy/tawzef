<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCareersNumberOfAvailableVacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->integer('number_of_available_vacancies')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->string('salary')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn('number_of_available_vacancies');
            $table->dropColumn('location');
            $table->dropColumn('type');
            $table->dropColumn('salary');
        });
    }
}
