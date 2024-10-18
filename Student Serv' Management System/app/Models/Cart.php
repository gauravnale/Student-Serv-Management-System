<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function cartproduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function cartseller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    public function cartstudent()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
