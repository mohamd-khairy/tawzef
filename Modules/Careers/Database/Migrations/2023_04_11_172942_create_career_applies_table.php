<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applied_by');
            $table->unsignedBigInteger('career_id');
            $table->text('resume');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
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
        Schema::dropIfExists('career_applies');
    }
}
