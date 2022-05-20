<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'blood_type',
        'gender',
        'phone_number',
        'mobile_number',
        'personal_email',
        'martial_status',
        'mother_name',
        'city',
        'street',
        'building',
        'floor',
        'email',
        'major_id',
        'user_id',
    ];



    public function major()
    {
        return $this->belongsToMany(Major::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function studentregistration()
    {
        return $this->hasOne(StudentRegistration::class);
    }
}
