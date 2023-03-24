@extends('auth.layouts.panel')

@section('head')
    <title>kopitu - Selemat datang di kopitu e-store</title>
@endsection

@section('pages')
    <div class="box-auth">
        <div class="box-head text-center pt-5">
            <div class="lh-sm mb-4">
                @if ($user->avatar === 'sample-avatar.png')
                <img src="{{ url('/images/avatar/'. $user->avatar) }}" alt="{{ $user->username }}" width="64px" height="64px" class="rounded-circle mb-2">
                @else
                <img src="{{ url('/images/avatar/user/'. $user->avatar) }}" alt="{{ $user->username }}" width="64px" height="64px" class="rounded-circle mb-2">
                @endif
                <p class="fw-bold mb-0">{{ $user->username }}</p>
                <p class="fw-bold text-secondary">{{ $user->email }}</p>
            </div>
            {{-- <h3 class="text-orange fw-bold">PASSWORD BARU</h3> --}}
            <p class="mb-0">Password baru kamu harus berbeda dari akun password sebelumnya.</p>
        </div>
        <div class="box-body pt-3 pb-4">
            <form method="POST" action="{{ route('password.post.reset.action') }}">
                @csrf
                <div class="mb-2">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill"
                        id="Password" placeholder="Password">
                </div>
                <div class="mb-4">
                    <input name="password_confirmation" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror rounded-pill"
                        placeholder="Confirmation Password">
                </div>
                <input type="hidden" class="d-none" name="id_users" value="{{ $user->id_users }}">
                <button type="submit" class="btn btn-orange form-control rounded-pill my-3">RESET PASSWORD</button>
            </form>
        </div>
    </div>    
@endsection

@section('script')
    
@endsection