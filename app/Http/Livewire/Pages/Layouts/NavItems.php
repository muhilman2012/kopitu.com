<?php

namespace App\Http\Livewire\Pages\Layouts;

use App\Models\category_child;
use App\Models\category_sub;
use Livewire\Component;

class NavItems extends Component
{
    public $post;
    public $ctg_sub = [];
    public $childData = [];

    public function mount($post)
    {
        if($this->post){
            $this->ctg_sub = category_sub::where('id_categories', $post)->get();
            foreach ($this->ctg_sub as $items) {
                $variable = category_child::where('id_categories_sub', $items->id_categories_sub)->get();
                $this->childData += [$items->id_categories_sub => $variable];
            }
        }
    }
    public function render()
    {
        return view('livewire.pages.layouts.nav-items');
    }
}
