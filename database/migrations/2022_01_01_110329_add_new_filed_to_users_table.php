<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFiledToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('agency_rating')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('accounting_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('nick_name');
            $table->dropColumn('agency_rating');
            $table->dropColumn('representative_name');
            $table->dropColumn('bank_account_number');
            $table->dropColumn('tax_number');
            $table->dropColumn('accounting_email');
        });
    }
}
