<div>
    <div class="productRec opacity-0 py-3 py-md-4">
        <div class="container">
            <div class="d-block mb-3 py-2">
                <h4 class="text-capitalize text-orange fw-light mb-0">Rekomendasi Produk</h4>
            </div>
            <div class="owl-carousel MyOwl-rekomend owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage py-1">
                        @foreach ($rek as $reks)
                        <div class="owl-item h-100">
                            <div class="card border-0 shadow-box h-100 t-product-recomended-animated opacity-0"
                                style="width: 200px;">
                                <a href="{{ route('product.detail', ['slug' => $reks->slug]) }}"
                                    class="text-decoration-none">
                                    <img src="{{ url('/images/product/' . $reks->images) }}" class="card-img-top"
                                        alt="...">
                                </a>
                                <div class="card-body">
                                    <a class="fw-bold text-ellipsis mb-1 link-dark text-decoration-none"
                                        href="{{ route('product.detail', ['slug' => $reks->slug]) }}">
                                        {{ $reks->product_name }}
                                    </a>
                                    <p class="text-danger fw-bold mb-2">Rp. {{ number_format($reks->price, '0', ',',
                                        '.') }}
                                    </p>
                                    <small class="d-block fw-light lh-sm" style="font-size: 12px">
                                        <span class="d-block  mb-1"><i class="far fa-map-marker-check"></i> Jakarta
                                            Pusat</span>
                                        <span class="d-block">Terjual @if($reks->sold == null) 0 @else{{ $reks->sold
                                            }}@endif</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button
                    class="btn-owl owl-prev-rekomend btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-0 translate-middle"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-left  fa-fw"></i>
                </button>
                <button
                    class="btn-owl owl-next-rekomend btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-100 translate-middle"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-right fa-fw "></i>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('/dist/owl/owl.carousel.min.js') }}"></script>
    <script>
        $('.MyOwl-rekomend').owlCarousel({
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
        var owlRekomden = $('.MyOwl-rekomend');
        owlRekomden.owlCarousel();
        // Go to the next item
        $('.owl-next-rekomend').click(function () {
            owlRekomden.trigger('next.owl.carousel');
        });
        // Go to the previous item
        $('.owl-prev-rekomend').click(function () {
            // With optional speed parameter
            // Parameters has to be in square bracket '[]'
            owlRekomden.trigger('prev.owl.carousel', [300]);
        });

        $(window).scroll(() => {
            var wScroller = $(this).scrollTop();
            if (wScroller > $('.productRec').offset().top - 300) {
                // console.log($('.product-recomended').offset().top);
                $('.productRec').removeClass('opacity-0');
                $('.productRec').addClass('animate__animated animate__fadeIn');
                $('.t-product-recomended-animated').each((i) => {
                    setTimeout(() => {
                        $('.t-product-recomended-animated').eq(i).removeClass('opacity-0');
                        $('.t-product-recomended-animated').eq(i).addClass('animate__animated animate__slideInUp');
                    }, 50 * i + 1);
                });
            }
        });
    </script>
</div>