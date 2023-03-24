<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class requestProduct extends Controller
{
    // show pages
    public function index()
    {
        if(Auth::guard('user')->check()){
            return view('user.request.requestProduct');
        }else{
            return redirect()->route('login');
        }
    }

    public function data()
    {
        return view('pages.rfq');
    }
}
