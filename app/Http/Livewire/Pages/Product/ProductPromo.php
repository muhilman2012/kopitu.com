<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\product;
use Livewire\Component;

class ProductPromo extends Component
{
    
    public function render()
    {
        $data = product::limit(8)->get();
        return view('livewire.pages.product.product-promo',[
            'promo' => $data,
        ]);
    }
}
