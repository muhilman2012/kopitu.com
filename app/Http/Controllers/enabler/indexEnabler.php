<?php

namespace App\Http\Controllers\enabler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexEnabler extends Controller
{
    public function index()
    {
        return view('enabler.index');
    }
}
