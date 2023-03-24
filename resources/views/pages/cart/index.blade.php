@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Keranjang Belanja</title>
<style>
    .text-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-decoration: none;
    }

    .card-links {
        border: 0px !important;
        overflow: hidden;
    }

    .card-links:hover {
        box-shadow: 0px 0px 24px #0002;
        overflow: hidden;
        transition: all 0.3s;
    }

    .card-links:hover .img-banner {
        transition: all 0.3s;
        transform: scale(1.1);
    }

    .card-banner {
        background: url('/images/banner/prakerja-banner.png');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .card-title-elipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-decoration: none;
    }

    .card-body-elipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .card-items {
        width: 14rem;
    }

    @media(max-width: 768px) {
        .carousel-title {
            position: absolute;
            right: 15%;
            bottom: 1.25rem;
            left: 1.5rem;
        }

        .card-items {
            width: 200px;
        }
    }
</style>
@endsection

@section('pages')
<div class="pt-3 pt-md-4 pb-2">
    <div class="container">
        <div class="d-block rounded shadow bg-white p-3">
            <h2> <i class="fas fa-shopping-cart"></i> Keranjang Belanja</h2>
        </div>
    </div>
</div>

@if(session('cart'))
<div class="py-4">
    <div class="container">
        @livewire('pages.cart.index-cart')
    </div>
</div>
@else
<div class="py-3">
    <div class="container">
        <div class="text-center bg-white rounded shadow p-5">
            <i class="fas fa-shopping-cart fa-5x fa-fw mb-4"></i>
            <h1 class="mb-2">Oops!</h1>
            <h2 class="mb-3 fw-light">Keranjang Belanja kamu masih kosong.</h2>
            <h4 class="fw-light">Ayo belanja sekarang temukan produk terbaik kopitu e-store.</h4>
        </div>
    </div>
</div>
@endif

<div class="py-3 mb-5">
    @livewire('pages.product.product-promo')
</div>
@endsection


@section('script')
<script>
    $('.MyOwl').owlCarousel({
        loop: true,
        margin: 12,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 2800,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoWidth: true,
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