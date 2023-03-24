<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\product;
use Livewire\Component;

class ProductRamadhan extends Component
{
    public function render()
    {
        $dataRmd = product::where('product_name', 'like', '%' . 'hampers' . '%')
        ->orwhere('product_name', 'like', '%' . 'ramadhan' . '%')
        ->orwhere('product_name', 'like', '%' . 'biskuit' . '%')
        ->orwhere('product_name', 'like', '%' . 'sirup' . '%')
        ->orwhere('product_name', 'like', '%' . 'susu' . '%')
        ->orwhere('product_name', 'like', '%' . 'teh' . '%')
        ->limit(12)->get();
        return view('livewire.pages.product.product-ramadhan', [
            'dataRmd' => $dataRmd
        ]);
    }
}
