<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class wishlistUser extends Controller
{
    public function index()
    {
        $id = auth('user')->user()->id_users;
        $data = DB::table('view_users_wishlist')->where('users_id', $id)->get();
        return view('user.wishlist', [
            'data' => $data
        ]);
    }
}
