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
            $table->string('offered_course_room')->change();
            $table->string('offered_course_time')->change();
            $table->string('offered_course_date')->change();
            $table->string('offered_course_section')->change();
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
            $table->integer('offered_course_room')->change();
            $table->integer('offered_course_time')->change();
            $table->integer('offered_course_date')->change();
            $table->integer('offered_course_section')->change();
        });
    }
};
