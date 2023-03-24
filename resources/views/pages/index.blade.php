@extends('layouts.panel')

@section('head')
    <title>KOPITU - Selamat Datang di KOPITU E-Store</title>
    <link rel="stylesheet" href="{{ url('/dist/assets/css/home.css') }}">
@endsection

@section('pages')
    <div class="py-3 py-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="d-block rounded overflow-hidden">
                        <div class="owl-carousel owlCarousel owl-theme owl-loaded p-0">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    <div class="owl-item">
                                        <img src="{{ url('/images/banner/banner1.jpg') }}" alt="" class="w-100">
                                    </div>
                                    <div class="owl-item">
                                        <img src="{{ url('/images/banner/banner2.jpg') }}" alt="#"
                                            class="w-100">
                                    </div>
                                    <div class="owl-item">
                                        <img src="{{ url('/images/banner/rfq-new.jpg') }}" alt="#" class="w-100">
                                    </div>
                                </div>
                            </div>
                            <button
                                class="btn-owl owl-prev-carousel btn btn-outline-orange d-block p-0 rounded-circle position-absolute top-50 start-0 translate-middle-y m-3"
                                style="height: 32px; width: 32px;">
                                <i class="fas fa-angle-left  fa-fw"></i>
                            </button>
                            <button
                                class="btn-owl owl-next-carousel btn btn-outline-orange d-block p-0 rounded-circle position-absolute top-50 end-0 translate-middle-y m-3"
                                style="height: 32px; width: 32px;">
                                <i class="fas fa-angle-right fa-fw "></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-none d-md-block">
                    <div class="row g-3">
                        <div class="col-12">
                            <img src="{{ url('/images/banner/banner1.jpg') }}" alt="#" class="img-fluid rounded">
                        </div>
                        <div class="col-12">
                            <img src="{{ url('/images/banner/banner2.jpg') }}" alt="#" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('pages.index.menus')

    @livewire('pages.product.product-ramadhan')

    @livewire('pages.product.product-new')

    @livewire('pages.product.product-recomended')

    @livewire('pages.request.rfq')

    <div class="py-3 py-md-4">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-6 order-2 order-md-1">
                    <h4 class="mb-4 text-orange fw-bold">Kembangkan bisnismu bersama Kopitu E-Store</h4>
                    <p class=" lh-lg mb-4">Bingung punya produk tetapi tidak tahu ingin menjual dimana, ayo segera
                        daftarkan produk kamu dikopitu e-store lihat caranya dengan klik link dibawah ini.</p>
                    <a href="{{ route('index.info.enabler') }}" class="btn btn-outline-orange btn-lg">Lihat
                        Selengkapnya</a>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2">
                    <img src="{{ url('/images/banner/info-pendaftaran-produk.png') }}" alt="info-product" class="w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-4">
        <div class="container">
            <div class="d-block py-2">
                <h4 class="text-orange fw-bold">Kopitu Ekosistem</h4>
            </div>
            <div class="row align-items-center gy-4">
                <div class="col-12 col-md-6">
                    <ul class="nav d-block position-relative rounded border-md" id="myTab"
                        style="height: 280px!important;">
                        <li class="position-absolute start-50 translate-middle" style="top: 35%;">
                            <button class="btn rounded shadow border p-0 btn-esystem active" data-bs-toggle="tab"
                                data-bs-target="#kopituStore" type="button" role="tab">
                                <img src="{{ url('/images/logo/kopitu-estore-system.jpeg') }}" alt=""
                                    width="100px">
                            </button>
                        </li>
                        <li class="position-absolute start-50 translate-middle" role="presentation"
                            style="margin-left: -120px; top: 55%;">
                            <button class="btn rounded shadow border p-0 btn-esystem" data-bs-toggle="tab"
                                data-bs-target="#fulfillment" type="button" role="tab">
                                <img src="{{ url('/images/logo/kopitu-fulfillment-system.jpeg') }}" alt=""
                                    width="100px">
                            </button>
                        </li>
                        <li class="position-absolute start-50 translate-middle" role="presentation"
                            style="margin-left: 120px; top: 55%;">
                            <button class="btn rounded shadow border p-0 btn-esystem" data-bs-toggle="tab"
                                data-bs-target="#enambler" type="button" role="tab">
                                <img src="{{ url('/images/logo/kopitu-enambler-system.jpeg') }}" alt=""
                                    width="100px">
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kopituStore">
                            <div class="d-flex align-items-center">
                                <img src="{{ url('/images/logo/kopitu-estore.png') }}" alt="" width="32px">
                                <p class="fw-bold fs-5 text-orange mb-0 ms-2">Kopitu.com</p>
                            </div>
                            <p class="mb-0 p-2 lh-lg">Kopitu E-store adalah sebuah Platform E-Store B2B yang memberikan
                                solusi melalui teknologi dan fitur terkini untuk membantu pembeli dalam mengembangkan
                                bisnisnya. Kopitu E-Store Menyediakan ribuan produk harga grosir dari ratusan pemasok
                                terpercaya dan terkemuka dan Terkurasi.dengan Fitur tambahan Fitur Fulfillment Service dan
                                Enabler Kopitu
                            </p>
                        </div>
                        <div class="tab-pane fade" id="fulfillment">
                            <p class="fw-bold fs-5 text-orange mb-0 ms-2">Fulfillment</p>
                            <p class="mb-0 p-2 lh-lg">
                                Fulfillment service adalah layanan penyimpanan barang sampai pengiriman. Layanan Fulfillment
                                bisa diartikan dengan pick and pack. Proses dimulai dari penyimpanan barang, Update Stok,
                                Penerimaan order, Packing dan Shipping.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="enambler">
                            <p class="fw-bold fs-5 text-orange mb-0 ms-2">Enabler</p>
                            <p class="mb-0 p-2 lh-lg">
                                Enabler kopitu adalah penengah atau fasilitator dalam untuk membantu kesulitan umkm dalam
                                melakaukan penjualan atau mengurus proses izin produk umkm.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 pb-3">
        @livewire('pages.news.data-branda')
    </div>
@endsection

@section('script')
    <script>
        $('#kopituNav').click(function() {
            var firstTabEl = $(this).attr('targeter');
            var firstTab = new bootstrap.Tab(firstTabEl);
            firstTab.show();
        });

        $('.owlCarousel').owlCarousel({
            loop: true,
            margin: 12,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3600,
            items: 1,
        });
        var owlCarousel = $('.owlCarousel');
        owlCarousel.owlCarousel();
        // Go to the next item
        $('.owl-next-carousel').click(function() {
            owlCarousel.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.owl-prev-carousel').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlCarousel.trigger('prev.owl.carousel');
        })


        $('.navOwl').owlCarousel({
            loop: true,
            margin: 12,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2800,
            autoplayHoverPause: false,
            responsiveClass: true,
            autoWidth: true,
        });
        var navOwl = $('.navOwl');
        navOwl.owlCarousel();
        // Go to the next item
        $('.owl-next-nav').click(function() {
            navOwl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.owl-prev-nav').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            navOwl.trigger('prev.owl.carousel');
        })
    </script>
@endsection
