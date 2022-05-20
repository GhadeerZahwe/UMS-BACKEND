<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'major';
    protected $fillable = [
        'major_name',
        'faculty_id',
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function curriculum()
    {
        return $this->hasMany(Curriculum::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }

}
