@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - RFQ</title>
@endsection

@section('pages')
<div class="py-3" style="background-color: #fffbee">
    <div class="container mt-4 mb-2">
        <div class="d-block py-2">
            <p class="fs-3 text-orange mb-0">Detail Kebutuhan Anda</p>
            <p class="mb-0">Jelaskan mengenai barang atau jasa yang anda butuhkan untuk mendapatkan penawaran terbaik</p>
        </div>
    </div>
</div>
<div class="py-4">
    @livewire('pages.request.product')
</div>
@endsection


@section('script')
    
@endsection