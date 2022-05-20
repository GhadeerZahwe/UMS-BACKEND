<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
     'course_name',
     'course_credit',
     'course_description',
     'course_code',
     'faculty_id',
    ];
        public function faculty()
        {
            return $this->belongsToMany(Faculty::class);
        }
        public function offered_course()
        {
            return $this->hasMany(OfferedCourse::class);
        }
        public function corequisitecourse()
        {
            return $this->hasMany(CorequisiteCourse::class);
        }
        public function prerequisitecourse()
        {
            return $this->hasMany(PrerequisiteCourse::class);
        }
        public function curriculum()
        {
            return $this->hasMany(Curriculum::class);
        }
    }
