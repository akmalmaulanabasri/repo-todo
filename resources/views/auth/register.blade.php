<!doctype html>
<html lang="en">

<head>
    <title>MyBook | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets') }}/bootstrap/css/style.css">
</head>

<body style="background: #2CA58D;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Welcome To MyBook app</h3>
                                    <h5 class="mb-4">Daftar</h5>
                                </div>
                            </div>
                            <form action="{{ route('register-register') }}" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <input name="username" type="text" class="form-control" value="{{ old('username') }}" autofocus required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
								<div class="form-group mt-3">
                                    <input name="nama" type="text" class="form-control" value="{{ old('nama') }}" required>
                                    <label class="form-control-placeholder" for="nama">Nama</label>
                                </div>
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
								<div class="form-group mt-3">
                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group mt-2">
                                    <input name="password" id="password-field" type="password" class="form-control"
                                        required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
                                </div>
                            </form>
                            <p class="text-center">Sudah punya akun? <a data-toggle="tab" href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
