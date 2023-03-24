<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <link rel="stylesheet" href="{{ url('/dist/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/icons/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/enabler/panel.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <div class="wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
            <div class="container-fluid">
                <button class="btn btn-default" id="btn-slider" type="button">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand me-auto text-danger" href="#">Dash<span class="text-warning">Board</span></a>
                <ul class="nav ms-auto">
                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa fa-bell fa-lg py-2" aria-hidden="true"></i>
                            <span class="badge bg-danger">10</span>
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom align-items-cente mb-2">
                                <i class="fa fa-bell me-3" aria-hidden="true"></i>
                                <span class="fw-bold lh-1">Notifikasi</span>
                            </div>
                            <a class="dropdown-item py-2 overflow-hidden text-truncate" href="#">
                                <p class="lh-1 mb-0 fw-bold">Sample</p>
                                <small class="content-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Quia sint laboriosam in architecto earum.</small>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3 pe-1" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <img src="{{ url('/images/avatar/admin/default.png') }}" alt="user" class="img-user">
                        </a>
                        <div class="dropdown-menu mt-2 pt-0" aria-labelledby="navbarDropdown">
                            <div class="d-flex p-3 border-bottom mb-2">
                                <img src="{{ url('/images/avatar/admin/default.png') }}" alt="user"
                                    class="img-user me-2">
                                <div class="d-block mt-1">
                                    <p class="fw-bold m-0 lh-1">Yourname</p>
                                    <small>Your email</small>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user fa-lg me-3" aria-hidden="true"></i>Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-cog fa-lg me-3" aria-hidden="true"></i>Setting
                            </a>
                            <hr class="dropdown-divider">
                            <a class="btnLogout dropdown-item" href="#">
                                <i class="fa fa-sign-out fa-lg me-2" aria-hidden="true"></i>LogOut
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="slider" id="sliders">
            <div class="slider-head">
                <div class="d-block p-3">
                    <img src="{{ url('/images/avatar/admin/default.png') }}" alt="user" class="slider-img-user mb-2">
                    <p class="fw-bold mb-0 lh-1 text-white">Yourname</p>
                    <small class="text-white">youremail</small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column" id="nav-acordion">
                    <a class="nav-link px-3 active" href="#">
                        <i class="fa fa-home box-icon" aria-hidden="true"></i>Home
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fas fa-user box-icon" aria-hidden="true"></i>Profile
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link pX-3" href="#">
                        <i class="fas fa-boxes box-icon"></i>Data Product
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fas fa-money-check-alt box-icon"></i>Transaction
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#">
                        <i class="fas fa-bell box-icon" aria-hidden="true"></i>Notifikasi
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fas fa-envelope box-icon" aria-hidden="true"></i>Message
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="#">
                        <i class="fas fa-file-alt box-icon fa-fw"></i>Laporan
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="btnLogout nav-link px-3" href="#">
                        <i class="fas fa-sign-out-alt box-icon"></i>LogOut
                    </a>
                </nav>
            </div>
        </div>

        <div class="main-pages">
            @yield('pages')
        </div>
    </div>

    <div class="slider-background" id="sliders-background"></div>
    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script src="{{ url('/dist/assets/js/popper.js') }}"></script>
    <script src="{{ url('/dist/app/js/app.js') }}"></script>
    <script src="{{ url('/dist/assets/js/alert.js') }}"></script>
    <script src="{{ url('/dist/assets/js/admin/panel.js') }}"></script>
    <script src="{{ url('/dist/assets/js/admin/chart.js') }}"></script>
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
        location.reload();
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