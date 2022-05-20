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
        Schema::create('offered_course', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('offered_course_room');
            $table->integer('offered_course_time');
            $table->integer('offered_course_date');
            $table->integer('offered_course_section');
            $table->integer('semester_id')->unsigned();
            $table->integer('instructor_id')->unsigned();
            $table->integer('course_id')->unsigned();
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
        Schema::dropIfExists('offered_course');
    }
};
