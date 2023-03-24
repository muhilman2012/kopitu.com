<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduct extends Component
{
    use WithPagination;

    public $search = '';

    public $pages = 12;
    public $sort = 'asc';

    public $post;

    public function page($pages)
    {
        if ($pages === 1) {
            $this->pages = 999999999;
        } else {
            $this->pages = $pages;
        }
    }
    public function sort()
    {
        if ($this->sort === 'asc') {
            $this->sort = 'desc';
        } else {
            $this->sort = 'asc';
        }
    }
    
    public function render()
    {
        // dd($this->post);
        if ($this->post) {
            $data = DB::table('view_product_categories')->where('categories', $this->post)
            ->orwhere('categories_sub', $this->post)
            ->orwhere('categories_child', $this->post)
            ->where('product_name', 'like', '%' . $this->search . '%')
            ->orderBy('product_name', $this->sort)
            ->paginate($this->pages);
        } else {
            $data = product::where('product_name', 'like', '%' . $this->search . '%')
                ->orderBy('product_name', $this->sort)
                ->paginate($this->pages);
        }
        return view('livewire.pages.product.index-product', [
            'product' => $data
        ]);
    }
}
