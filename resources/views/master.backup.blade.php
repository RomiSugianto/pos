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
                            <a href="sales">Sales</a>
                            <a href="outlet">Outlet</a>
                            <a href="product">Product</a>
                            <a href="payment">Payment Method</a>
                            <a href="salestransaction">Sales Transaction</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="flex-center position-ref">
            <div class="content">
                <div class="m-b-md">
                    @yield('content')
                </div>
            </div>
        </div>

        <div>
            <footer>
                <p>&copy; 2020</p>
            </footer>
        </div>
    </body>
</html>
