<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentToPresentStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('present_students', function (Blueprint $table) {
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
        Schema::table('present_students', function (Blueprint $table) {
            $table->integer('payment')->nullable();
            $table->dateTime('payment_date')->nullable();
        });
    }
}
