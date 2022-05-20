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
            $table->string('passed_failed_grade')->change();
            $table->string('mark_grade')->change();
            $table->string('attendance')->change();
            $table->string('course_status')->change();
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
            $table->integer('passed_failed_grade')->change();
            $table->integer('mark_grade')->change();
            $table->integer('attendance')->change();
            $table->integer('course_status')->change();
        });
    }
};
