<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->nullable();
            $table->string('name',100);
            $table->string('fathers_name',100);
            $table->string('mothers_name',100);
            $table->string('gender',100);
            $table->text('address')->nullable();
            $table->string('passing_year',50)->nullable();
            $table->string('passing_class',50)->nullable();
            $table->string('roll_number',50)->nullable();
            $table->string('session',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('present_class',100)->nullable();
            $table->string('group',100)->nullable();
            $table->string('admission_year',100)->nullable();
            $table->string('class_roll_id',100)->nullable();
            $table->string('registration_no',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('t_shirt',100)->nullable();
            $table->string('total_member',100)->nullable();
            $table->string('total_ammount',100)->nullable();
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
        Schema::dropIfExists('others_students');
    }
}
