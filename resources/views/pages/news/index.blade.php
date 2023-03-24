@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Berita</title>
<style>
    .card-title {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-content-text{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .news-other-links.active{
        border: 0px;
        background-color: #ee9005!important;
    }
    .news-other-links:hover{
        color: #ee9005; 
    }
    @media(max-width: 768px){
        .card-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-content-text{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    }
</style>
@endsection

@section('pages')
<div class="py-3" style="background-color: #fffbee">
    <div class="container mt-4 mb-2">
        <div class="d-flex align-items-center py-2">
            <i class="fal fa-newspaper fa-4x text-orange"></i>
            <div class="ms-3">
                <p class="fs-3 fw-bold text-orange mb-0">BERITA KOPITU E-STORE</p>
                <p class="mb-0">Cari berita terkini seputar produk - produk terbaik</p>
            </div>
        </div>
    </div>
</div>
<div class="pt-3 pb-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-lg-9">
                @livewire('pages.news.index')
            </div>
            <div class="col-12 col-lg-3">
                <div class="list-group rounded-0 mb-4">
                    <a href="#" class="list-group-item news-other-links py-3 active" aria-current="true">Berita
                        Terbaru</a>
                    <a href="#" class="list-group-item news-other-links py-3" aria-current="true">Berita
                        Tranding</a>
                    <a href="#" class="list-group-item news-other-links py-3" aria-current="true">Berita Lama</a>
                    <a href="#" class="list-group-item news-other-links py-3" aria-current="true">Berita
                        Pelatihan</a>
                    <a href="#" class="list-group-item news-other-links py-3" aria-current="true">Semua Berita</a>
                </div>
                <div class="d-block mb-3 border p-3">
                    <div class="d-block mb-3">
                        <span class="fw-bold">Cari Berita Berdasarkan Tanggal</span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control">
                    </div>
                    <button class="btn btn-outline-orange form-control">CARI BERITA</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection