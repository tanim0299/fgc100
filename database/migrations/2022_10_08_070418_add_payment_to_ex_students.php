<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentToExStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ex_students', function (Blueprint $table) {
            $table->integer('payment')->nullable();
            $table->dateTime('payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ex_students', function (Blueprint $table) {
            $table->integer('payment')->nullable();
            $table->dateTime('payment_date')->nullable();
        });
    }
}
