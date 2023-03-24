@extends('admin.layouts.panel')

@section('head')
    <title>kopitu - data transakti</title>
@endsection

@section('pages')
    <div class="container-fluid">
        <div class="d-block rounded bg-white shadow mb-3">
            <div class="p-3 border-bottom">
                <p class="fs-4 fw-bold mb-0">Transaksi</p>
            </div>
            <div class="p-3">
                <div class="row mb-3">
                    <p class="col-12 col-md-4 col-lg-3 fw-bold mb-1 text-secondary">No. Invoice</p>
                    <p class="col-12 col-md-8 col-lg-9 mb-0">{{ $transaction->invoice }}</p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-md-4 col-lg-3 fw-bold mb-1 text-secondary">Status Pembelian</p>
                    <p class="col-12 col-md-8 col-lg-9 mb-0"><span class="badge bg-primary"> {{ $transaction->status }}</span></p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-md-4 col-lg-3 fw-bold mb-1 text-secondary">Tanggal Pembelian</p>
                    <p class="col-12 col-md-8 col-lg-9 mb-0">{{ date("d F Y", strtotime($transaction->date)) }}, {{ $transaction->time }}</p>
                </div>
            </div>
        </div>

        <div class="d-block bg-white rounded shadow mb-3">
            <div class="border-bottom p-3 d-block">
                <p class="mb-0 fs-5 fw-bold">Detail Produk</p>
            </div>
            <div class="d-border-bottom p-3">
                <?php
                $totalHarga = 0;
                $weight = 0;
                ?>
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

        <div class="d-block bg-white rounded shadow mb-3">
            <div class="d-flex border-bottom p-3 w-100 align-items-center">
                <p class="mb-0 fs-5 fw-bold">Info Pengiriman</p>
            </div>
            <div class="d-block p-3">
        
                <div class="row mb-3">
                    <p class="col-12 col-lg-3 fw-bold mb-1 text-secondary">Kurir</p>
                    <p class="col-12 col-lg-9 mb-0">{{ $shipping->expedition }} - {{ $shipping->service }}</p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-lg-3 fw-bold mb-1 text-secondary">Resi Pengiriman</p>
                    <p class="col-12 col-lg-9 mb-0">
                        @if($shipping->receipt == null)
                        <span class="fw-bold">-</span> 
                        @else
                        {{ $shipping->receipt }}
                        @endif
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-lg-3 fw-bold text-secondary mb-1">Alamat Pengiriman</p>
                    <div class="col-12 col-lg-9">
                        <p class="mb-0 text-capitalize">{{ $shipping->username }}</p>
                        <p class="mb-0">{{ $shipping->phone }}</p>
                        <p class="mb-0">{{ $shipping->province }}, {{$shipping->city }}, {{$shipping->address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-block bg-white rouned shadow mb-3">
            <div class="d-block border-bottom p-3 w-100">
                <p class="mb-0 fs-5 fw-bold">Rincian Pembayaran</p>
            </div>
            <div class="d-block p-3">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Harga ({{ $product->count() }} produk)</p>
                    <p class="mb-0">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Ongkos Kirim ({{ $weight }} Gr)</p>
                    <p class="mb-0">Rp. {{ number_format($shipping->price, 0, ',', '.') }}</p>
                </div>
                <hr class="soft my-4">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Belanja</p>
                    <p class="mb-0 fw-bold">Rp. {{ number_format($transaction->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    
@endsection