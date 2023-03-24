<div>
    @if ($dataRmd->count() != 0)
        <div class="productRmd opacity-0 py-3 py-md-4">
            <div class="container">
                <div class="d-block mb-3">
                    <h4 class="mb-0 text-capitalize text-orange">Produk Ramadhan</h4>
                    <p class="mb-0 text-secondary">Berbagai Produk dan Paket Hampers Ramadhan</p>
                </div>
                <div class="owlRmd owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage py-1">
                            @foreach ($dataRmd as $itemRmd)
                                <div class="owl-item h-100">
                                    <div class="card border-0 shadow-box h-100 cartRmd opacity-0" style="width: 200px;">
                                        <a href="{{ route('product.detail', ['slug' => $itemRmd->slug]) }}"
                                            class="text-decoration-none">
                                            <img src="{{ url('/images/product/' . $itemRmd->images) }}"
                                                class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <a class="fw-bold text-ellipsis mb-1 link-dark text-decoration-none"
                                                href="{{ route('product.detail', ['slug' => $itemRmd->slug]) }}">
                                                {{ $itemRmd->product_name }}
                                            </a>
                                            <p class="text-danger fw-bold mb-2">Rp.
                                                {{ number_format($itemRmd->price, '0', ',', '.') }}
                                            </p>
                                            <small class="d-block fw-light lh-sm" style="font-size: 12px">
                                                <span class="d-block  mb-1"><i class="far fa-map-marker-check"></i>
                                                    Jakarta
                                                    Pusat</span>
                                                <span class="d-block">Terjual @if ($itemRmd->sold == null)
                                                        0 @else{{ $itemRmd->sold }}
                                                    @endif
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button
                        class="btn-owl owl-prev-rmd btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-0 translate-middle"
                        style="height: 42px; width: 42px;">
                        <i class="fas fa-angle-left  fa-fw"></i>
                    </button>
                    <button
                        class="btn-owl owl-next-rmd btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-100 translate-middle"
                        style="height: 42px; width: 42px;">
                        <i class="fas fa-angle-right fa-fw "></i>
                    </button>
                </div>
            </div>
        </div>
    @endif


    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/dist/owl/owl.carousel.min.js') }}"></script>
    <script>
        $('.owlRmd').owlCarousel({
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
        var owlRmd = $('.owlRmd');
        owlRmd.owlCarousel();
        // Go to the next item
        $('.owl-next-rmd').click(function() {
            owlRmd.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.owl-prev-rmd').click(function() {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlRmd.trigger('prev.owl.carousel', [300]);
        });

        $(window).scroll(() => {
            var wScroller = $(this).scrollTop();
            if (wScroller > $('.productRmd').offset().top - 420) {
                // console.log($('.product-recomended').offset().top);
                $('.productRmd').removeClass('opacity-0');
                $('.productRmd').addClass('animate__animated animate__fadeIn');
                $('.cartRmd').each((i) => {
                    setTimeout(() => {
                        $('.cartRmd').eq(i).removeClass('opacity-0');
                        $('.cartRmd').eq(i).addClass('animate__animated animate__slideInUp');
                    }, 200 * i + 1);
                });
            }
        });
    </script>
</div>
