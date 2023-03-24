@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Whislist Pelanggan</title>
@endsection

@section('pages')
<div class="container py-4 py-md-5">

    <div class="row gy-4">
        <div class="col-12 col-md-5 col-lg-4 col-xl-3">
            @include('user.components.panel')
        </div>

        <div class="col-12 col-md-7 col-lg-8 col-xl-9">
            <div class="d-block bg-white rounded shadow">
                <div class="d-flex border-bottom p-3">
                    <p class="fs-5 fw-bold mb-0">Produk Disukai</p>
                </div>
                <div class="p-3">
                    <div class="d-flex flex-column flex-lg-row mb-4 py-1">
                        <div class="position-relative ms-auto">
                            <input type="text" class="form-control" placeholder="Cari Produk..."
                                style="padding-right: 64px">
                            <a href="#" class="btn position-absolute top-0 end-0">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card shadow border-0">
                                <img src="{{ url('/images/product/' . $item->images) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a class="fw-bold text-ellipsis mb-1 link-dark text-decoration-none"
                                        href="{{ route('product.detail', ['slug' => $item->slug]) }}">
                                        {{ $item->product_name }}
                                    </a>
                                    <p class="text-danger fw-bold mb-0">Rp. {{ number_format($item->price, '0', ',',
                                        '.') }}
                                    </p>
                                    <a href="{{ route('product.detail', ['slug' => $item->slug]) }}"
                                        class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{ url('/dist/assets/js/user/index.js') }}"></script>
@endsection