@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Fulfillment</title>
<style>
    .box-icons {
        color: white;
        background-color: #00B4E5;
        height: 56px;
        width: 56px;
        margin-right: 20px;
        padding: 15px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('pages')
<div class="py-3 alert-white text-orange">
    <div class="container py-5">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <p class="fs-1 fw-bold mb-2 lh-md">Fulfillment Centre Kopitu E-Store</p>
                <p class="fs-5 mb-5">Solusi mudah untuk pengemasan dan pengiriman produk kepada konsumen</p>
                <a href="#" class="btn btn-outline-orange px-5 py-3">Yuk, Bergabung</a>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <img src="{{ url('/images/fulfillment/jumbotron.png') }}" alt="banner" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">

        <div class="row mb-5 gy-5 justify-content-center align-items-center">
            <div class="col-9 col-md-6">
                <img src="{{ url('/images/fulfillment/tanpa-bayar.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Penyimpanan barang</h1>
                <p class="lh-lg">Kopitu E-Store melayani proses fulfillment ini. Proses akan dimulai semenjak barang
                    datang. Kami akan letakan di posisi terpisah dari barang lainnya. Barang anda akan dicatat dan
                    disimpan.</p>
            </div>
        </div>

        <div class="row mb-5 gy-5 justify-content-center align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="fw-bold lh-sm mb-4 fs-1">Proses pemesanan</h1>
                <p class="lh-lg">Jika terdapat orderan, maka Warehouse siap untuk mengambil item dan melakukan proses
                    pengemasan sesuai dengan standar pengemasan. lalu jika sudah selesai pengemasan maka Proses
                    Pengiriman akan dilakukan sesuai data pemesanan produk di kopitu E-Store</p>
            </div>
            <div class="col-9 col-md-5 order-1 order-md-2 ms-md-auto">
                <img src="{{ url('/images/fulfillment/satu-app.png') }}" alt="banners" class="w-100">
            </div>
        </div>

        <div class="row mb-5 gy-5 justify-content-center align-items-center">
            <div class="col-9 col-md-5 me-md-auto">
                <img src="{{ url('/images/fulfillment/tersebar.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Berada di seluruh indonesia</h1>
                <p class="lh-lg">Produk kamu akan ditempatkan diseluruh indonesia, dekatkan produkmu ke pembeli atau
                    supplier, bergabunglah besama kopitu e-store GRATIS tanpa
                    biaya apa pun. Produk anda akan ditemapatkan secara strategis tanpa minimum barang
                    dan kontrak.</p>
            </div>
        </div>

    </div>
</div>

<div class="py-5 alert-secondary">
    <div class="container py-5">
        <div class="text-center py-3 mb-3">
            <h2>Bagaimana alur kerja service fulfillment Kopitu?</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <?php for($x=1; $x <= 8; $x++) : ?>
            <div class="item" style="width: 300px;">
                <div class="card pb-4">
                    <div class="card-body text-center px-4" style="height: 12rem">
                        <p class="fs-5 fw-bold text-center">Mencoba</p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <span class="d-flex align-items-center justify-content-center fs-5 mx-auto bg-orange text-white fw-bold rounded-circle"
                            style="width: 46px; height: 46px;">{{ $x }}</span>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <div class="d-flex justify-content-center justify-content-md-end">
            <button class="customPrevBtn btn btn-outline-orange p-2 me-2" type="button">
                <i class="fas fa-angle-left fa-lg fa-fw"></i>
            </button>
            <button class="customNextBtn btn btn-outline-orange p-2" type="button">
                <i class="fas fa-angle-right fa-lg fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container bg-white rounded shadow alert-primary p-3">
        <div class="text-center py-4">
            <p class="fs-5 fw-bold text-orange text-capitalize">Kembangkan Bisnismu Sekarang bersama kopitu e-store</p>
            <p class="fw-light text-orange">Solusi mudah untuk pengemasan dan pengiriman produk kepada konsumen</p>
            <a href="#" class="btn btn-outline-orange px-5 py-3">Yuk, Cek Biaya</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
    margin:24,
    loop:false,
    autoWidth:true,
    items:4
    })
    $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.customPrevBtn').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })
</script>
@endsection