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
            <div class="d-block bg-white shadow">
                <div class="p-3 border-bottom">
                    <p class="fs-5 fw-bold mb-0">Menunggu Pembayaran</p>
                </div>
                <div class="p-3">
                    @foreach ($data as $index => $item)
                    <div class="d-block border rounded mb-3">
                        <div class="d-flex align-items-center border-bottom px-3 py-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shopping-bag fa-2x fa-fw text-success"></i>
                                <div class="d-block ms-2 lh-sm">
                                    <small class="d-block mb-0 fw-bold">Belanja</small>
                                    <small class="d-block mb-0 text-secondary">{{ date('d F Y', strtotime($item->date))
                                        }}</small>
                                </div>
                            </div>
                            <small class="mb-0 fw-bold ms-auto">Bayar Sebelum <span class="text-warning">{{ date('d F Y', strtotime($item->deathline)) }}, {{ date('H:i', strtotime($item->time)) }}
                                    WIB</span></small>
                        </div>
                        <div class="row p-3">
                            <div class="col-12 col-md-5">
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('/images/bank/' . $item->bank . '.png') }}" alt="" width="64px">
                                    <div class="d-block ms-3 lh-sm">
                                        <small>Metode Pembayaran</small>
                                        <p class="fw-bold mb-0">{{ $item->bank }} Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="lh-sm">
                                    <small>Nomor Virtual Account</small>
                                <p class="mb-0 fw-bold">{{ $item->va_number }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="lh-sm">
                                    <small>Total Bayar</small>
                                <p class="mb-0 fw-bold">Rp. {{ number_format($item->gross_amount, 0,',','.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center px-3 py-2 border-top">
                                <a href="#" class="link-secondary text-decoration-none ms-auto">Lihat Transaksi</a>
                                <a href="{{ route('payment', ['id' => $item->id_transaction]) }}" class="btn btn-outline-primary btn-sm px-3 mx-2">Cara Bayar</a>
                                <div class="dropstart">
                                    <button class="btn btn-outline-orange btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h fa-lg"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="#">Beli Lagi</a></li>
                                      <li><a class="dropdown-item" href="#">Tanya Penjualan</a></li>
                                    </ul>
                                  </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{ url('/dist/assets/js/user/index.js') }}"></script>
@endsection