<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\product;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductNew extends Component
{
    use WithPagination;

    public $wishlist = [];


    public function render()
    {
        $newproduct = product::orderByDesc('date')->limit(12)->get();
        if (Auth::guard('user')->check()) {
            $users_id = auth('user')->user()->id_users;
            $wish = wishlist::where('users_id', $users_id)->get();
            foreach ($wish as $item) {
                array_push($this->wishlist, $item->product_id);
                // $this->wishlist + [$item->product_id];
            }
        }
        // dd($this->wishlist);
        // dd(in_array(1, $this->wishlist));
        return view('livewire.pages.product.product-new', [
            'newproduct' => $newproduct
        ]);
    }
}
