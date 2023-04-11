<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *php artisan module:make-middleware CanReadPostsMiddleware Blog



     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
