<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function studentuser()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function studentschool()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
