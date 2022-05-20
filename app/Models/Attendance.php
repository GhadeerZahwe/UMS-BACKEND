<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $fillable = [
        'attendance_day',
        'attendance_status',
        'studentregistration_id',
    ];
    public function studentregistration()
    {
        return $this->belongsTo(StudentRegistration::class);
    }
}
