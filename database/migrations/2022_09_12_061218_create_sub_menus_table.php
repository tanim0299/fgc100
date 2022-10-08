<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menu', function (Blueprint $table) {
            $table->id();
            $table->string('sl',30);
            $table->bigInteger('main_menuid')->unsigned();
            $table->foreign('main_menuid')->references('id')->on('main_menu');
            $table->string('submenu_name',50);
            $table->string('route_name',50);
            $table->string('status',5);
            $table->string('admin_id',10);
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
        Schema::dropIfExists('sub_menus');
    }
}
