<?php

namespace App\Http\Livewire\Pages\Order;

use App\Models\product;
use App\Models\product_category;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductOrder extends Component
{
    public $qty = 1;

    public $catatan;
    public $post;

    public $wishlist = false;

    public function mount()
    {
        if (Auth::guard('user')->check()) {
            $users_id = auth('user')->user()->id_users;
            $wishlist = DB::table('view_users_wishlist')
                ->where('id_product', $this->post)
                ->where('users_id', $users_id)
                ->first();
            if ($wishlist != null) {
                $this->wishlist = true;
            } else {
                $this->wishlist = false;
            }
        }
    }

    public function tambah()
    {
        $this->qty++;
    }

    public function kurang()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function order()
    {
        $idproduct = $this->post;

        $produk = product::find($idproduct);

        if (!$produk or empty($produk)) {
            abort(404);
        }

        // cek stok produk
        if ($produk->stock <= 0) {
            session()->flash('error', 'Maaf, produk tidak dapat dipesan stok kosong!');
        } elseif ($this->qty > $produk->stock) {
            session()->flash('error', 'Maaf, anda tidak dapat memesan produk melebihi stok!');
        } else {
            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if (isset($cart[$idproduct])) {
                // jika produk suda ada di cart maka qty hanya di tambahkan
                $cart[$idproduct]['qty'] += $this->qty;
                session()->put('cart', $cart);
                return redirect()->to('/pemesanan/keranjang-belanja');
            } else {
                $p = product::find($idproduct);
                $ctg = product_category::where('product_id', $idproduct)->first();
                if ($ctg != null) {
                    $cart[$idproduct] = [
                        'qty'           => $this->qty,
                        'id_product'    => $p->id_product,
                        'product_name'  => $p->product_name,
                        'slug'          => $p->slug,
                        'category'      => $ctg->categories,
                        'category_sub'  => $ctg->categories_sub,
                        'category_child' => $ctg->categories_child,
                        'weight'        => $p->weight,
                        'price'         => $p->price,
                        'stock'         => $p->stock,
                        'date'          => $p->date,
                        'images'        => $p->images,
                        'description'   => $p->description,
                    ];
                } else {
                    $cart[$idproduct] = [
                        'qty'           => $this->qty,
                        'id_product'    => $p->id_product,
                        'product_name'  => $p->product_name,
                        'slug'          => $p->slug,
                        'category'      => "",
                        'category_sub'  => "",
                        'category_child' => "",
                        'weight'        => $p->weight,
                        'price'         => $p->price,
                        'stock'         => $p->stock,
                        'date'          => $p->date,
                        'images'        => $p->images,
                        'description'   => $p->description,
                    ];
                }
                session()->put('cart', $cart);
                return redirect()->route('cart');
            }
        }
    }

    public function wishlist()
    {
        if (Auth::guard('user')->check()) {
            $users_id = auth('user')->user()->id_users;
            $checked = wishlist::where('users_id', $users_id)->where('product_id', $this->post)->first();
            if ($checked == null) {
                wishlist::create([
                    'product_id' => $this->post,
                    'users_id' => $users_id
                ]);
                $this->wishlist = true;
                $this->dispatchBrowserEvent('showPopup');
                session()->flash('popup', 'Produk telah masuk ke wishlist');
            } else {
                $checked->delete();
                $this->wishlist = false;
                session()->flash('popup', 'Produk dihapus dari wishlist');
                $this->dispatchBrowserEvent('showPopup');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.pages.order.product-order');
    }
}
