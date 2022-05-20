<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructor';
    protected $fillable = [
        'instructor_name',
        'faculty_id'
    ];


    public function faculty()
    {
        return $this->belongsToMany(Faculty::class);
    }

    public function offered_courses()
    {
        return $this->hasMany(OfferedCourse::class);
    }

}
