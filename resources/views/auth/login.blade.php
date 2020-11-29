<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta http-equiv="Content-Security-Policy"
        content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://platform.linkedin.com ">
    <title>CARtel</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf
        <div class="text-center mb-4">
            <h1 class="h1 mb-3 font-weight-bold">CARtel</h1>
            <p>Login to continue</p>
        </div>

        <div class="form-label-group">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email"
                autofocus>
            <label for="inputEmail">Email address</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-label-group">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" name="password" required autocomplete="current-password">
            <label for="inputPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="text-center">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
    </form>
</body>

</html>