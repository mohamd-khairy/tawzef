<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFiledsToBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            // $table->dropColumn('latitude');
            // $table->dropColumn('longitude');
            $table->string('phone')->nullable();
            $table->text('branch_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('how_to_reach_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('how_to_reach_ar')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('branch_ar');
            $table->dropColumn('address_en');
            $table->dropColumn('how_to_reach_en');
            $table->dropColumn('address_ar');
            $table->dropColumn('how_to_reach_ar');

        });
    }
}
