<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaySuccessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_success_infos', function (Blueprint $table) {
            $table->id();
            $table->longText('tran_id');
            $table->string('reg_id');
            $table->string('mobile');
            $table->dateTime('payment_date_time');
            $table->date('payment_date');
            $table->double('amount');
            $table->string('pay_type', 50);
            $table->string('std_type', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_success_infos');
    }
}
