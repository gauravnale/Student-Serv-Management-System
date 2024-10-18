<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMember extends Model
{
    use HasFactory;
    public function clubmemberstudent(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function clubmemberclub(){
        return $this->belongsTo(Club::class, 'club_id');
    }
}
