<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta http-equiv="Content-Security-Policy"
        content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://js.stripe.com/v3/ ">

    <title>Checkout || {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->

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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Custom styles for this template -->
</head>

<body class="bg-light" id="app">
    <div class="container">
        <div class="py-5 text-center">
            @if(session('success') || session('error') || count($errors) > 0)
            <div class="container my-5">
                @include('layouts/messages')
            </div>
            @endif
            <h2>Invoice</h2>
            <p class="lead">Thank you for your order!.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Purchase</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">{{$order->product->name}}</small>
                        </div>
                        <span class="text-muted">{{$order->product->price}}</span>
                    </li>



                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>{{$order->product->price}}</strong>
                    </li>
                </ul>
            </div>
        </div>

        <div class="justify-content-center">
            <a href="/" class="btn btn-link">Continue shopping</a>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2020</p>
        </footer>
    </div>
</body>

</html>