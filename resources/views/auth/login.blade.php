<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin Endless Creative Production</title>
    <link rel="icon" href="/img/endlesss logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/logintemplate/assets/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card text-center">
                <div class="row no-gutters">
                    {{-- <div class="col-md-5">
                        <img src="dist/img/WMU.png" alt="login" class="login-card-img"
                            style="width: 100px; height: 100px;">
                    </div> --}}
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="dist/img/WMU.png" alt="logo" class="logo"
                                    style="width: 100x; height: 100x;">
                                {{-- <span class="brand-name">WASKITA MEDIA UTAMA</span> --}}
                            </div>
                            {{-- <p class="login-card-description">LOGIN ADMIN</p> --}}
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group ">
                                    <label for="email" class="sr-only">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-4">
                                    LOGIN
                                </button>
                                <a href="{{ url('register') }}" class="btn btn-block login-btn mb-4">
                                    REGISTRASI</a>
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
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
