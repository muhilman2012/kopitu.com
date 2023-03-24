<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\category;
use App\Models\category_child;
use App\Models\category_sub;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $categories_id;
    public $categories_sub_id;
    public $categories_child_id;
    public $ctg = [];
    public $sub_ctg = [];
    public $child_ctg = [];

    public $category_id;
    public $category_sub_id;

    public function mount($categories_id, $categories_sub_id)
    {   
        if($categories_id != null){
            $this->category_id = $categories_id;
            $this->category_sub_id = $categories_sub_id;
        }
    }
    public function render()
    {
        $this->ctg = category::all();
        if ($this->category_id) {
            $this->sub_ctg = category_sub::where('id_categories', $this->category_id)->get();
        }
        if ($this->category_sub_id) {
            $this->child_ctg = category_child::where('id_categories_sub', $this->category_sub_id)->get();
        }
        return view('livewire.admin.product.category-edit');
    }
}
