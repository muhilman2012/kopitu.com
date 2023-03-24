<?php

namespace App\Http\Livewire\Pages\Cart;

use App\Models\product;
use Livewire\Component;

class IndexCart extends Component
{
    public $deleteCart;

    protected $listeners = ['goDeleteCart' => 'deleteCart'];

    public function plus($id)
    {
        $cart = session()->get('cart');

        $product = product::where('id_product', $id)->first();

        if ($cart[$id]['qty'] >= $product->stock) {
            session()->flash('error', 'Maaf, anda tidak dapat memesan produk melebihi stok!');
        } else {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }
    }

    public function minus($id)
    {
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (isset($cart[$id])) {
            // jika produk suda ada di cart maka qty hanya di tambahkan
            $cart[$id]['qty']--;
            if ($cart[$id]['qty'] === 0) {
                $cart[$id]['qty'] += 1;
                session()->put('cart', $cart);
            } else {
                session()->put('cart', $cart);
            }
        }
    }

    public function deleteCartConfrim($id)
    {
        $this->deleteCart = $id;

        $this->dispatchBrowserEvent('show-delete-Confrim');
    }

    public function deleteCart()
    {
        $idCart = $this->deleteCart;
        if (session('sablon') or session('cartsablon')) {
            return session()->flash('error', 'Maff, anda sedang dalam pemesanan sablon');
        }
        if (empty($idCart)) {
            return session()->flash('error', 'Maff, product not found');
        } else {
            $cart = session()->get('cart');

            unset($cart[$idCart]);
            //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
            session()->put('cart', $cart);
            //DAN STORE KE BROWSER.
            if (count(session('cart')) === 0) {
                return redirect()->route('cart');
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.cart.index-cart');
    }
}
