<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationCategoriesTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_category_trans', function (Blueprint $table) {
            $table->unsignedBigInteger('information_category_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->primary(['information_category_id','language_id'],'info_categories_id');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_category_trans');
    }
}
