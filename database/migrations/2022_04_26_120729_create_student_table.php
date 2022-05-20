<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('blood_type');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->string('personal_email');
            $table->string('martial_status');
            $table->string('mother_name');
            $table->string('city');
            $table->string('street');
            $table->string('building');
            $table->string('floor');
            $table->string('email');
            $table->integer('major_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('student');
    }
};
