@extends('auth.layouts.panel')

@section('head')
    <title>kopitu - Selemat datang di kopitu enabler</title>
@endsection

@section('pages')
    <div class="box-auth">
        <div class="box-head">
            <h3 class="text-orange fw-bold">MASUK</h3>
            <p class="mb-0">Selamat datang di kopitu enabler</p>
        </div>
        <div class="box-body">
            <form method="POST" action="{{ route('login.post') }}">
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
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange form-control">LOGIN</button>
            </form>
        </div>
        <div class="box-footer">
            <div class="py-3">
                <p class="text-center mb-1">jika lupa password klik dibawah sini</p>
                <p class="text-center mb-0">
                    <a href="" class="link-orange text-decoration-none me-1">Get Password?</a>
                </p>
            </div>
        </div>
    </div>    
@endsection

@section('script')
    
@endsection