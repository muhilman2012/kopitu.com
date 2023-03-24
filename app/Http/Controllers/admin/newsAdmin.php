<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class newsAdmin extends Controller
{
    public function index()
    {
        return view('admin.pages.news.index');
    }

    public function create()
    {
        return view('admin.pages.news.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'description'  => 'required',
            'content'      => 'required',
            'images'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'imagesMultiple.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required'        => 'Please input field title news',
            'description.required'  => 'Please input field description news',
            'content.required'      => 'Please input field content news',
            'images.required'       => 'Please upload images',
            'images.image'          => 'File is not images',
            'images.mimes'          => 'File must be images',
            'images.max'            => 'File images oversized',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // slug from title
            $slug = Str::slug($request->title);
            // images 
            $resorce = $request->images;
            $originNamaImages = $resorce->getClientOriginalName();
            $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
            $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();

            $data = new news();
            $data->title = $request->title;
            $data->slug = $slug;
            $data->content = $request->content;
            $data->description = $request->description;
            $data->images = $namasamplefoto;
            $resorce->move(public_path() . "/images/news/", $namasamplefoto);
            if ($data->save()) {
                return redirect()->route('admin.news')->with('success', 'news data saved successfully');
            } else {
                return redirect()->back()->with('error', 'sorry database is busy try again letter');
            }
        }
    }

    // public function show($id)
    // {
    //     $data= news::find($id);
    //     return view('admin.pages.news.edit', [
    //         'data' => $data
    //     ]);
    // }

    public function edit($id)
    {
        $data = news::find($id);
        return view('admin.pages.news.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'description'  => 'required',
            'content'      => 'required',
            // 'imagesMultiple.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required'        => 'Please input field title news',
            'description.required'  => 'Please input field description news',
            'content.required'      => 'Please input field content news',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // slug from title
            $slug = Str::slug($request->title);

            if ($request->images) {
                $validImages = Validator::make($request->all(), [
                    'images'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:4512',
                ], [
                    'images.image'          => 'File is not images',
                    'images.mimes'          => 'File must be images',
                    'images.max'            => 'File images oversized',
                ]);
                if ($validImages->fails()) {
                    return redirect()->back()->withErrors($validImages)->withInput();
                } else {
                    // images 
                    $resorce = $request->images;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
                    $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();
                    // update with images
                    $data = news::find($id);
                    $data->title = $request->title;
                    $data->slug = $slug;
                    $data->content = $request->content;
                    $data->description = $request->description;
                    $data->images = $namasamplefoto;
                    $resorce->move(public_path() . "/images/news/", $namasamplefoto);
                    if ($data->save()) {
                        return redirect()->route('admin.news')->with('success', 'news data saved successfully');
                    } else {
                        return redirect()->back()->with('error', 'sorry database is busy try again letter');
                    }
                }
            } else {
                // update no images
                $data = news::find($id);
                $data->title = $request->title;
                $data->slug = $slug;
                $data->content = $request->content;
                $data->description = $request->description;
                if ($data->save()) {
                    return redirect()->route('admin.news')->with('success', 'news data saved successfully');
                } else {
                    return redirect()->back()->with('error', 'sorry database is busy try again letter');
                }
            }
        }
    }

    public function destroy($id)
    {
        //
    }

    public function editor()
    {
        // 
    }
}
