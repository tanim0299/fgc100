<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifyPasswdToSslCommerzPayInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ssl_commerz_pay_infos', function (Blueprint $table) {
            $table->string('verify_passwd',120)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ssl_commerz_pay_infos', function (Blueprint $table) {
            $table->string('verify_passwd',120)->nullable();
        });
    }
}
