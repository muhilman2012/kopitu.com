<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrator</title>
    <link rel="stylesheet" href="{{ url('/dist/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/icons/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/authAdmin.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <div class="box-auth">
        <div class="box-head">
            <h3>LOGIN</h3>
            <p class="mb-0">Wellcome login admins pages</p>
        </div>
        <div class="box-body">
            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <div class="mb-2">
                    <label for="Email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="Email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="Password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary form-control">LOGIN</button>
            </form>
        </div>
        <div class="box-footer">

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

</body>

</html>
