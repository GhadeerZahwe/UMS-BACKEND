<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorequisiteCourse extends Model
{
    use HasFactory;
    protected $table = 'corequisitecourse';
    protected $fillable = [
        'course_id',
    ];
    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
