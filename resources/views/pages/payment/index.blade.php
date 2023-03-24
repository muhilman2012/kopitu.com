@extends('layouts.panel')

@section('head')
<title>KOPITU - Pemesanan Produk</title>
@endsection

@section('pages')
<div class="py-4">
    @livewire('pages.payment.index-payment', ['id' => $id])
</div>
{{-- {{dd($purchases)}} --}}
@endsection

@section('script')

@endsection