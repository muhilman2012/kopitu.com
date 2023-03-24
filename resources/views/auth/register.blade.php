@extends('auth.layouts.panel')

@section('head')
<title>KOPITU - Selamat Datang di KOPITU E-Store</title>
@endsection

@section('pages')
<div class="box-auth">
    <div class="box-head">
        <h3 class="text-orange fw-bold">DAFTAR</h3>
        <p class="mb-0">Selamat Datang di KOPITU E-Store</p>
    </div>
    <div class="box-body">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="mb-2">
                <input name="username" type="text" class="form-control  @error('username') is-invalid @enderror"
                    placeholder="Username">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="Email"
                    placeholder="Email Address">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="Password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <input name="password_confirmation" type="password" name="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="Confirmation Password">
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-orange form-control">REGISTER</button>
        </form>
    </div>
    <div class="box-footer">
        <div class="d-block mb-3 text-center text-secondary">
            <span>-- OR --</span>
        </div>
        <div class="d-block mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('login.google') }}" class="btn btn-outline-orange align-items-center w-100">
                    <img src="{{ url('/images/icons/google.png') }}" alt="google" width="24px"> Login dengan google
                </a>
            </div>
        </div>
        <div class="d-block text-center text-secondary">
            <p class="mb-0">Sudah Punya Akun?</p>
            <a href="{{ route('login') }}" class="link-orange text-decoration-none text-uppercase">LOGIN</a>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection