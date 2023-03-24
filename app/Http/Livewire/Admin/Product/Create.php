<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\category;
use App\Models\category_sub;
use App\Models\product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
