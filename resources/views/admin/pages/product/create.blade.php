@extends('admin.layouts.panel')

@section('head')
<title>KOPITU E-Store - Tambah Produk Baru</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ url('/dist/assets/css/admin/product.css') }}">
@endsection

@section('pages')
<div class="container-fluid">
    <div class="d-block rounded bg-white shadow p-3 mb-3">
        <h2>Tambah Produk Baru</h2>
    </div>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <div class="mb-3">
                <label for="#" class="form-label">Nama Produk</label>
                <input name="product_name" type="text" class="form-control  @error('product_name') is-invalid @enderror"
                    value="{{ old('product_name') }}">
                @error('product_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok Produk</label>
                        <div class="input-group">
                            <button class="input-group-text" type="button" id="minus"><i
                                    class="fas fa-minus fa-fw"></i></button>
                            <input name="stock" type="number" id="stock"
                                class="form-control  @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                            <button class="input-group-text" type="button" id="plus"><i
                                    class="fas fa-plus fa-fw"></i></button>
                        </div>
                        @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat Produk</label>
                        <div class="input-group">
                            <input name="weight" type="number" id="weight"
                                class="form-control  @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                            <span class="input-group-text" id="plus">Gr</span>
                        </div>
                        @error('weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga Produk</label>
                        <input name="price" type="text" id="price"
                            class="form-control  @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    @livewire('admin.product.category')
                </div>
            </div>
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            @livewire('admin.product.locations', [
                'province_id' => null,
                'city_id' => null,
                ])
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <label for="editor" class="form-label">Deskripsi Produk</label>
            <textarea name="description" id="editor"
                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <label class="form-label">Upload Gambar Produk</label>
            <label for="imagesInput" class="box-images @error('images') is-invalid @enderror">
                <div class="box-prepare-images">
                    <i class="fas fa-upload fa-4x fa-fw mb-3"></i>
                    <p class="mb-0 fw-light">Upload Gambar Produk Lain</p>
                </div>
                <img src="{{ url('/images/brangkas/upload.png') }}" alt="" id="displayGambar" class="d-none"
                    width="50%">
            </label>
            <input type="file" name="images" id="imagesInput" onchange="optImages(this)" class="d-none">
            @error('images')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-block rounded bg-white shadow p-3 mb-3">
            <button type="submit" class="btn btn-primary btn-lg form-control" type="button" id="btn-bukti">
                SIMPAN DATA
            </button>
        </div>
    
    </form>

</div>
@endsection

@section('script')
<script src="{{ url('/dist/ckeditor5/ckeditor.js') }}"></script>
<script src="{{ url('/dist/assets/js/admin/product.js') }}"></script>
@endsection