<div>
    <div class="container">
        <div class="d-flex mb-3 py-2">
            <div class="col">
                <h4 class="text-capitalize text-orange fw-light mb-0">Produk Terbaik</h4>
                <p class="text-secondary mb-0">Produk Terbaik dari KOPITU E-Store.</p>
            </div>
            <a href="{{ route('product') }}" class="btn btn-outline-orange btn-sm px-3 align-self-center rounded-pill">
                Semua <i class="fal fa-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="owl-carousel MyOwl owl-theme owl-loaded">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    @foreach ($promo as $item)                        
                    <div class="owl-item py-1">
                        <div class="card border-0 shadow-box" style="width: 200px;">
                            <a href="{{ route('product.detail', ['slug' => $item->slug]) }}" class="text-decoration-none">
                                <img src="{{ url('/images/product/'. $item->images) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a class="fw-bold text-ellipsis mb-1 link-orange-dark" href="{{ route('product.detail', ['slug' => $item->slug]) }}">
                                    {{ $item->product_name }}
                                </a>
                                    <p class="text-danger fw-bold mb-3">Rp. {{number_format($item->price,0,',','.')}}</p>
                                    <a href="#" class="btn btn-outline-orange btn-sm px-4"> + Keranjang</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <button
                    class="btn-owl owl-prev position-absolute d-none d-sm-block btn btn-outline-orange rounded-3 top-50 start-0 translate-middle-y p-0 ms-2"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-left  fa-fw"></i>
                </button>
                <button
                    class="btn-owl owl-next position-absolute d-none d-sm-block btn btn-outline-orange rounded-3 top-50 end-0 translate-middle-y p-0 me-2"
                    style="height: 42px; width: 42px;">
                    <i class="fas fa-angle-right fa-fw "></i>
                </button>
            </div>
        </div>
    </div>
</div>