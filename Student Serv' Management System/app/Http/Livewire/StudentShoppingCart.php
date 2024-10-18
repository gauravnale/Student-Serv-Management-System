<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class StudentShoppingCart extends Component
{
    public $product_name;
    public function render()
    {
        $products = Product::where('quantity', '>', 1)->get();
        return view('livewire.student-shopping-cart', compact('products'));
    }
    public function addproduct()
    {
        $this->validate([
            'product_name' =>'required'
        ]);
        dd("contined");
    }
}
