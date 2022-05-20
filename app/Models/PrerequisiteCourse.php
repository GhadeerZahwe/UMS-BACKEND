<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrerequisiteCourse extends Model
{
    use HasFactory;
    protected $table = 'prerequisitecourse';
    protected $fillable = [
        'course_id',
    ];
    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
