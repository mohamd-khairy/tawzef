<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldToOfficeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('office_services', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->float('offer_price', 10, 2)->nullable();
            $table->integer('number_of_free_modification')->nullable();
            $table->date('offer_date')->nullable();
            $table->float('offer_duration', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->mediumText('terms')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('office_services', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('offer_price');
            $table->dropColumn('number_of_free_modification');
            $table->dropColumn('offer_date');
            $table->dropColumn('offer_duration');
            $table->dropColumn('description');
            $table->dropColumn('terms');
        });
    }
}
