@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Detail Produk</title>
<link rel="stylesheet" href="{{ url('/dist/assets/css/product.css') }}">
@endsection


@section('pages')
<div class="container px-0 px-md-auto py-0 py-md-3 mb-4">
    <div class="row g-0 g-md-3 justify-content-center">
        <!-- this images product -->
        <div class="col-12 col-md-6">
            <div id="sliderImages" class="carousel slide carousel-fade">
                <div class="d-flex align-self-stretch">
                    <div class="nav flex-column nav-pills indicator-slider d-none d-lg-block" id="v-pills-tab"
                        role="tablist" aria-orientation="vertical">
                        <button class="btn btn-indications active" data-bs-toggle="pill" data-bs-target="#sliderImages"
                            type="button" role="tab" data-bs-slide-to="0">
                            <img src="{{ url('/images/product/' . $product->images) }}" class="d-block w-100" alt="...">
                        </button>
                        @foreach($images as $index => $img)
                        <button class="btn btn-indications " data-bs-toggle="pill" data-bs-target="#sliderImages"
                            type="button" role="tab" data-bs-slide-to="{{ $index + 1 }}">
                            <img src="{{ url('/images/product/multiple/' . $img->locations) }}" class="d-block w-100"
                                alt="{{ $img->images_name }}">
                        </button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('/images/product/' . $product->images) }}" class="d-block w-100 rounded"
                                alt="...">
                        </div>
                        @foreach($images as $img)
                        <div class="carousel-item">
                            <img src="{{ url('/images/product/multiple/' . $img->locations) }}"
                                class="d-block w-100 rounded" alt="{{ $img->images_name }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="preview-indicator d-block d-lg-none">
                        <button class="carousel-control-prev" type="button" data-bs-target="#sliderImages"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#sliderImages"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- this deskripsi -->
        <div class="col-12 col-md-6 col-lg-6">
            <div class="p-3">
                <div class="d-block pt-3 pt-md-0 pt-lg-0">
                    <h2 class="text-capitalize text-ellipsis-4">{{ $product->product_name }}</h2>
                    <div class="mb-2">
                        <?php for($x=1; $x<=5; $x++) : ?>
                        <small class="text-warning"><i class="fas fa-star    "></i></small>
                        <?php endfor; ?>
                    </div>
                    <h4 class="text-danger">Rp. {{ number_format($product->price,0,',','.') }}</h4>
                </div>
                <div class="d-block border-top border-bottom py-2 my-3">
                    <div class="row g-2 align-self-stretch">
                        <div class="col-3 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center mb-0 p-2">
                                <p class="mb-0">Berat</p>
                                <b class="mb-0 text-capitalize">{{ $product->weight }} grm</b>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center mb-0 p-2">
                                <p class="text-center mb-0">Tersedia</p>
                                <b class="mb-0">{{ $product->stock }}</b>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center mb-0 p-2">
                                <p class="mb-0">Terkirim</p>
                                <b class="mb-0">
                                    @if($product->sold == null or $product->sold == 0)
                                    {{ 0 }}
                                    @else
                                    {{ $product->sold }}
                                    @endif
                                </b>
                            </div>
                        </div>
                        <div class="col-3 col-md-6 col-lg-3">
                            <div class="alert alert-warning text-center mb-0 p-2">
                                <p class="text-center mb-0">Dikirim Dari</p>
                                <b class="mb-0">{{ $locations->city }}</b>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('pages.order.product-order', ['post' => $product->id_product])
                {{--
                <livewire:product-order :post="$product->id_product" /> --}}
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container mb-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-description" type="button"
                    role="tab">Description</button>
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-ulasan" type="button"
                    role="tab">Ulasan</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-description" role="tabpanel">
                <div class="py-3">
                    <?php echo $product->description ?>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-ulasan" role="tabpanel">...</div>
        </div>
    </div>
</div>

<div class="py-4">
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