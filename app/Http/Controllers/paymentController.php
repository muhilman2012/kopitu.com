<?php

namespace App\Http\Controllers;

use App\Models\product_purchase;
use App\Models\shipping;
use App\Models\transaction;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    //

    public function index($id)
    {
        return view('pages.payment.index', [
            'id' => $id
        ]);
    }
}
