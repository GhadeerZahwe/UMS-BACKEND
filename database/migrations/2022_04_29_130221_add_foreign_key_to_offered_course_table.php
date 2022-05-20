<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offered_course', function (Blueprint $table) {
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('instructor_id')->references('id')->on('instructor');
            $table->foreign('course_id')->references('id')->on('course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offered_course', function (Blueprint $table) {
            Schema::dropIfExists('offered_course');

        });
    }
};
