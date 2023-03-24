@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Daftar Permintaan dan Penawaran (RFQ)</title>
@endsection

@section('pages')
<div class="py-3" style="background-color: #fffbee">
    <div class="container mt-4 mb-2">
        <div class="d-flex align-items-center py-2">
            <i class="far fa-comment-alt-edit fa-4x text-orange"></i>
            <div class="ms-3">
                <p class="fs-3 fw-bold text-orange mb-0">PERMINTAAN PRODUK</p>
                <p class="mb-0">Lengkapi kebutuhan bisnis anda dengan mencari produk yang anda butuhkan</p>
            </div>
        </div>
    </div>
</div>
@livewire('pages.request.data')

@endsection


@section('script')

@endsection