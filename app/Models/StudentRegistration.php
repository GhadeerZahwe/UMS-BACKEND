<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'studentregistration';
    protected $fillable = [
        'letter_grade',
        'passed_failed_grade',
        'mark_grade',
        'attendance',
        'course_status',
        'student_id',
        'offered_course_id',
        'assignments_grade',
        'midterm_grade' ,
        'participation_grade',
        'quizzes_grade',
        'finalExam_grade',
        'total_grade',
    ];

    public function offered_course()
    {
        return $this->belongsTo(OfferedCourse::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
