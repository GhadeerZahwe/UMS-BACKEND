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
            $table->string('assignments_grade')->nullable();
            $table->string('midterm_grade')->nullable();
            $table->string('participation_grade')->nullable();
            $table->string('quizzes_grade')->nullable();
            $table->string('research_grade')->nullable();
            $table->string('finalExam_grade')->nullable();
            $table->string('total_grade')->nullable();
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
            $table->dropColumn('assignments_grade');
            $table->dropColumn('midterm_grade');
            $table->dropColumn('participation_grade');
            $table->dropColumn('quizzes_grade');
            $table->dropColumn('research_grade');
            $table->dropColumn('finalExam_grade');
            $table->dropColumn('total_grade');

        });
    }
};
