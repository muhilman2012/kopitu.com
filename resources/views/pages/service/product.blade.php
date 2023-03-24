@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - RFQ</title>
<style>
    .fa-icons {
        width: 64px;
    }
</style>
@endsection

@section('pages')
<div class="py-4" style="background-color: #fffbee">
    <div class="container">
        <div class="row align-items-center justify-content-center gy-4">
            <div class="col-12 col-lg-6 order-2 order-lg-2">
                <div class="text-center text-lg-start">
                    <h2 class="fw-bold">Pengadaaan Barang dan Jasa </h2>
                    <hr class="soft mx-auto ms-lg-0 me-lg-auto" style="width: 30%">
                    <p>Anda akan bisa melihat kebutuhan belanja barang dan jasa yang di perlukan oleh pemerintah dan
                        kami akan membantu anda dalam menghubungkan UMKM untuk memenuhi kebutuhan belanja barang dan
                        jasa yang di lakukan oleh pemerintah.</p>
                </div>
            </div>
            <div class="col-8 col-lg-6 order-1 order-lg-2">
                <img src="{{ url('/images/banner/barang-jasa.png') }}" alt="barang-jasa" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="py-4">
    @livewire('pages.request.rfq-product')
</div>
@endsection

@section('script')

@endsection