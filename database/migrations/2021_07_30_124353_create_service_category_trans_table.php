<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCategoryTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category_trans', function (Blueprint $table) {
            $table->integer('service_category_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();
            $table->primary(['service_category_id', 'language_id']);
            $table->string('title');
            $table->string('meta_title')->nullable();
            $table->text('description');
            $table->mediumText('meta_description')->nullable();
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
        Schema::dropIfExists('service_category_trans');
    }
}
