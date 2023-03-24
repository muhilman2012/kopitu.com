@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Tentang Kami</title>
@endsection

@section('pages')
<div class="py-3">

    <div class="container mb-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-5">
                <img src="{{ url('/images/banner/about-kopitu.png') }}" alt="info-product" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 ms-auto">
                <p class="fs-3 fw-bold">Kopitu E-Store</p>
                <hr class="soft mb-4" style="width: 100px">
                <p class="lh-lg">Kopitu E-Store adalah web aplications yang di miliki oleh Komite Pengusaha Mikro Kecil
                    Menengah Indonesia Bersatu (KOPITU) . Kopitu E-Store bertujuan membantu UMKM yang ada di Indonesia
                    agar produknya bisa terjual secara online di Kopitu E-STORE.</p>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="d-block mb-3">
            <p class="fs-3 fw-bold mb-0">Kurasi Produk</p>
            <p>Apa aja sih yang dibutukan untuk lolos kurasi produk</p>
        </div>
        <div class="row g-4">
            <?php for($x=1; $x<=6; $x++) : ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                <div class="card">
                    <img src="{{ url('/images/icons/kurasi/kurasi-'. $x . '.png' ) }}" alt="">
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <p class="fs-3 fw-bold">Hai Kalian Para Umkm</p>
                <hr class="soft mb-4" style="width: 100px">
                <p class="lh-lg mb-4">Kalian punya produk dan ingin menjual produk kalian di kopitu E-store, ayo segera
                    daftarkan produk kalian segera di Kopitu e-store lihat caranya dengan klik link dibawah ini.</p>
                <a href="https://forms.gle/4CkzMHzhW3mSSEBX9" target="_blank" class="btn btn-outline-orange btn-lg">Ayo Gabung</a>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <img src="{{ url('/images/banner/info-pendaftaran-produk.png') }}" alt="info-product" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-6">
                <img src="{{ url('/images/icons/daftar-produk-kurasi.png') }}" alt="" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <p class="fs-3 fw-bold mb-0">Pendaftaran Produk</p>
                <hr class="soft" style="width: 100px">
                <p class="mb-1">Daftarkan Segera Produk Anda di Kopitu E-Store dengan Persayaratan Sebagai Berikut :</p>
                <ol class="px-3">
                    <li>Memiliki usaha dibidang kuliner, fashion, craft, health&cosmetic</li>
                    <li>Exp Date 6 bulan keatas (Kuliner dan Health&Cosmetic)</li>
                    <li>Produk sendiri (Bukan Reseller/Distributor)</li>
                    <li>Memiliki Rek BNI setelah lolos kurasi</li>
                    <li>Khusus kuliner bukan produk makanan basah atau sistem PO, minimal sudah punya izin
                        BPO/Hallal/Depkes, kemasan ready E-Store</li>
                    <li>Mampu memenuhi stock yang dibutuhkan</li>
                    <li>Bersedia menjalankan sistem konsinyasi dengan Kopitu E-Store</li>
                </ol>
                <a href="https://forms.gle/4CkzMHzhW3mSSEBX9" target="_blank" class="btn btn-outline-orange btn-lg">Yuk Gabung</a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

@endsection