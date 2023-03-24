<?php

namespace App\Http\Livewire\Pages\Payment;

use App\Models\payment;
use App\Models\product_purchase;
use App\Models\shipping;
use App\Models\transaction;
use App\Models\User;
use Livewire\Component;

class IndexPayment extends Component
{

    public $snapToken;
    public $totalHarga, $weight;
    public $purchases = [];
    public $shipping = [];
    public $product = [];
    public $userTransaction = [];
    public $payment = [];


    protected $listeners = ['toPayment'];


    public function mount($id)
    {
        $this->purchases = transaction::find($id);
        $this->shipping = shipping::where('transaction_id', $id)->first();
        $this->product = product_purchase::where('transaction_id', $id)->get();
        $this->userTransaction = User::find($this->purchases['users_id']);
        $this->payment = payment::where('invoice', $this->purchases['invoice'])->first();
        if ($this->payment) {
            $order_id = $this->payment['transaction_id'];
            // dd($order_id);
            \Midtrans\Config::$serverKey = 'Mid-server-5rrS9vIQNgqbABFd2iFJ0fHT';
            // \Midtrans\Config::$serverKey = 'SB-Mid-server-d7OczDkuB_CidbbV3aiy3MXc';
            $status = \Midtrans\Transaction::status($order_id);
            // dd($status);
            // if($this->purchases->status != $status->transaction_status){
            //     $this->purchases['status'] = 'menunggu-konfirmasi';
            //     $this->purchases->save();
            // }
        }
    }

    public function buys()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-5rrS9vIQNgqbABFd2iFJ0fHT';
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-d7OczDkuB_CidbbV3aiy3MXc';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $this->purchases['invoice'],
                'gross_amount' => $this->purchases['price'],
            ),
            'customer_details' => array(
                'first_name' => $this->userTransaction['username'],
                // 'last_name' => 'pratama',
                'email' => $this->userTransaction['email'],
                'phone' => $this->shipping['username'],
            ),
        );

        $this->snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->dispatchBrowserEvent('showToken', ['token' => $this->snapToken]);
    }

    public function toPayment($post)
    {
        // dd($post);
        $dates = date('Y-m-d', strtotime($post['transaction_time']));
        $times = date('H:i:s', strtotime($post['transaction_time']));
        $deathline = date('Y-m-d', strtotime('+1 day', strtotime($post['transaction_time'])));
        $payment = payment::create([
            'payment_type' => $post['payment_type'],
            'gross_amount' => $post['gross_amount'],
            'bank' => $post['va_numbers'][0]['bank'],
            'va_number' => $post['va_numbers'][0]['va_number'],
            'date' => $dates,
            'time' => $times,
            'deathline' => $deathline,
            'invoice' => $post['order_id'],
            'transaction_id' => $post['transaction_id'],
        ]);

        $transaction = transaction::where('invoice', $post['order_id'])->first();
        $transaction->status = $post['transaction_status'];
        $transaction->token = $this->snapToken;
        $transaction->save();

        if ($payment) {
            session()->flash('success', 'Proses transaksi berhasil');
        } else {
            session()->flash('error', 'proses transaksi gagal');
        }
    }

    public function render()
    {
        return view('livewire.pages.payment.index-payment');
    }
}
