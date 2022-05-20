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
        Schema::create('studentregistration', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('letter_grade');
            $table->integer('passed_failed_grade');
            $table->integer('mark_grade');

            $table->integer('attendance');
            $table->integer('course_status');
            $table->integer('student_id')->unsigned();
            $table->integer('offered_course_id')->unsigned();
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
        Schema::dropIfExists('studentregistration');
    }
};
