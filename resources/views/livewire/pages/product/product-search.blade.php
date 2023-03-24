<div>

    <div class="row g-3 mb-4">
        @foreach($product as $dt)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card" wire:loading.remove>
                <img src="{{ url('/images/product/' . $dt->images) }}" class="card-img-top" alt="...">
                <div class="card-body p-2">
                    <p class="fw-bold text-ellipsis text-capitalize lh-sm mb-1">{{ $dt->product_name }}</p>
                    <p class="card-text text-danger mb-1">Rp. {{ number_format($dt->price,0,',','.') }}</p>
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
        {{ $product->links('livewire.home.product-paginations') }}
        @endif

    </div>
</div>
