<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id',255);
            $table->string('name',100)->nullable();
            $table->string('fathers_name',100)->nullable();
            $table->string('mothers_name',100)->nullable();
            $table->string('gender',100)->nullable();
            $table->longText('address')->nullable();
            $table->string('last_class',100)->nullable();
            $table->string('registration_number',100)->nullable();
            $table->string('roll_number',100)->nullable();
            $table->string('passing_year',100)->nullable();
            $table->string('session',100)->nullable();
            $table->string('occupation',100)->nullable();
            $table->string('designation',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('t_shirt',100)->nullable();
            $table->string('total_member',100)->nullable();
            $table->double('registraiton_fee',10,2)->nullable();
            $table->double('total_ammount',10,2)->nullable();
            $table->string('image',100)->nullable();
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
        Schema::dropIfExists('ex_students');
    }
}
