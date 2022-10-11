<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSslCommerzPayInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_commerz_pay_infos', function (Blueprint $table) {
            $table->id();
            $table->string("tran_id", 120)->nullable();
            $table->string("val_id", 120)->nullable();
            $table->string("amount", 120)->nullable();
            $table->string("card_type", 120)->nullable();
            $table->string("store_amount", 120)->nullable();
            $table->string("card_no", 120)->nullable();
            $table->string("bank_tran_id", 120)->nullable()->unique();
            $table->string("status", 120)->nullable();
            $table->string("tran_date", 120)->nullable();
            $table->string("error", 120)->nullable();
            $table->string("currency", 20)->nullable();
            $table->string("card_issuer", 120)->nullable();
            $table->string("card_brand", 120)->nullable();
            $table->string("card_sub_brand", 120)->nullable();
            $table->string("card_issuer_country", 120)->nullable();
            $table->string("card_issuer_country_code", 120)->nullable();
            $table->string("store_id", 120)->nullable();
            $table->string("verify_sign", 120)->nullable()->change();
            $table->longText("verify_key")->nullable()->change();
            $table->string("verify_sign_sha2", 120)->nullable();
            $table->string("currency_type", 120)->nullable();
            $table->string("currency_amount", 120)->nullable();
            $table->string("currency_rate", 120)->nullable();
            $table->string("base_fair", 120)->nullable();
            $table->string("value_a", 120)->nullable()->comment("mobile number");
            $table->string("value_b", 120)->nullable()->comment("user reg id");
            $table->string("value_c", 120)->nullable()->comment("reg type:present or ex-std");
            $table->string("value_d", 120)->nullable();
            $table->string("subscription_id", 120)->nullable();
            $table->string("risk_level", 120)->nullable();
            $table->string("risk_title", 120)->nullable();
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
        Schema::dropIfExists('ssl_commerz_pay_infos');
    }
}
