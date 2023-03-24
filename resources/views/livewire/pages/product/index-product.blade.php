<div>
    {{-- <div class="d-flex flex-row mb-3">
        <div class="position-relative flex-fill">
            <input wire:model="search" class="form-control pe-5 rounded" placeholder="Cari Produk Terbaru">
            <span class="btn px-3 position-absolute top-0 end-0" id="basic-addon2">
                <i class="fas fa-search fa-fw"></i>
            </span>
        </div>
        <div class="dropstart ms-2">
            <a class="btn btn-outline-secondary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-bars fa-fw"></i>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a wire:click='page(12)' class="dropdown-item" href="#">8 page</a></li>
                <li><a wire:click='page(30)' class="dropdown-item" href="#">30 page</a></li>
                <li><a wire:click='page(50)' class="dropdown-item" href="#">50 page</a></li>
                <li><a wire:click='page(1)' class="dropdown-item" href="#">Semua page</a></li>
            </ul>
        </div>
        <button wire:click='sort' class="btn btn-outline-secondary ms-2" type="button">
            @if ($sort === 'asc')
            <i class="fas fa-sort-alpha-down fa-fw"></i>
            @else
            <i class="fas fa-sort-alpha-up fa-fw"></i>
            @endif
        </button>
    </div> --}}


    @if($product->count() != 0)
    <div class="row g-3 mb-4">
        @foreach($product as $dt)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" wire:loading.remove>
                <img src="{{ url('/images/product/' . $dt->images) }}" class="card-img-top" alt="...">
                <div class="card-body p-2">
                    <p class="fw-bold text-ellipsis text-capitalize lh-sm mb-1">{{ $dt->product_name }}</p>
                    <p class="card-text text-danger mb-1">Rp. {{ number_format($dt->price,0,',','.') }}</p>
                    <small class="d-block">
                        <span class="d-block mb-1"><i class="far fa-map-marker-check"></i> Jakarta Pusat</span>
                        <span class="d-block">Terjual @if($dt->sold) {{ $dt->sold }} @else 0 @endif</span>
                    </small>
                    <a href="{{ route('product.detail', ['slug' => $dt->slug]) }}" class="stretched-link"></a>
                </div>
            </div>
            <div wire:offline wire:loading.block>
                <div class="card" aria-hidden="true">
                    <div class="placeholder bg-secondary w-100" style="height: 170px;"></div>
                    <div class="card-body p-2 placeholder-glow">
                        <p class="placeholder bg-secondary col-12 py-3 mb-1"></p>
                        <p class="placeholder bg-secondary col-8"></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <!-- pagenations -->
        @if ($product->hasPages())
        {{ $product->links('livewire.pages.product.product-paginations') }}
        @endif
    </div>
    @else
    <div class="d-flex align-items-center justify-content-center bg-white rounded shadow p-3">
        <div class="d-block text-center">
            <i class="fas fa-box fa-2x fa-fw mb-3"></i>
            <p class="fs-3 fw-bold mb-0">Oops</p>
            <p class="fs-3 text-capitalize">Maaf produk tidak dapat ditemukan</p>
        </div>
    </div>
    @endif
</div>
