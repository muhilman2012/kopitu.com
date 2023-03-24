<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\payment;
use App\Models\product_purchase;
use App\Models\shipping;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transactionUsers extends Controller
{
    public function index()
    {
        return view('user.transaction.index');
    }

    public function detail($id)
    {
        $purchases = transaction::find($id);
        $shipping = shipping::where('transaction_id', $id)->first();
        $product = product_purchase::where('transaction_id', $id)->get();
        $user = User::find($purchases->users_id);
        $payment = payment::where('id_transaction', $id)->first();

        return view('user.transaction.detail', [
            'purchases' => $purchases,
            'shipping' => $shipping,
            'product' => $product,
            'user' => $user,
            'payment' => $payment
        ]);
    }

    public function pending()
    {

        $users_id = auth('user')->user()->id_users;
        $data = DB::table('view_users_payment')->where('users_id', $users_id)->get();

        // $dataProduct = [];
        // $users_id = auth('user')->user()->id_users;
        // $data = transaction::whereIn('status', ['pending', 'sudah-bayar'])
        // ->where('users_id', $users_id)
        // ->paginate(12);
        // foreach ($data as $index => $items) {
        //     $product_data = product_purchase::where('transaction_id', $items->id_transaction)->get();
        //     $dataProduct += [$index => $product_data];
        // }
        return view('user.transaction.pending', [
            'data' => $data,
            // 'dataProduct' => $dataProduct
        ]);
    }
}
