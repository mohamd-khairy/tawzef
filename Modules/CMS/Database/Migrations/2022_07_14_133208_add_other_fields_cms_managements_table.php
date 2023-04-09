<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherFieldsCmsManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_managements', function (Blueprint $table) {
            $table->bigInteger('product_id')->nullable();
            $table->text('image')->nullable();
            $table->date('award_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_managements', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('image');
            $table->dropColumn('award_date');
        });
    }
}
