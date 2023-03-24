@extends('admin.layouts.panel')

@section('head')
<title>KOPITU E-Store - Halaman Edit Produk</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ url('/dist/assets/css/admin/product.css') }}">
@endsection

@section('pages')
<div class="container-fluid">
    <div class="d-block rounded bg-white shadow p-3 mb-3">
        <h2>Edit Produk</h2>
    </div>
    <form action="{{ route('admin.product.update', ['id' => $data->id_product]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <div class="mb-3">
                <label for="#" class="form-label">Nama Produk</label>
                <input name="product_name" type="text" class="form-control  @error('product_name') is-invalid @enderror"
                    value="{{ $data->product_name }}">
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok Produk</label>
                        <div class="input-group">
                            <button class="input-group-text" type="button" id="minus"><i
                                    class="fas fa-minus fa-fw"></i></button>
                            <input name="stock" type="text" id="stock"
                                class="form-control text-center  @error('stock') is-invalid @enderror"
                                value="{{ $data->stock }}">
                            <button class="input-group-text" type="button" id="plus"><i
                                    class="fas fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat Produk</label>
                        <div class="input-group">
                            <input name="weight" type="text" id="weight"
                                class="form-control  @error('weight') is-invalid @enderror" value="{{ $data->weight }}">
                            <span class="input-group-text">Gr</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Produk</label>
                        <input name="price" type="text" id="price"
                            class="form-control  @error('price') is-invalid @enderror" value="{{ $data->price }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    @if($category == null)
                    @livewire('admin.product.category')
                    @else
                    @livewire('admin.product.category-edit', [
                    'categories_id' => $category->categories_id,
                    'categories_sub_id' => $category->categories_sub_id,
                    ])
                    @endif
                </div>
            </div>
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            @if ($locations == null)
            @livewire('admin.product.locations',[
                'province_id' => null,
                'city_id' => null,
                ])
            @else    
            @livewire('admin.product.locations', [
                'province_id' => $locations->province_id,
                'city_id' => $locations->city_id,
                ])
            @endif
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <div class="mb-3">
                <label for="editor" class="form-label">Deskripsi Produk</label>
                <textarea name="description" id="editor"
                    class="form-control @error('description') is-invalid @enderror">{{ $data->description }}</textarea>
            </div>
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <label class="form-label">Upload Gambar Produk</label>
            <label for="imagesInput" class="box-images @error('images') is-invalid @enderror">
                <img src="{{ url('/images/product/'. $data->images) }}" alt="" id="displayGambar" width="50%">
            </label>
            <input type="file" name="images" id="imagesInput" onchange="optImages(this)" class="d-none">
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <button type="submit" class="btn btn-primary btn-lg form-control mt-4" type="button" id="btn-bukti">
                UPDATE DATA
            </button>
        </div>

    </form>


    <div class="d-block bg-white rounded shadow p-3">
        <form class="bg-success-secondary d-flex justify-content-between p-3"
            action="{{ route('admin.product.images.store', ['id' => $data->id_product]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <span class="fw-bold">Tambahkan Image</span>
            <label for="newImages" class="btn btn-success p-1">
                <i class="fas fa-plus fa-fw"></i>
            </label>
            <input type="file" name="images[]" class="d-none gallery-photo-add" multiple id="newImages"
                onchange="uploadMultipleImg()">
            <input type="submit" id="prosesuploadfoto" class="d-none">
        </form>
        <div class="row g-0 gallery-product">
            @foreach($images as $img)
            <div class="col-6 col-md-4 col-lg-3 p-2" id="data-image">
                <img src="{{ url('/images/product/multiple/'. $img->locations) }}" alt="product" class="image-fields">
                <button class="removeImages btn-image-fields btn" type="button" key="{{ $img->id_product_images }}">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{ url('/dist/ckeditor5/ckeditor.js') }}"></script>
<script src="{{ url('/dist/assets/js/admin/product.js') }}"></script>
@endsection