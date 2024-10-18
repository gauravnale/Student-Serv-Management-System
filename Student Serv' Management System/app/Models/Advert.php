<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    public function cartseller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
}
