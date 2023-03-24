<div>
    <div class="t-product-new opacity-0 py-3 py-md-4">
        <div class="container">
            <div class="d-flex mb-3 py-2">
                <div class="col">
                    <h4 class="text-capitalize text-orange fw-light mb-0">Produk Terbaru</h4>
                    <p class="text-secondary mb-0">Jangan sampai ketinggalan, yuk pesan sekarang.</p>
                </div>
                <a href="{{ route('product') }}" class="btn btn-outline-orange btn-sm px-3 align-self-center rounded-pill">
                    Semua <i class="fal fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="owl-carousel MyOwl owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage py-1">
                        @foreach ($newproduct as $index => $item)
                        <div class="owl-item h-100">
                            <div class="card border-0 shadow-box h-100 t-product-new-animated opacity-0"
                                style="width: 200px;" >
                                <a href="{{ route('product.detail', ['slug' => $item->slug]) }}">
                                    <img src="{{ url('/images/product/' . $item->images) }}" class="card-img-top"
                                        alt="{{ $index }}">
                                </a>
                                <div class="card-body">
                                    <a href="{{ route('product.detail', ['slug' => $item->slug]) }}"
                                        class="fw-bold text-ellipsis link-orange-dark mb-0">
                                        {{ $item->product_name }}
                                    </a>
                                    <small class="text-warning">
                                        <?php for ($x = 1; $x <= 5; $x++) : ?>
                                        <i class="fas fa-star fa-sm fa-fw"></i>
                                        <?php endfor; ?>
                                    </small>
                                    <p class="text-danger fw-bold mb-2">Rp. {{ number_format($item->price, 0, ',','.')
                                        }}
                                    </p>
                                    <small class="d-block fw-light lh-sm" style="font-size: 12px">
                                        <span class="d-block  mb-1"><i class="far fa-map-marker-check"></i> Jakarta
                                            Pusat</span>
                                        <span class="d-block">Terjual @if($item->sold == null) 0 @else{{ $item->sold
                                            }}@endif</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button
                    class="btn-owl owl-prev btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-0 translate-middle"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-left  fa-fw"></i>
                </button>
                <button
                    class="btn-owl owl-next btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-100 translate-middle"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-right fa-fw "></i>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('/dist/owl/owl.carousel.min.js') }}"></script>
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
            owlTbr.trigger('prev.owl.carousel');
        })

        $(window).scroll(() => {
            var wScroller = $(this).scrollTop();
            if (wScroller > $('.t-product-new').offset().top - 300) {
                $('.t-product-new').removeClass('opacity-0');
                $('.t-product-new').addClass('animate__animated animate__fadeIn');
                $('.t-product-new-animated').each((i) => {
                    setTimeout(() => {
                        // $('.t-product-new-animated').eq(i).addClass('d-block');
                        $('.t-product-new-animated').eq(i).removeClass('opacity-0');
                        $('.t-product-new-animated').eq(i).addClass('animate__animated animate__slideInUp');
                    }, 50 * i + 1);
                });
            }
        });
    </script>
</div>