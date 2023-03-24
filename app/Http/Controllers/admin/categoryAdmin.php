<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\productCategory;
use Illuminate\Http\Request;

class categoryAdmin extends Controller
{
    // show categori
    public function index()
    {
        return view('admin.pages.category.index');
    }
    
    public function sub($id)
    {
        $category = category::find($id);
        return view('admin.pages.category.sub', [
            'category' => $category
        ]);
    }
}
