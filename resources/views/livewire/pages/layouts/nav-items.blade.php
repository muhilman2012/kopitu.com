<div>
    <div class="row gx-0 gy-md-3">
        @foreach ($ctg_sub as $index => $getItems)
        <div class="col-12 col-md-6 col-lg-4">
            <a class="d-block fw-bold text-decoration-none text-orange px-3 py-1 ps-4 ps-md-3 mb-0 text-capitalize"
                href="{{ route('product.category', ['ctg' => $getItems->slug_sub]) }}">
                <small>{{ $getItems->categories_sub }}</small>
            </a>
            <nav class="nav flex-column py-0">
                @foreach ($childData[$getItems->id_categories_sub] as $items)
                <a class="nav-link ctg-link-child py-0 px-3 ps-4 ps-md-3 text-capitalize bd-highlight" aria-current="page" href="{{ route('product.category', ['ctg' => $items->slug_child]) }}">
                    <small>{{ $items->categories_child }}</small>
                </a>
                @endforeach
            </nav>
        </div>
        @endforeach
    </div>
</div>