@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Detail Transaksi</title>
@endsection

@section('pages')
<?php
    $totalHarga = 0;
    $weight = 0;
?>
<div class="py-3">

    <div class="container mb-4">
        <div class="d-block bg-white rounded shadow">
            <div class="d-block border-bottom p-3 w-100">
                <p class="mb-0 fs-5 fw-bold">Detail Transaksi</p>
            </div>
            <div class="p-3">
                <div class="d-flex justify-content-between py-2 mb-2">
                    <p class="mb-0">No. Invoice</p>
                    <p class="mb-0 text-uppercase">{{ $purchases->id_transaction }}</p>
                </div>
                <div class="d-flex justify-content-between py-2 mb-2">
                    <p class="mb-0">Tanggal Pembelian</p>
                    <p class="mb-0">{{ date('d F Y', strtotime($purchases->date)) }}, {{ date('H:i', strtotime($purchases->time)) }} WIB</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-block rounded shadow">
                    <div class="border-bottom p-3 d-block">
                        <p class="mb-0 fs-5 fw-bold">Detail Produk</p>
                    </div>
                    <div class="d-border-bottom p-3">
                        @foreach($product as $row)
                        <?php $totalHarga += $row->total_price ?>
                        <?php $weight += $row->qty * $row->weight ?>
                        <div class="d-flex alert alert-light p-0 mb-3">
                            <img src="{{ url('images/product/' . $row->images) }}" class="rounded"
                                alt="{{ $row->product_name }}" width="100px">
                            <div class="d-block ms-4">
                                <span class="text-title-cart text-capitalize fw-bold text-dark lh-sm">
                                    {{ $row->product_name }}
                                </span>
                                <span class="d-block mb-0 mb-md-2 mb-lg-2">Berat Produk {{ $row->weight }}Gr</span>
                                <span class="d-block fw-bold text-danger">Rp. {{number_format( $row->price,0,',','.')
                                    }}<small class="text-secondary ms-1"> x {{ $row->qty }} Qty.</small></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-4">
        <div class="d-block rounded shadow">
            <div class="d-flex border-bottom p-3 w-100 align-items-center">
                <p class="mb-0 fs-5 fw-bold">Info Pengiriman</p>
            </div>
            <div class="d-block p-3">
    
                <div class="row mb-3">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold mb-1 text-secondary">Kurir</p>
                    <p class="col-12 col-md-9 col-lg-8 mb-0">{{ $shipping->expedition }} - {{ $shipping->service }}</p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold text-secondary mb-1">Alamat Pengiriman</p>
                    <div class="col-12 col-md-9 col-lg-8">
                        <p class="mb-0 text-capitalize">{{ $shipping->username }}</p>
                        <p class="mb-0">{{ $shipping->phone }}</p>
                        <p class="mb-0">{{ $shipping->province }}, {{$shipping->city }}, {{$shipping->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-4">
        <div class="d-block rouned shadow">
            <div class="d-block border-bottom p-3 w-100">
                <p class="mb-0 fs-5 fw-bold">Rincian Pembayaran</p>
            </div>
            <div class="d-block p-3">
                @if($payment)
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Metode Pembayaran</p>
                    <p class="mb-0 text-uppercase">{{ $payment->bank }}</p>
                </div>
                <div class="d-flex justify-content-between py-2 mb-2">
                    <p class="mb-0">VA Number</p>
                    <p class="mb-0 text-uppercase">{{ $payment->va_number }}</p>
                </div>
                @endif
                <hr class="soft">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Harga ({{ $product->count() }} produk)</p>
                    <p class="mb-0">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Ongkos Kirim ({{ $weight }} Gr)</p>
                    <p class="mb-0">Rp. {{ number_format($shipping->price, 0, ',', '.') }}</p>
                </div>
                <hr class="soft">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Belanja</p>
                    <p class="mb-0 fw-bold">Rp. {{ number_format($purchases->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
    
@endsection