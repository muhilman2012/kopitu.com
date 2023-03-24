<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product_purchase;
use App\Models\shipping;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;

class transactionAdmin extends Controller
{
    public function index()
    {
        return view('admin.pages.transaction.index');
    }

    public function detail($id)
    {
        $transaction = transaction::find($id);
        $user = User::find($transaction->users_id);
        $product = product_purchase::where('transaction_id', $id)->get();
        $shipping = shipping::where('transaction_id', $id)->first();
        return view('admin.pages.transaction.detail', [
            'transaction' => $transaction,
            'user' => $user,
            'product' => $product,
            'shipping' => $shipping,
        ]);
    }
}
