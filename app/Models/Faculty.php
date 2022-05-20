<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    protected $fillable = [
        'faculty_name',
        'faculty_code',
    ];

    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function major()
    {
        return $this->hasMany(Major::class);
    }
}
