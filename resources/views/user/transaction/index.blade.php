@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Daftar Transaksi</title>
<style>
    .img-users {
        width: 64px;
        height: 64px;
    }

    .pils-navs.active {
        color: #0d6efd !important;
        border-radius: 0px !important;
        background-color: white !important;
        border-bottom: 3px solid #0d6efd !important;
    }

    .t-bio {
        width: 120px;
    }

    @media(max-width: 768px) {
        .img-users {
            width: 32px;
            height: 32px;
        }
    }
</style>
@endsection

@section('pages')
<div class="container py-4 py-md-5">

    <div class="row gy-4">
        <div class="col-12 col-md-5 col-lg-4 col-xl-3">
            @include('user.components.panel')
        </div>

        <div class="col-12 col-md-7 col-lg-8 col-xl-9">
            @livewire('user.transaction.index-transaction')
        </div>
    </div>

</div>
@endsection

@section('script')
    <script src="{{ url('/dist/assets/js/user/index.js') }}"></script>
@endsection