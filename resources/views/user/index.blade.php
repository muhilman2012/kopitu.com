@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Dashboard Pelanggan</title>
<link rel="stylesheet" href="{{ url('/dist/assets/css/user/index.css') }}">
@endsection

@section('pages')
<div class="container py-4 py-md-5">

    <div class="row gy-4">
        <div class="col-12 col-md-5 col-lg-4 col-xl-3">
            @include('user.components.panel')
        </div>

        <div class="col-12 col-md-7 col-lg-8 col-xl-9">

            <div class="d-block">
                    @livewire('user.profile')
            </div>

            <div class="d-block">
                @livewire('user.address.index-address')
            </div>

        </div>
    </div>

</div>
@endsection

@section('script')
    <script src="{{ url('/dist/assets/js/user/index.js') }}"></script>
@endsection