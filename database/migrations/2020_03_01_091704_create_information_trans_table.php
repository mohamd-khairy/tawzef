<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_trans', function (Blueprint $table) {
            $table->integer('information_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();
            $table->primary(['information_id', 'language_id']);
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
        Schema::dropIfExists('information_trans');
    }
}
