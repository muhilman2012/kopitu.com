<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    // show user dashabord
    public function index()
    {
        return view('user.index', [
            'page' => 'profile'
        ]);
    }

    public function logout()
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('index');
        }
    }
}
