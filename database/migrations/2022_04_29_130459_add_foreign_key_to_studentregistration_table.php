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
        Schema::table('studentregistration', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('offered_course_id')->references('id')->on('offered_course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studentregistration', function (Blueprint $table) {
            Schema::dropIfExists('studentregistration');
        });
    }
};
