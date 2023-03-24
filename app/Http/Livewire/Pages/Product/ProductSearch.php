<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
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
        if ($this->post) {
            $data = product::where('product_name', 'like', '%' . $this->post . '%')
                ->orderBy('product_name', $this->sort)
                ->paginate($this->pages);
        } else {
            $data = product::paginate($this->pages);
        }
        return view('livewire.pages.product.product-search', [
            'product' => $data
        ]);
    }
}
