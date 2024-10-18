<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
     
    protected $fillable = ['sender_id', 'receiver_id', 'last_time_message'];
    use HasFactory;
    protected $dates = ['last_time_message'];

    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
