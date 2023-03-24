<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="safna prasetiono">
    <meta name="description"
        content="Kopitu E-store is a B2B E-Store Platform that provides solutions through the latest technology and features to assist MSMEs in developing their business. Kopitu E-Store Provides thousands of products at wholesale prices from hundreds of trusted and leading and curated suppliers.">
    <meta name="keywords"
        content="kopitu, kopitu e-store, e-store, kopitu umkm, kopitu e-store umkm, kopitu e-store global, best kopitu e-store in indonesia, kopitu e-store for umkm, Kopitu e-store is a place for shopping belonging to umkm, Kopitu e-store for shopping, kopitu shopping, kopitu e-store shopping">
    <link rel="alternate" type="application/rss+xml" title="Indonesia's Best B2B E-Store Platform for UMKM">

    <meta name="msapplication-navbutton-color" content="#dd894c">
    <meta name="apple-mobile-web-app-status-bar-style" content="#dd894c">
    <link rel="icon" type="image/png" href="{{url('/images/logo/kopitu-estore.png')}}" />

    <title>kopitu - wellcome to kopitu e-store</title>
    <link rel="stylesheet" href="{{ url('/dist/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/index/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/animated.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap">

    <style>
        /* * {
            font-family: 'Noto Sans', sans-serif;
            font-size: 100;
        } */
        .navbar {
            background-color: #fe9514 !important;
        }

        .banner {
            background: url('/images/banner/kopitu-index-banner.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 340px;
            margin-bottom: 3rem;
        }

        .my-links {
            color: #ee9005;
            text-decoration: none;
            align-items: center;
        }

        .my-links:hover {
            color: #aa6431;
        }

        .my-links:hover>.my-img {
            transition: all 0.3s;
            border-color: #ee9005 !important;
        }

        .my-links:hover>.my-img img {
            transition: linear all 0.3s;
            transform: rotateY(360deg);
        }

        .my-links .my-img {
            width: 82px;
            height: 82px;
            margin-bottom: 12px;
            border: 2px solid #0002;
            border-radius: 50%;
        }

        .footer {
            background-color: #ee9005;
            color: #fff;
        }

        @media(max-width: 576px) {
            .banner {
                height: 160px;
            }

            .my-links {
                display: flex !important;
                align-items: center;
                justify-content: left;
                padding: 4px 2rem 4px 1rem;
                margin-bottom: 0.5rem;
                border: 1px solid #0002;
                border-radius: 4px;
            }

            .my-links .my-img {
                width: 52px;
                height: 52px;
                padding: 12px !important;
                border: 0px !important;
                padding: 0.4rem !important;
                margin-bottom: 0px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}"
                style="margin-top: -4px; margin-bottom: -4px;">
                <img src="{{asset('/images/logo/kopitu-estore.png')}}" alt="logo" width="46px">
                <div class="lh-sm ms-2">
                    <p class="fw-bold mb-0" style="margin-bottom: -20px">Kopitu E-Store</p>
                    <small class="d-block text-light" style="font-size: 14px">B2B Platform</small>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fas fa-phone fa-sm fa-fw"></i>
                            +62 813-1173-6178
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="banner">
        </div>

        <div class="container mb-5">
            <div class="d-block text-center pb-4">
                <h1>Wellcome to Kopitu E-Store</h1>
                <h3 class="text-secondary mx-2 mx-md-5 fw-light">Your preferred online shopping platform. Kopitu e-store
                    offers a seamless, fun and reliable shopping experience to millions of users worldwide.<br>Choose a
                    country or region.</h3>
            </div>
        </div>
        <div class="container pb-5 mb-5">
            <div class="row g-1 gx-sm-4 gy-sm-5 justify-content-center">

                {{-- indonesia --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow" href="https://kopitu.com/">
                        <img src="{{ url('/images/region/indonesia.png') }}" class="card-img-top rounded-circle"
                            alt="indonesia">
                    </a>
                </div>
                {{-- Australia --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow btn-maintenance" href="#">
                        <img src="{{ url('/images/region/australia.png') }}" class="card-img-top rounded-circle"
                            alt="Australia">
                    </a>
                </div>
                {{-- Jepang --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow btn-maintenance" href="#">
                        <img src="{{ url('/images/region/japan.png') }}" class="card-img-top rounded-circle"
                            alt="Jepang">
                    </a>
                </div>
                {{-- Korea --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow btn-maintenance" href="#">
                        <img src="{{ url('/images/region/korea.png') }}" class="card-img-top rounded-circle"
                            alt="Korea">
                    </a>
                </div>
                {{-- Polandia --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow" href="https://kopitu.pl">
                        <img src="{{ url('/images/region/poland.png') }}" class="card-img-top rounded-circle"
                            alt="Polandia">
                    </a>
                </div>
                {{-- Amerika --}}
                <div class="col-12 col-sm-4 col-md-3 col-lg-2">
                    <a class="my-links d-block rounded-circle shadow btn-maintenance" href="#">
                        <img src="{{ url('/images/region/amerika.png') }}" class="card-img-top rounded-circle"
                            alt="Amerika">
                    </a>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="py-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-12 col-md-8">
                        <span class="d-block fw-bold fs-5 mb-2">Kopitu E-Store</span>
                        <p class="mb-4">Kopitu e-store is an online shopping place that provides various kinds of UMKM
                            products with the best quality product choices.</p>
                        <div class="d-flex mb-2">
                            <i class="fas fa-phone fa-fw"></i>
                            <p class="mb-0 ms-2">+62 813-1173-6178</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="fas fa-envelope fa-fw"></i>
                            <p class="mb-0 ms-2">info@kopitu.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="fas fa-map-marked fa-fw"></i>
                            <p class="mb-0 ms-2">SOHO Podomoro City (SOHO Apartement/Residence) No.Unit 3211, Lt. 32 Tg
                                Duren Selatan Podomoro City, Jakarta Barat 11470</p>
                        </div>
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
                            <a class="nav-link py-0 px-0 me-3" href="#">
                                <img src="{{ url('/images/index/facebook.png') }}" alt="facebook" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0 me-3" href="#">
                                <img src="{{ url('/images/index/twitter.png') }}" alt="twitter" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0 me-3" href="#">
                                <img src="{{ url('/images/index/instagram.png') }}" alt="instagram"
                                    class="rounded-circle" width="36px" height="36px">
                            </a>
                            <a class="nav-link py-0 px-0" href="#">
                                <img src="{{ url('/images/index/telegram.png') }}" alt="telegram" class="rounded-circle"
                                    width="36px" height="36px">
                            </a>
                        </nav>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-phone fa-lg fa-fw"></i>
                        <div class="ms-2">
                            <small>Kontak kopitu</small>
                            <p class="text-light">+6281325199663</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white text-dark py-3">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ url('/images/index/kopitu-estore.png') }}" alt="" width="24px">
                    <small class="ms-2">
                        Sopported komite pengusaha mikro kecil menengah indonesia bersatu (KOPITU).
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script src="{{ url('/dist/assets/js/popper.js') }}"></script>
    <script src="{{ url('/dist/app/js/app.js') }}"></script>
    <script src="{{ url('/dist/assets/js/alert.js') }}"></script>
    <script src="{{ asset('/dist/owl/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/dist/assets/js/index.js') }}"></script>

    <script>
        $('.btn-maintenance').click((e) => {
            e.preventDefault();
            Swal.fire(
                'kopitu e-store',
                'this project is under development',
                'warning'
            )
        });
    </script>
</body>

</html>