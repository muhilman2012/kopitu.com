<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\category_child;
use App\Models\category_sub;
use App\Models\cities;
use App\Models\product;
use App\Models\product_category;
use App\Models\product_locations;
use App\Models\productCategory;
use App\Models\productImages;
use App\Models\provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class productAdmin extends Controller
{

    public $category_id;
    public $sub_ctg = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctg = category::all();
        if ($this->category_id) {
            $this->sub_ctg = category_sub::where('id_categories', $this->category_id)->get();
        }

        return view('admin.pages.product.create', [
            'ctg' => $ctg
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // make validators fileds
        $validator = Validator::make($request->all(), [
            'product_name'      => 'required|max:250',
            'category'          => 'required',
            'category_sub'      => 'required',
            'category_child'    => 'required',
            'stock'             => 'required',
            'weight'            => 'required',
            'price'             => 'required',
            'province_id'       => 'required',
            'city_id'           => 'required',
            'description'       => 'required',
            'images'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'imagesMultiple.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'product_name.required' => 'Please input field product name',
            'product_name.max'      => 'Product name is longer must lessthan 250 character',
            'category.required'     => 'Please chose the category',
            'category_sub.required' => 'Please chose the sub category',
            'category_child.required' => 'Please chose the child category',
            'stock.required'        => 'Please input stock product',
            'weight.required'       => 'Please input weight product',
            'price.required'        => 'Please input price product',
            'description.required'  => 'Please input the description',
            'province_id.required'  => 'Please select your product province',
            'city_id.required'      => 'Please select your product city',
            'images.required'       => 'Please upload images',
            'images.image'          => 'File is not images',
            'images.mimes'          => 'File must be images',
            'images.max'            => 'File images oversized',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // this category product
            $category = category::find($request->category);
            $category_sub = category_sub::find($request->category_sub);
            $category_child = category_child::find($request->category_child);

            // this for product location
            $province = provinces::where('province_id', $request->province_id)->first();
            $city = cities::where('province_id', $request->province_id)->where('city_id', $request->city_id)->first();

            // slug to title product
            $slug = Str::slug($request->product_name);
            // date now to product
            $dateNow = date("Y/m/d");
            // images 
            $resorce = $request->images;
            $originNamaImages = $resorce->getClientOriginalName();
            $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
            $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();

            try {
                // save data product
                $product = product::create([
                    'product_name'  => $request->product_name,
                    'slug'          => $slug,
                    'stock'         => $request->stock,
                    'weight'        => $request->weight,
                    'price'         => $request->price,
                    'description'   => $request->description,
                    'date'          => $dateNow,
                    'images'        => $namasamplefoto,
                ]);

                product_category::create([
                    'categories'      => $category->slug,
                    'categories_sub'  => $category_sub->slug_sub,
                    'categories_child' => $category_child->slug_child,
                    'categories_id' => $request->category,
                    'categories_sub_id' => $request->category_sub,
                    'categories_child_id' => $request->category_child,
                    'product_id' => $product->id_product,
                ]);

                product_locations::create([
                    'province'  => $province->province,
                    'city'      => $city->city_name,
                    'province_id'  => $province->province_id,
                    'city_id'  => $city->city_id,
                    'product_id' => $product->id_product,
                ]);

                $resorce->move(public_path() . "/images/product/", $namasamplefoto);
                return redirect()->route('admin.product.images', ['id' => $product->id_product]);
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Oops sorry database is busy!');
                // return Response()->json([
                //     "success" => false,
                //     "file" => $request->all(),
                //     "message" => 'Somthing worng with data'
                // ]);
            }
        }
    }

    public function show($id)
    {
        $data = product::where('id_product', $id)->first();
        $images = productImages::where('id_product', $id)->get();
        return view('admin.pages.product.edit', [
            'data' => $data,
            'images' => $images
        ]);
    }

    public function edit($id)
    {
        $data = product::where('id_product', $id)->first();
        $images = productImages::where('id_product', $id)->get();
        $category = product_category::where('product_id', $id)->first();
        $locations = product_locations::where('product_id', $id)->first();

        return view('admin.pages.product.edit', [
            'data' => $data,
            'images' => $images,
            'category' => $category,
            'locations' => $locations
        ]);
    }

    public function update(Request $request, $id)
    {
        // make validators fileds
        $validator = Validator::make($request->all(), [
            'product_name'      => 'required|max:250',
            'category'          => 'required',
            'category_sub'      => 'required',
            'category_child'    => 'required',
            'stock'             => 'required',
            'weight'            => 'required',
            'price'            => 'required',
            'description'       => 'required',
            'province_id'       => 'required',
            'city_id'           => 'required',
            // 'imagesMultiple.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'product_name.required' => 'Please input field product name',
            'product_name.max'      => 'Product name is longer must lessthan 250 character',
            'category.required'     => 'Please chose the category',
            'category_sub.required' => 'Please chose the sub category',
            'category_child.required' => 'Please chose the child category',
            'stock.required'        => 'Please input stock product',
            'weight.required'       => 'Please input weight product',
            'price.required'       => 'Please input price product',
            'description.required'  => 'Please input the description',
            'province_id.required'  => 'Please select your product province',
            'city_id.required'      => 'Please select your product city',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // this category product
            $category = category::find($request->category);
            $category_sub = category_sub::find($request->category_sub);
            $category_child = category_child::find($request->category_child);

            // this for product location
            $province = provinces::where('province_id', $request->province_id)->first();
            $city = cities::where('province_id', $request->province_id)->where('city_id', $request->city_id)->first();


            // slug to title product
            $slug = Str::slug($request->product_name);
            if ($request->images) {
                $validImages = Validator::make($request->all(), [
                    'images'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    // 'imagesMultiple.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ], [
                    'images.image'  => 'File is not images',
                    'images.mimes'  => 'File must be images',
                    'images.max'    => 'File images oversized',
                ]);
                if ($validImages->fails()) {
                    return redirect()->back()->withErrors($validImages)->withInput();
                } else {
                    // images 
                    $resorce = $request->images;
                    $originNamaImages = $resorce->getClientOriginalName();
                    $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
                    $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();
                    try {
                        // save data product
                        product::where('id_product', $id)->update([
                            'product_name'  => $request->product_name,
                            'slug'          => $slug,
                            'stock'         => $request->stock,
                            'weight'        => $request->weight,
                            'price'         => $request->price,
                            'description'   => $request->description,
                            'images'        => $namasamplefoto,
                        ]);
                        $ctg = product_category::where('product_id', $id)->first();
                        if ($ctg == null) {
                            product_category::create([
                                'categories'          => $category->slug,
                                'categories_sub'      => $category_sub->slug_sub,
                                'categories_child'    => $category_child->slug_child,
                                'categories_id'       => $request->category,
                                'categories_sub_id'   => $request->category_sub,
                                'categories_child_id' => $request->category_child,
                                'product_id'          => $id,
                            ]);
                        } else {
                            product_category::where('product_id', $id)->update([
                                'categories'          => $category->slug,
                                'categories_sub'      => $category_sub->slug_sub,
                                'categories_child'    => $category_child->slug_child,
                                'categories_id'       => $request->category,
                                'categories_sub_id'   => $request->category_sub,
                                'categories_child_id' => $request->category_child,
                                'product_id'          => $id,
                            ]);
                        }

                        $loc = product_locations::where('product_id', $id)->first();
                        if ($loc == null) {
                            product_locations::create([
                                'province'      => $province->province,
                                'city'          => $city->city_name,
                                'province_id'   => $province->province_id,
                                'city_id'       => $city->city_id,
                                'product_id'    => $id,
                            ]);
                        } else {
                            product_locations::where('product_id', $id)->update([
                                'province'      => $province->province,
                                'city'          => $city->city_name,
                                'province_id'   => $province->province_id,
                                'city_id'       => $city->city_id,
                                'product_id'    => $id,
                            ]);
                        }
                        $resorce->move(public_path() . "/images/product/", $namasamplefoto);
                        return redirect()->back()->with('success', 'Data has been updated');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error', 'Oops sorry database is busy!');
                    }
                }
            } else {
                try {
                    // save data product
                    product::where('id_product', $id)->update([
                        'product_name'  => $request->product_name,
                        'slug'          => $slug,
                        'stock'         => $request->stock,
                        'weight'        => $request->weight,
                        'price'         => $request->price,
                        'description'   => $request->description,
                    ]);

                    $ctg = product_category::where('product_id', $id)->first();
                    if ($ctg == null) {
                        product_category::create([
                            'categories'          => $category->slug,
                            'categories_sub'      => $category_sub->slug_sub,
                            'categories_child'    => $category_child->slug_child,
                            'categories_id'       => $request->category,
                            'categories_sub_id'   => $request->category_sub,
                            'categories_child_id' => $request->category_child,
                            'product_id'          => $id,
                        ]);
                    } else {
                        product_category::where('product_id', $id)->update([
                            'categories'          => $category->slug,
                            'categories_sub'      => $category_sub->slug_sub,
                            'categories_child'    => $category_child->slug_child,
                            'categories_id'       => $request->category,
                            'categories_sub_id'   => $request->category_sub,
                            'categories_child_id' => $request->category_child,
                            'product_id'          => $id,
                        ]);
                    }

                    $loc = product_locations::where('product_id', $id)->first();
                    if ($loc == null) {
                        product_locations::create([
                            'province'      => $province->province,
                            'city'          => $city->city_name,
                            'province_id'   => $province->province_id,
                            'city_id'       => $city->city_id,
                            'product_id'    => $id,
                        ]);
                    } else {
                        product_locations::where('product_id', $id)->update([
                            'province'      => $province->province,
                            'city'          => $city->city_name,
                            'province_id'   => $province->province_id,
                            'city_id'       => $city->city_id,
                            'product_id'    => $id,
                        ]);
                    }

                    return redirect()->back()->with('success', 'Data has been updated');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error', 'Oops sorry database is busy!');
                }
            }
        }
    }


    // category product pages
    public function category()
    {
        return view('admin.pages.product.category');
    }

    // function for images product
    public function images($id)
    {

        $data = product::find($id);
        $images = productImages::where('id_product', $id)->get();
        return view('admin.pages.product.images', [
            'data' => $data,
            'images' => $images
        ]);
    }
    public function storeImages(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'images.*'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'images.*.required' => 'Setidaknya masukan gambar!',
            'images.*.image' => 'Oops file must be images!',
            'images.*.mimes' => 'Images format must be images!',
            'images.*.max' => 'Oops images oversize!',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Oops error in images files');
        } else {
            try {
                foreach ($request->file('images') as $image) {
                    // membuat random key
                    $originNamaImages = $image->getClientOriginalName();
                    $namaImages = pathinfo($originNamaImages, PATHINFO_FILENAME);
                    $sizeImages = $image->getSize();
                    $md =  'IMG-' . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
                    // get file extension and rename file with extension
                    $newNameImagesMultiple = $md . '.' . $image->getClientOriginalExtension();
                    productImages::create([
                        'images_name' => $originNamaImages,
                        'size' => $sizeImages,
                        'locations' => $newNameImagesMultiple,
                        'id_product' => $id
                    ]);
                    $image->move(public_path() . '/images/product/multiple/', $newNameImagesMultiple);
                }
                return redirect()->back()->with('success', 'Product data is saved!');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Sorry database is bussy, try again leter!');;
            }
        }
    }
    public function deleteImages($id)
    {
        // dd($id);
        $data = productImages::find($id);
        if ($data) {
            try {
                // unlink(public_path() . '/images/product/multiple/' . $data->locations);
                $data->delete();
                return redirect()->back()->with('success', 'Images product is delete');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Oops sorry database is very busy!');
            }
        } else {
            return redirect()->back()->with('error', 'Sorry product is not found');
        }
    }
}
