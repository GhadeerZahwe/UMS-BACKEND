<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = 'curriculum';
    protected $fillable = [
    'course_type',
    'major_id',
    'course_id',
];
    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    Public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
