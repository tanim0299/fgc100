<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentToOthersStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('others_students', function (Blueprint $table) {
            $table->integer('payment')->default('0');
            $table->dateTime('payment_date')->nullable();
            $table->longText('tran_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('others_students', function (Blueprint $table) {
            $table->integer('payment')->default('0');
            $table->dateTime('payment_date')->nullable();
            $table->longText('tran_id')->nullable();
        });
    }
}
