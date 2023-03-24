<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function checkout()
    {
        if (Auth::guard('user')->check()) {
            if (session('cart') or session('cartsablon')) {
                return view('pages.checkout.index');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
