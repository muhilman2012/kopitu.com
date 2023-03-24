<div>
    <div class="py-2 py-md-4">
        <div class="container">
            <div class="py-2">
                <h4 class="text-capitalize text-orange fw-light mb-0">Kebutuhan Bisnis</h4>
            </div>
            <div class="owl-carousel navOwl owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage py-1">
                        @foreach ($data as $item)    
                        <div class="owl-item">
                            <div class="position-relative bg-orange-gradient rounded p-3" style="width: 260px">
                                <a href="{{ route('product.category', ['ctg' => $item->slug]) }}" class="stretched-link text-white text-decoration-none text-truncate">{{ $item->categories }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button
                    class="btn-owl owl-prev-nav btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-0 translate-middle"
                    style="height: 32px; width: 32px;">
                    <i class="fas fa-angle-left  fa-fw"></i>
                </button>
                <button
                    class="btn-owl owl-next-nav btn btn-outline-orange d-none d-md-block p-0 rounded-circle position-absolute top-50 start-100 translate-middle"
                    style="height: 32px; width: 32px;">
                    <i class="fas fa-angle-right fa-fw "></i>
                </button>
            </div>
        </div>
    </div>
</div>
