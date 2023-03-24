<?php

namespace App\Http\Livewire\Pages\Checkout;

use App\Models\cities;
use App\Models\product;
use App\Models\product_purchase;
use App\Models\provinces;
use App\Models\shipping;
use App\Models\transaction;
use App\Models\User;
use App\Models\users_address;
use App\Models\users_purchase;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Livewire\Component;

class IndexCheckout extends Component
{
    public $addressBooks;

    public $subtotal, $weight_product;

    public $jne, $tiki, $pos, $result = [];

    public $ongkir = [], $hargaOngkir, $grandTotal;

    public $snapToken;

    // for add address
    public $username, $label, $phone, $address, $districts, $postal_code;


    // for mounted
    public function mount()
    {
        // for add address
        $this->username = auth('user')->user()->username;
        $this->phone = auth('user')->user()->phone;

        foreach (session('cart') as $row) {
            $this->subtotal += $row['price'] * $row['qty'];
            $this->weight_product += $row['weight'] * $row['qty'];
        }
    }

    public function getOngkir($jenis)
    {
        // for id ongkir to create array
        $id_ongkir = 1;
        $user_id = auth('user')->user()->id_users;
        $address = users_address::where('users_id', $user_id)->where('active', 1)->first();

        $data = RajaOngkir::ongkosKirim([
            'origin'        => 152,
            'destination'   => $address->city_id,
            'weight'        => $this->weight_product,
            'courier'       => $jenis
        ])->get();

        foreach ($data[0]['costs'] as $row) {
            $this->result[] = array(
                'id_ongkir' => $id_ongkir++,
                'code' => 'jne',
                'service' => $row['service'],
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'estimasi' => $row['cost'][0]['etd'],
            );
        }

        // dd($this->result);
    }

    // for onkir chekout
    public function ongkir($id)
    {
        foreach ($this->result as $rs) {
            if ($rs['id_ongkir'] == $id) {
                $this->ongkir = [
                    'code' => $rs['code'],
                    'service' => $rs['service'],
                    'description' => $rs['description'],
                    'biaya' => $rs['biaya'],
                    'estimasi' => $rs['estimasi'],
                ];
            }
        }
        $this->emit('ongkirModalExpand');
    }

    public function resetOngkir()
    {
        $this->ongkir = null;
        $this->hargaOngkir = null;
        $this->grandTotal = null;
        $this->result = null;
    }


    public function process()
    {
        date_default_timezone_set("Asia/Bangkok");

        if ($this->ongkir == null or $this->ongkir == 0) {
            session()->flash('error', 'Ongkos kirim belum dipilih!');
        } else {
            $user_id = auth('user')->user()->id_users;
            $tanggal = date('Y-m-d');
            $waktu = date("H:i:s");

            // $transaction = transaction::max('id_transaction');
            // $order = intval($transaction);
            $invoice = 'INV/' . date('Ymd', strtotime($tanggal)) . '/KOP/';
            if (session('cart')) {
                $purchase = transaction::create([
                    'invoice' => $invoice,
                    'type' => 'pemesanan-product',
                    'price' => $this->grandTotal,
                    'status' => 'pending',
                    'users_id' => $user_id,
                    'date' => $tanggal,
                    'time' => $waktu,
                ]);

                $purchase->invoice = $invoice . $purchase->id_transaction;
                $purchase->save();

                foreach (session('cart') as $data) {
                    $product_id = $data['id_product'];
                    $jumlah = $data['qty'];
                    product_purchase::create([
                        'product_name' => $data['product_name'],
                        'slug' => $data['slug'],
                        'category' => $data['category'],
                        'weight' => $data['weight'] * $data['qty'],
                        'price' => $data['price'],
                        'qty' => $data['qty'],
                        'total_price' => $data['price'] * $data['qty'],
                        'date' => $data['date'],
                        'images' => $data['images'],
                        'description' => $data['description'],
                        'transaction_id' => $purchase->id_transaction,
                        'product_id' => $product_id,
                    ]);
                    // update stok dan terjual produk pada table produk
                    $pr = product::find($product_id);
                    $jumlah_brang_dibeli = $pr->stock - $jumlah;
                    $soldout = $pr->soldout + $jumlah;
                    product::where('id_product', $product_id)->update([
                        'stock' => $jumlah_brang_dibeli,
                        'sold' => $soldout
                    ]);
                }
            }

            $address_book = users_address::where('users_id', $user_id)->where('active', 1)->first();
            $province = provinces::where('province_id', $address_book->province_id)->first();
            $city = cities::where('city_id', $address_book->city_id)->first();
            // memasukan data pengiriman
            shipping::create([
                'username' => $address_book->username,
                'phone' => $address_book->phone,
                'province' => $province->province,
                'city' => $city->city_name,
                'address' => $address_book->address,
                'postal_code' => $address_book->postal_code,
                'expedition' => $this->ongkir['code'],
                'service' => $this->ongkir['service'],
                'price' => $this->ongkir['biaya'],
                'estimation' => $this->ongkir['estimasi'],
                'transaction_id' => $purchase->id_transaction
            ]);
            // menghapus session cart
            if (session('cart')) {
                session()->forget('cart');
            } elseif (session('cartsablon')) {
                session()->forget('sablon');
                session()->forget('cartsablon');
            }

            // give redirect to nota
            return redirect()->route('payment', ['id' => $purchase->id_transaction]);
        }
    }


    public function render()
    {
        $subtotal = 0;
        foreach (session('cart') as $row) {
            $subtotal += $row['price'] * $row['qty'];
        }

        if ($this->ongkir != null) {
            $this->hargaOngkir = $this->ongkir['biaya'];
            $this->grandTotal = $subtotal + $this->ongkir['biaya'];
        }

        $user_id = auth('user')->user()->id_users;
        $this->addressBooks = DB::table('view_users_address')->where('users_id', $user_id)->where('active', 1)->get();

        // dd($this->addressBooks);
        return view('livewire.pages.checkout.index-checkout');
    }
}
