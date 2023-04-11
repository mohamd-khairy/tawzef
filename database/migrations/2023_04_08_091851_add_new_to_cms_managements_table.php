<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewToCmsManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_managements', function (Blueprint $table) {
            $table->string('title_en');
            $table->mediumText('description_en');
            $table->string('title_ar');
            $table->mediumText('description_ar');
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
            $table->dropColumn('title_en');
            $table->dropColumn('description_en');
            $table->dropColumn('title_ar');
            $table->dropColumn('description_ar');
        });
    }
}
