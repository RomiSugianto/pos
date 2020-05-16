<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>POS</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <script src="{{asset('assets/jquery/jquery-3.4.1.slim.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="links">
                            <a href="{{ url('sales') }}">Sales</a>
                            <a href="{{ url('salesoutlet') }}">Outlet</a>
                            <a href="{{ url('product') }}">Product</a>
                            <a href="{{ url('paymentmethod') }}">Payment Method</a>
                            <a href="{{ url('salestransaction') }}">Sales Transaction</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

        <div>
            <footer>
                <p>&copy; copyrights 2020</p>
            </footer>
        </div>
    </body>
</html>
