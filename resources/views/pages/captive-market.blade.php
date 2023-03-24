@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Enabler</title>
@endsection

@section('pages')
<div class="py-3 alert-white text-orange" style="background-color: #fffbee">
    <div class="container py-5">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <p class="fs-1 fw-bold mb-2 lh-md">Captive Market</p>
                <p class="fs-5 mb-5">Salah satu kelebihan Kopitu E-Store adalah adanya captive market pemasaran di domestik untuk para pengusaha untuk memudahkan mereka untuk  mencari keperuluan bisnisnya dan captive market global yang mana produk yang telah lolos kurasi dan memenuhi standar Negara tujuan ekpor dan dilakukan proses ekspor ke berbagai macam negara yaitu Jepang, Korea Australia, Polandia, Amerika dan Negara Timur Tengah.</p>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2">
                <img src="{{ url('/images/market/captive-market.png') }}" alt="banner" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection