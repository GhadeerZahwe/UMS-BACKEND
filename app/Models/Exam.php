<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';
    protected $fillable = [
   'exam_date',
   'exam_room',
        'exam_time',
        'student_id',
     'offered_course_id',
    ];
    public function offered_course()
    {
        return $this->belongsTo(OfferedCourse::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
