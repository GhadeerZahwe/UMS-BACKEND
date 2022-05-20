<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferedCourse extends Model
{
    use HasFactory;

    protected $table = 'offered_course';
    protected $fillable = [
        'offered_course_room',
        'offered_course_time',
        'offered_course_date',
        'offered_course_section',
        'semester_id',
        'instructor_id',
        'course_id',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }

    public function studentregistration()
    {
        return $this->hasMany(StudentRegistration::class);
    }

}
