<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\product_locations;
use App\Models\productImages;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function product(){
        $ctg = category::all();
        return view('pages.home.product', [
            'ctg' => $ctg
        ]);
    }

    public function productCtg($ctg){
        $category = category::all();
        return view('pages.home.product', [
            'tag' => $ctg,
            'ctg' => $category,
        ]);
    }

    public function search(Request $request){
        $src = $request->src;
        $category = category::all();
        return view('pages.home.product', [
            'src' => $src,
            'ctg' => $category,
        ]);
    }

    public function detail($slug){
        $product = product::where('slug', $slug)->first();
        $images = productImages::where('id_product', $product->id_product)->get();
        $locations = product_locations::where('product_id', $product->id_product)->first();
        return view('pages.home.productDetail', [
            'product' => $product,
            'images' => $images,
            'locations' => $locations
        ]);
    }
}
