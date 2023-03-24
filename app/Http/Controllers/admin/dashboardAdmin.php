<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\payment;
use App\Models\product;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardAdmin extends Controller
{
    // show dashboard pages
    public function index()
    {
        $lang = auth('admin')->user()->country;
        $product = product::count();
        $user = User::count();
        $transaction = transaction::count();
        $soldOut = product::sum('sold');
        $income = DB::table('view_users_payment')->where('status', 'selesai')->sum('gross_amount');
        $pendingIncome = DB::table('view_users_payment')->where('status', '!=', 'selesai')->sum('gross_amount');
        // dd($pendingIncome);
        return view('admin.pages.dashboard', [
            'product' => $product,
            'user' => $user,
            'transaction' => $transaction,
            'soldOut' => $soldOut,
            'income' => $income,
            'pendingIncome' => $pendingIncome,
        ]);
    }
}
