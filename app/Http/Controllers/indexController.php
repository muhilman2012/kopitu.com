<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function indexed()
    {
        return view('index');
    }

    public function index(){
        return view('pages.index');
    }

    public function aboutme()
    {
        return view('pages.aboutme');
    }

    public function policy()
    {
        return view('pages.privacy-policy');
    }

    public function trems()
    {
        return view('pages.tremsConditions');
    }

    public function infoProduct()
    {
        return view('pages.infoRegistProduct');
    }

    public function fulfillment()
    {
        return view('pages.fulfillment');
    }

    public function enambler()
    {
        return view('pages.enabler');
    }

    public function market()
    {
        return view('pages.captive-market');
    }

    public function productService()
    {
        return view('pages.service.product');
    }

}
