<div>
    <div class="container">
        <div class="row gy-3">
            <div class="col-12 col-lg-3 box-t-best-product opacity-0">
                <div id="carouselExampleDark" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    </div>
                    <div class="carousel-inner h-100">
                        <div class="carousel-item h-100 active">
                            <div class="banner-carousel-best py-5 px-4 h-100">
                                <h3 class="fw-light">Sepesial promo</h3>
                                <h3 class="fw-bold mb-3">Produk teh</h3>
                                <p class="mb-0 text-secondary">Mulai dari</p>
                                <h1>Rp 4.000</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 box-t-best-product opacity-0">
                <div class="d-flex mb-3 py-2">
                    <div class="col">
                        <h4 class="text-capitalize fw-light text-orange mb-0">Produk terbaik</h4>
                        <p class="text-secondary mb-0">Produk terbaik mingguan kopitu e-store.</p>
                    </div>
                    <a href="#" class="btn btn-outline-orange btn-sm px-3 align-self-center rounded-pill">
                        Semua <i class="fal fa-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="row g-3">
                    @foreach ($promo as $pr)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-box t-best-product-item opacity-0">
                            <img src="{{ url('/images/product/' . $pr->images) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="fw-bold text-ellipsis mb-1 link-orange-dark"
                                    href="{{ route('product.detail', ['slug' => $pr->slug]) }}">
                                    {{ $pr->product_name }}
                                </a>
                                <p class="text-danger fw-bold">Rp. {{ number_format($pr->price, '0', ',', '.') }}
                                </p>
                                <small class="d-block">
                                    <span class="d-block mb-1"><i class="far fa-map-marker-check"></i> Jakarta Pusat</span>
                                    <span class="d-block">Terjual {{ $pr->sold }}</span>
                                </small>
                                <a href="{{ route('product.detail', ['slug' => $pr->slug]) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>