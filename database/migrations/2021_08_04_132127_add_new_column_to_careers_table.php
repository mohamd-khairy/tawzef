<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('services')->nullable();
            $table->mediumText('resume')->nullable();
            $table->mediumText('message')->nullable();
            $table->dropColumn('is_featured');
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
        });
    }
}
