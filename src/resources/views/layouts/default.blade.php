<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('token', '')
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css">
        <title>Quick Shop - @yield('title', 'Welcome')</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">Quick Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                </ul>

                <a href="/account" class="mr-3"><i class="fas fa-user fa-lg text-white"></i></a>
                <a href="/cart" class="ml-3 mr-2"><i class="fas fa-shopping-cart fa-lg text-white"></i></a>
            </div>
        </nav>

        <div class="@yield('container', 'container') my-4 py-2">

            @include('flash::message')
            @include('partials.errors')
            @yield('content')

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script>
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(5000).slideUp(350);
        </script>

        @yield('pagejs', '')
        @yield('template', '')
    </body>
</html>
