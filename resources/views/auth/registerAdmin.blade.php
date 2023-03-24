<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kopitu - Registry administrator</title>
    <link rel="stylesheet" href="{{ url('/dist/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/icons/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('/dist/assets/css/authAdmin.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <div class="box-registry">
        <div class="box-head-registery">
            <h3>REGISTER</h3>
            <p class="mb-0">Wellcome in register admins pages</p>
        </div>
        <div class="box-body-registery">
            <form method="POST" action="{{ route('admin.register.store') }}">
                @csrf
                <div class="row mb-3 gx-5">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input name="username" type="text" id="username"
                                class="form-control form-input  @error('username') is-invalid @enderror"
                                placeholder="Your Name" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email Address</label>
                            <input name="email" type="email" id="email"
                                class="form-control form-input @error('email') is-invalid @enderror" id="Email"
                                placeholder="Your Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" id="password"
                                class="form-control form-input @error('password') is-invalid @enderror" id="Password"
                                placeholder="Your Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_c" class="form-label">Confirmation Password</label>
                            <input name="password_confirmation" type="password" id="password_c"
                                class="form-control form-input @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirmation your password">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input name="phone" type="text" id="phone"
                                class="form-control form-input  @error('phone') is-invalid @enderror"
                                placeholder="Your Number Phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Date of Birth</label>
                            <input name="born" type="date"
                                class="form-control form-input @error('born') is-invalid @enderror" id="born"
                                placeholder="Your date of birth" value="{{ old('born') }}">
                            @error('born')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country"
                                class="form-select form-input @error('country') is-invalid @enderror"
                                aria-label="Default select example">
                                <option value="">Select your country</option>
                                <option value="id" @if(old('country') === "id") selected @endif>Indonesia</option>
                                <option value="aus" @if(old('country') === "aus") selected @endif>Australia</option>
                                <option value="kor" @if(old('country') === "kor") selected @endif>Korea</option>
                                <option value="jpn" @if(old('country') === "jpn") selected @endif>Jepang</option>
                            </select>
                            @error('country')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input name="address" type="text" name="address" id="address"
                                class="form-control form-input @error('address') is-invalid @enderror"
                                placeholder="Alamat" value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary px-5 ">DAFTAR</button>
                </div>
            </form>
        </div>
        <div class="box-footer-registery">

        </div>
    </div>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script src="{{ url('/dist/assets/js/popper.js') }}"></script>
    <script src="{{ url('/dist/app/js/app.js') }}"></script>
    <script src="{{ url('/dist/assets/js/alert.js') }}"></script>
    @livewireScripts

</body>

</html>