@extends('auth.layouts.panel')

@section('head')
    <title>kopitu - Selemat datang di kopitu e-store</title>
@endsection

@section('pages')
    <div class="box-auth">
        <div class="box-head text-center">
            <img src="{{ url('/images/banner/password.png') }}" alt="" width="70%" class="mb-4">
            <h3 class="text-orange fw-bold">LUPA PASSWORD</h3>
            <p class="mb-0">Tidak perlu khawatir, akun kamu tetap aman <br> Rubah password dan amankan akun kamu</p>
        </div>
        <div class="box-body pb-4">
            <form method="POST" action="{{ route('password.post') }}">
                @csrf
                <div class="mb-4">
                    {{-- <label for="Email" class="form-label">Email address</label> --}}
                    <input name="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="Email" placeholder="Email Address">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-orange form-control rounded-pill">UBAH PASSWORD</button>
            </form>
        </div>
    </div>    
@endsection

@section('script')
    
@endsection