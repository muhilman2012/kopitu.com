@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Enabler</title>
@endsection

@section('pages')
<div class="py-3 alert-white text-orange" style="background-color: #fffbee">
    <div class="container py-5">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <p class="fs-1 fw-bold mb-2 lh-md">KOPITU Enabler</p>
                <p class="fs-5 mb-5">Enabler KOPITU adalah Penengah atau Fasilitator dalam untuk membantu kesulitan umkm dalam melakukan penjualan atau mengurus proses izin bpom, Halal, Pirt, Rumah kemasan, kur, pembiayaan ekspor dan laporan keuangaan, pelaporan pajak serta bantuan notaris dalam hal pembuatan perusahaan baru dan penambahan kbli</p>
                <a href="#" class="btn btn-outline-orange px-5 py-3">Yuk, Bergabung</a>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <img src="{{ url('/images/enambler/apa.png') }}" alt="banner" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-9 col-md-6">
                <img src="{{ url('/images/enambler/sertifikat.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Sarana Pelatihan dan Sertifikasi</h1>
                <p class="lh-lg">Kopitu akan membantu proses pembuataan sertifikasi Halal, BPOM, dan pengurusan PIRT.
                    KOPITU telah menjalin kerjasama dengan BPJPH dan BPOM sehingga akan memudahkan dalam proses
                    pembuataan sertifikat.</p>
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="fw-bold lh-sm mb-4 fs-1">KOPITU E-Store</h1>
                <p class="lh-lg">Kopitu akan membantu para UMKM untuk dapat masuk dan Menjual Produk nya di Platform
                    Kopitu E-Store. Hal ini sangat penting karena dapat membantu umkm dalam memasarkan produk nya agar
                    bisa mendapatkan income yang lebih banyak.</p>
            </div>
            <div class="col-9 col-md-5 order-1 order-md-2 ms-md-auto">
                <img src="{{ url('/images/fulfillment/satu-app.png') }}" alt="banners" class="w-100">
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-9 col-md-5 me-md-auto">
                <img src="{{ url('/images/enambler/kur.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Kredit Usaha Rakyat</h1>
                <p class="lh-lg">Kopitu akan membantu anda dalam mendapatkan Kredit Usaha Rakyat (KUR) yang bisa di
                    pakai untuk modal usaha anda.</p>
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="fw-bold lh-sm mb-4 fs-1">Pembiayaan Ekspor</h1>
                <p class="lh-lg">Enabler Kopitu Akan membantu anda dalam perihal pembiayaan ekspor, kami berkolaboasi
                    Bersama Bank BNI dalam program BNI Xpora untuk membantu Umkm dalam memperluas market mereka.</p>
            </div>
            <div class="col-9 col-md-5 order-1 order-md-2 ms-md-auto">
                <img src="{{ url('/images/enambler/export.png') }}" alt="banners" class="w-100">
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-9 col-md-6">
                <img src="{{ url('/images/enambler/rumah.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Rumah Kemasan</h1>
                <p class="lh-lg">Pelaku UMKM yang belum dapat memproduksi kemasan sendiri dengan layak,estetik serta
                    barcode dan aman, maka diberikan fasilitas berupa rumah kemasan. Dengan kemasan yang baik, maka
                    produk akan bertahan lebih lama dan lebih menarik konsumen.</p>
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="fw-bold lh-sm mb-4">Laporan Pajak dan keuangan </h1>
                <p class="lh-lg">Pelaku UMKM yang belum dapat membuat laporan keuangan atau Melakukan pelaporan pajak
                    untuk usahanya , kami akan membantu anda dalam proses pembuataan laporan keuangan ataupun pelaporan
                    pajak.</p>
            </div>
            <div class="col-9 col-md-6 order-1 order-md-2">
                <img src="{{ url('/images/enambler/pajak-keuangan.png') }}" alt="banners" class="w-100">
            </div>
        </div>

        <div class="row mb-5 gy-4 justify-content-center align-items-center">
            <div class="col-9 col-md-6">
                <img src="{{ url('/images/enambler/notaris.png') }}" alt="banners" class="w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bold lh-sm mb-4">Notaris</h1>
                <p class="lh-lg">Kami Akan membantu anda dalam hal pengurusan pembuataan perusahaan baru dan penambahan
                    kbli di akta anda dan terintregrasi di oss.</p>
            </div>
        </div>


    </div>
</div>

<div class="py-5">
    <div class="container bg-white rounded shadow alert-primary p-3">
        <div class="text-center py-4">
            <p class="fs-5 fw-bold text-orange text-capitalize">Kembangkan Bisnismu Sekarang bersama kopitu e-store</p>
            <p class="fw-light text-orange">Solusi mudah untuk pengemasan dan pengiriman produk kepada konsumen</p>
            <a href="{{ route('enabler.login') }}" class="btn btn-outline-orange px-5 py-3">Yuk, Masuk</a>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection