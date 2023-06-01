<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Admin Endless Creative</title>
    <link rel="icon" href="/img/endlesss logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/logintemplate/assets/css/login.css">


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="/img/endlesss.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <p class="login-card-description">REGISTRASI ADMIN ENDLESS CREATIVE</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="sr-only">
                                    </label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">{{ __('Email Address') }}
                                    </label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only"></label>
                                    <input type="password" name="password_confirmation" id="password"
                                        class="form-control" placeholder="Konfirmasi Password">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-4">
                                    {{ __('REGISTER') }}
                                </button>
                                <div>
                                    <a href="{{ url('login') }}"
                                        class="text-reset- btn btn-block login-btn mb-4">{{ __('KEMBALI') }}</a>
                                </div>
                            </form>

                            <br>
                            @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
