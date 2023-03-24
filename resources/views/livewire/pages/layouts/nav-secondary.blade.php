<div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header py-2 px-4">
            <span class="mb-0 mt-1 fw-bold">Menu Utama</span>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-2 pt-1 pb-4">
            <div class="d-block p-3 mb-4">
                @auth ('user')
                <div class="d-flex position-relative">
                    @if (auth('user')->user()->avatar == 'sample-avatar.png')
                    <img src="{{ url('/images/avatar/' . auth('user')->user()->avatar) }}" alt="user_photos"
                        class="rounded-circle mb-md-3" width="42px" height="42px">
                    @else
                    <img src="{{ url('/images/avatar/user/' . auth('user')->user()->avatar) }}" alt="user_photos"
                        class="rounded-circle mb-md-3" width="42px" height="42px">
                    @endif
                    <div class="d-block ms-2 ms-md-0">
                        <p class="fw-bold text-capitalize lh-sm mb-0">{{ auth('user')->user()->username }}</p>
                        <small class="m-0 text-secondary text-truncate">{{ auth('user')->user()->email }}</small>
                    </div>
                    <a href="{{ route('user.index') }}" class="position-absolute top-0 end-0 mt-1 px-0">
                        <i class="fas fa-cog fa-lg fa-fw"></i>
                    </a>
                </div>
                @else
                <div class="row">
                    <div class="col-6">
                        <a href="{{route('register')}}" class="btn btn-outline-secondary form-control">DAFTAR</a>
                    </div>
                    <div class="col-6">
                        <a href="{{route('login')}}" class="btn btn-outline-primary form-control">MASUK</a>
                    </div>
                </div>
                @endauth
            </div>
            @auth('user')
            <div class="mb-3">
                <span class="fw-bold p-3">Aktivitas Saya</span>
                <nav class="nav flex-column">
                    <a class="nav-link link-dark" href="#">Daftar Transaksi</a>
                    <a class="nav-link link-dark" href="#">Wishlist</a>
                    <a class="nav-link link-dark" href="#">Ulasan</a>
                </nav>
            </div>
            @endauth
            <div class="mb-3">
                <span class="fw-bold p-3">Main Menu</span>
                <nav class="nav flex-column" id="acorCategory">
                    <a class="nav-link link-dark" aria-current="page" href="{{ route('index') }}">Beranda</a>
                    <a class="nav-link link-dark d-flex" href="#" data-bs-toggle="collapse" data-bs-target="#category">
                        Kategori
                        <i class="fas fa-angle-down ms-auto fa-fw"></i>
                    </a>
                    <div id="category" class="accordion-collapse collapse" data-bs-parent="#acorCategory">
                        @foreach ($ctg as $index => $item)
                        <a class="accordion-button acr-btn ps-4" href="#" data-bs-toggle="collapse"
                            data-bs-target="#ctg-{{ $index }}">
                            {{ $item->categories }}
                        </a>
                        <div id="ctg-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#category">
                            @livewire('pages.layouts.nav-items', ['post' => $item->id_categories])
                        </div>
                        @endforeach
                    </div>
                    <a class="nav-link link-dark" href="{{ route('index.berita') }}">Berita</a>
                    <a class="nav-link link-dark" href="{{ route('index.info.enabler') }}">Enabler</a>
                    <a class="nav-link link-dark" href="#">Barang & Jasa LKPP</a>
                    <a class="nav-link link-dark" href="{{ route('index.aboutme') }}">Tentang Kami</a>
                </nav>
            </div>
            <div class="mb-3">
                <span class="fw-bold p-3">Pusat Bantuan</span>
                <nav class="nav flex-column">
                    <a class="nav-link link-dark" href="#">Pesanan Dikomplain</a>
                    <a class="nav-link link-dark" href="#">Hubungi Kami</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="navbar-orange alert-secondary d-none d-md-block">
        <div class="container">
            <nav class="nav py-2">
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('index') }}">BERANDA</a>
                </li>
                <li class="nav-items categories">
                    <div class="nav-link text-white" href="#" id="btnCategories" role="button"
                        data-bs-toggle="dropdown">
                        KATEGORI
                    </div>
                    <div id="categories-menu" class="categories-menu">
                        <div class="d-flex h-100">
                            <div class="categories-main">
                                <div class="nav flex-column" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach ($ctg as $index => $item)
                                    <a href="#" class="nav-link link-orange px-3 @if($index == 0) active @endif"
                                        data-bs-toggle="pill" data-bs-target="#indexs-{{ $index }}" type="button"
                                        role="tab">
                                        <img src="{{ url('/images/product/category/' . $item->icons ) }}" alt=""
                                            width="24px">
                                        <small class="ms-2">{{ $item->categories }}</small>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="categories-sub">
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($ctg as $index => $item)
                                    <div class="tab-pane fade @if($index == 0) show active @endif"
                                        id="indexs-{{ $index }}" role="tabpanel">
                                        <div class="py-2">
                                            @livewire('pages.layouts.nav-items', ['post' => $item->id_categories])
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('index.berita') }}">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('index.info.enabler') }}">ENABLER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('index.info.service.product') }}">BARANG & JASA
                        LKPP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('index.aboutme') }}">TENTANG KAMI</a>
                </li>
            </nav>
        </div>
    </div>

    {{-- <div id="categories-menu" class="categories-menu">
        <div class="container bg-white shadow rounded px-0 overflow-hidden">
            <div class="d-flex">
                <div class="categories-main">
                    <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($ctg as $index => $item)
                        <a href="#" class="nav-link link-orange px-3 @if($index == 0) active @endif"
                            data-bs-toggle="pill" data-bs-target="#indexs-{{ $index }}" type="button" role="tab">
                            <img src="{{ url('/images/product/category/' . $item->icons ) }}" alt="" width="24px">
                            <span class="ms-2">{{ $item->categories }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="categories-sub">
                    <div class="tab-content" id="myTabContent">
                        @foreach ($ctg as $index => $item)
                        <div class="tab-pane fade @if($index == 0) show active @endif" id="indexs-{{ $index }}"
                            role="tabpanel">
                            <div class="py-2">
                                @livewire('pages.layouts.nav-items', ['post' => $item->id_categories])
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="">
        <div class="container rounded shadow p-4">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-4">
                            <ul class="nav flex-column">
                                @foreach ($ctg as $item)
                                <li class="nav-item">
                                    <a class="nav-link link-secondary px-0"
                                        href="{{ route('product.ctg', ['ctg' => $item->categories]) }}">{{
                                        $item->categories }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="nav flex-column">
                                @foreach ($ctg as $item)
                                <li class="nav-item">
                                    <a class="nav-link link-secondary px-0"
                                        href="{{ route('product.ctg', ['ctg' => $item->categories]) }}">{{
                                        $item->categories }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="nav flex-column">
                                @foreach ($ctg as $item)
                                <li class="nav-item">
                                    <a class="nav-link link-secondary px-0"
                                        href="{{ route('product.ctg', ['ctg' => $item->categories]) }}">{{
                                        $item->categories }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-block position-relative">
                        <img src="{{ url('/images/banner/banner-menu.png') }}" alt="banner-menu" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script>
        // $('.drop-ctg').hover(function(){
        //     $('.toggle-ctg').click(); 
        //     console.log("oke");
        // })
    </script>
</div>