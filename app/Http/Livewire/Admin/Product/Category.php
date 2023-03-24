<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\category as ModelsCategory;
use App\Models\category_child;
use App\Models\category_sub;
use Livewire\Component;

class Category extends Component
{
    public $categories_id;
    public $categories_sub_id;
    public $categories_child_id;
    public $ctg = [];
    public $sub_ctg = [];
    public $child_ctg = [];

    public $category_id;
    public $category_sub_id;
    public function render()
    {
        $this->ctg = ModelsCategory::all();
        if ($this->category_id) {
            $this->sub_ctg = category_sub::where('id_categories', $this->category_id)->get();
        }
        if ($this->category_sub_id) {
            $this->child_ctg = category_child::where('id_categories_sub', $this->category_sub_id)->get();
        }
        
        return view('livewire.admin.product.category');
    }
}
