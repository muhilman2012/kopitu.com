<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function news()
    {
        return view('pages.news.index');
    }

    public function detail($slug, $id)
    {
        $data = news::find($id);
        return view('pages.news.detail', [
            'data' => $data
        ]);
    }
}
