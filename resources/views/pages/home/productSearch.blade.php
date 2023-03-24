@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Semua Produk</title>
<style>
    .card-items {
        width: 14rem;
    }

    .text-ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #000;
        text-transform: capitalize;
    }

    @media(max-width: 768px) {
        .card-items {
            width: 200px;
        }
    }
</style>
@endsection

@section('pages')
<div class="container pt-3 pt-md-5 pb-5">
    <div class="row g-4">
        <div class="col-12 col-md-4 col-lg-3 order-last order-md-first">
            <div class="d-block rounded shadow mb-4">
                <h5 class="d-block alert-secondary p-3 mb-0 fw-bold">Kategori Produk</h5>
                <div class="nav flex-column">
                    @foreach ($ctg as $item)
                    <a class="nav-link link-secondary" href="{{ route('product.ctg', ['ctg' => $item->categories]) }}">{{ $item->categories }}</a>
                    @endforeach
                    <a href="{{ route('product') }}" class="nav-link link-secondary">Lihat Semua</a>
                </div>
            </div>
            <div class="d-block rounded shadow mb-4">
                <h5 class="d-block alert-secondary p-3 mb-0 fw-bold">Produk Berdasarkan</h5>
                <div class="nav flex-column">
                    <a href="#" class="nav-link link-secondary">Produk Terbaru</a>
                    <a href="#" class="nav-link link-secondary">Produk Rekomendasi</a>
                    <a href="#" class="nav-link link-secondary disabled" tabindex="-1" aria-disabled="true">A disabled
                        link item</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-9">
            @if (isset($src))
            @livewire('pages.product.product-Search', ['post' => $src])
            @else
            @livewire('pages.product.index-product')
            @endif
        </div>
    </div>
</div>

<div class="py-3">
    @livewire('pages.product.product-promo')
</div>
@endsection

@section('script')
<script>
    $('.MyOwl').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 2800,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoWidth:true,
    });
    var owlTbr = $('.MyOwl');
    owlTbr.owlCarousel();
    // Go to the next item
    $('.owl-next').click(function() {
        owlTbr.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.owl-prev').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owlTbr.trigger('prev.owl.carousel', [300]);
    })
</script>
@endsection