<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMemberInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_member_infos', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('family_member_id')->nullable();
            $table->string('family_member_name',200)->nullable();
            $table->string('family_member_image',200)->nullable();
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
        Schema::dropIfExists('family_member_infos');
    }
}
