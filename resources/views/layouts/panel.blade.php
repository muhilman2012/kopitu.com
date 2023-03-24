<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="author" content="safna prasetiono">
    <meta name="description" content="Kopitu E-store adalah sebuah Platform E-Store B2B yang memberikan solusi melalui teknologi dan fitur terkini untuk membantu umkm dalam mengembangkan bisnisnya. Kopitu E-Store Menyediakan ribuan produk harga grosir dari ratusan pemasok terpercaya dan terkemuka dan Terkurasi.">
    <meta name="keywords" content="kopitu, kopitu e-store, e-store, kopitu umkm, kopitu e-store umkm, kopitu e-store indonesia, kopitu e-store terbaik indonesia, kopitu e-store milik umkm, kopitu e-store tempat belanja milik umkm, kopitu e-store tempat belanja, kopitu belanja, kopitu e-store belanja">
    <link rel="alternate" type="application/rss+xml" title="Platform E-Store B2B Terbaik Indonesia untuk UMKM">

    <meta name="msapplication-navbutton-color" content="#dd894c" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#dd894c" />
    <link rel="icon" type="image/png" href="{{asset('/images/logo/kopitu-estore.png')}}" />
    @yield('head')
    <link rel="stylesheet" href="{{ url('/dist/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/icons/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/animated.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}"
                style="margin-top: -4px; margin-bottom: -4px;">
                <img src="{{asset('/images/logo/kopitu-estore.png')}}" alt="logo" width="46px">
                <div class="lh-sm ms-2">
                    <p class="fw-bold mb-0" style="margin-bottom: -20px">KOPITU E-Store</p>
                    <small class="d-block text-secondary" style="font-size: 14px">B2B Platform</small>
                </div>
            </a>
            <div class="d-block d-md-none ms-auto">
                <a href="#" class="btn btn-not-abf px-1" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <a href="{{ route('cart') }}" class="btn btn-not-abf px-2 position-relative">
                    <i class="fas fa-shopping-cart fa-fw"></i>
                    @if(session('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2"
                        style="margin-left: -8px">
                        {{ count(session('cart')) }}
                    </span>
                    @endif
                </a>
                <button class="btn btn-not-abf pe-1" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-bars fa-lg fa-fw"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-md">
                <ul class="navbar-nav align-items-center ms-auto">
                    <li class="nav-item me-3">
                        <form method="GET" action="{{ route('product.search') }}">
                            <div class="d-flex position-relative">
                                <input type="text" name="src" class="form-control" style="padding-right: 42px"
                                    placeholder="Cari Produk">
                                <button type="submit" class="btn position-absolute top-0 end-0">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active position-relative" aria-current="page" href="{{ route('cart') }}">
                            <i class="far fa-shopping-bag fa-lg fa-fw"></i>
                            @if(session('cart') && count(session('cart')) > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2"
                                style="margin-left: -4px">
                                {{ count(session('cart')) }}
                            </span>
                            @endif
                        </a>
                    </li>
                    <div class="vr mx-4"></div>
                    @auth('user')
                    <li class="nav-item">
                        <a href="{{ route('user.wishlist') }}" class="nav-link text-dark">
                            <i class="far fa-heart fa-lg fa-fw text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="far fa-bell fa-lg fa-fw"></i>
                            {{-- <i class="far fa-heart fa-lg fa-fw text-dark"></i> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="far fa-envelope fa-lg fa-fw"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link text-dark">
                            @if (auth('user')->user()->avatar == 'sample-avatar.png')
                            <img class="rounded-circle"
                                src="{{ url('/images/avatar/' . auth('user')->user()->avatar) }}" alt="user"
                                width="28px" height="28px">
                            @else
                            <img class="rounded-circle"
                                src="{{ url('/images/avatar/user/' . auth('user')->user()->avatar) }}" alt="user"
                                width="28px" height="28px">
                            @endif
                        </a>
                    </li>
                    @else
                    <li class="nav-item me-2">
                        <a href="{{ route('register')  }}" class="btn btn-outline-orange rounded px-3">DAFTAR</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-orange rounded px-4">MASUK</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @livewire('pages.layouts.nav-secondary')


    @yield('pages')


    <footer class="footer">
        <div class="py-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-12 col-md-6">
                        <span class="d-block fw-bold fs-5 mb-2">KOPITU E-Store</span>
                        <p class="mb-4">KOPITU E-Store merupakan Tempat Berbelanja Online yang Menyedikan berbagai macam
                            Produk UMKM dengan Kualitas Produk pilihan Terbaik.</p>
                        <div class="d-flex mb-2">
                            <i class="fas fa-phone fa-fw"></i>
                            <p class="mb-0 ms-2">+62 851-7326-5221</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="fas fa-envelope fa-fw"></i>
                            <p class="mb-0 ms-2">info@kopitu.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="fas fa-map-marked fa-fw"></i>
                            <p class="mb-0 ms-2">Soho Podomoro City (Soho Residence) Unit 3829, Lt. 38, Tanjung Duren Selatan, Jakarta, Indonesia 114700</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <span class="d-block fw-bold fs-5">Produk</span>
                        <nav class="nav flex-column">
                            <a class="nav-link footer-link" href="{{ route('product') }}">Produk terbaru</a>
                            <a class="nav-link footer-link" href="#">Produk Rekomendasi</a>
                            <a class="nav-link footer-link" href="#">Spesial Promo</a>
                            <a class="nav-link footer-link" href="{{ route('product') }}">Semua Produk</a>
                        </nav>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <span class="d-block fw-bold fs-5">Informasi</span>
                        <nav class="nav flex-column">
                            <a class="nav-link footer-link" href="#">Cara Belanja</a>
                            <a class="nav-link footer-link" href="#">Informasi Pengiriman</a>
                            <a class="nav-link footer-link" href="{{ route('index.trems.conditions') }}">Syarat &
                                ketentuan</a>
                            <a class="nav-link footer-link" href="{{ route('index.policy') }}">Kebijakan Privasi</a>
                            <a class="nav-link footer-link" href="{{ route('index.aboutme') }}">Tentang Kami</a>
                        </nav>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <span class="d-block fw-bold fs-5">Layanan</span>
                        <nav class="nav flex-column">
                            <a class="nav-link footer-link" href="{{ route('index.info.fulfillment') }}">Fullfilment</a>
                            <a class="nav-link footer-link" href="{{ route('index.info.enabler') }}">Enabler</a>
                            <a class="nav-link footer-link" href="https://kopitupreneur.com/" target="blank">KOPITUPRENEUR</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <hr class="soft mb-0">
        <div class="d-block py-3">
            <div class="container">
                <div class="d-flex flex-column flex-lg-row justify-content-center justify-content-md-between">
                    <div class="text-white">
                        <nav class="nav justify-content-center mb-3 mb-lg-0">
                            <a class="nav-link py-0 px-0 me-3" href="https://www.facebook.com/profile.php?id=100083699826897" target="blank">
                                <img src="{{ url('/images/icons/facebook.png') }}" alt="Facebook" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0 me-3" href="#">
                                <img src="{{ url('/images/icons/twitter.png') }}" alt="facebook" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0 me-3" href="https://www.instagram.com/kopitu_estore/" target="blank">
                                <img src="{{ url('/images/icons/instagram.png') }}" alt="Instagram"
                                    class="rounded-circle" width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0" href="#">
                                <img src="{{ url('/images/icons/telegram.png') }}" alt="facebook" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-phone fa-lg fa-fw"></i>
                        <div class="ms-2">
                            <small>Kontak KOPITU</small>
                            <p class="text-light">+62 851-7326-5221</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white text-orange py-3">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ url('/images/logo/kopitu-estore.png') }}" alt="" width="24px">
                    <small class="ms-2">
                        Supported by Komite Pengusaha Mikro Kecil Menengah Indonesia Bersatu (KOPITU).
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="GET" action="{{ route('product.search') }}">
                    <div class="d-flex position-relative">
                        <input type="text" name="src" class="form-control" style="padding-right: 42px"
                            placeholder="Search...">
                        <button type="submit" class="btn position-absolute top-0 end-0">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                {{-- <form action="#">
                    <input type="text" class="form-control form-control-lg" placeholder="Pencarian Product...">
                </form> --}}
            </div>
        </div>
    </div>

    <div class="menu-balloon">
        <div class="dropstart">
            <button class="btn btn-menu-fixed" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fab fa-whatsapp fa-2x fa-fw"></i>
            </button>
            <div class="contact-menu dropdown-menu animate__animated animate__fadeInUp"
                aria-labelledby="dropdownMenuButton1">
                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6285173265221" target="blank">
                    <div class="d-flex align-items-center">
                        <img src="{{ url('/images/logo/kopitu-estore.png') }}" alt="logos" width="32px">
                        <div class="ms-2">
                            <p class="fw-bold mb-0">Kopitu E-Store</p>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6285173265221" target="blank">
                    <div class="d-flex align-items-center">
                        <img src="{{ url('/images/logo/kopitu.png') }}" alt="logos" width="32px">
                        <div class="ms-2">
                            <p class="fw-bold mb-0">Kopitu UMKM</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script src="{{ url('/dist/assets/js/popper.js') }}"></script>
    <script src="{{ url('/dist/app/js/app.js') }}"></script>
    <script src="{{ url('/dist/assets/js/alert.js') }}"></script>
    <script src="{{ asset('/dist/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/dist/assets/js/index.js') }}"></script>
    @livewireScripts
    @yield('script')

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get("success") }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps...!',
            text: '{{ session()->get("error") }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
    @endif

</body>

</html>