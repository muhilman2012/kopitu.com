<?php

namespace App\Http\Livewire\User\Transaction;

use App\Models\product_purchase;
use App\Models\transaction;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTransaction extends Component
{
    use WithPagination;
    public $nav = 'all';
    public $dataProduct = [];

    public function sort($sr)
    {   
        $this->nav = $sr;
    }

    public function render()
    {
        $users_id = auth('user')->user()->id_users;
        if($this->nav == 'progress'){
            $this->dataProduct = [];
            $data = transaction::whereIn('status', ['menunggu-konfirmasi', 'diproses', 'dikirim', 'selesai' ])
            ->where('users_id', $users_id)
            ->paginate(12);
        } else {
            $this->dataProduct = [];
            $data = transaction::whereIn('status', ['menunggu-konfirmasi', 'diproses', 'dikirim', 'selesai' ])
            ->where('users_id', $users_id)
            ->paginate(12);
        }
        foreach($data as $index => $items){
            $product_data = product_purchase::where('transaction_id', $items->id_transaction)->get();
            $this->dataProduct += [$index => $product_data];
        }
        return view('livewire.user.transaction.index-transaction', [
            'data' => $data
        ]);
    }
}
