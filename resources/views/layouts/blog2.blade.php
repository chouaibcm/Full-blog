<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/zakem1.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/zakem1.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/zakem1.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/styles/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');

    </script>
    <style>
        .fifty-chars {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light navbar-stick-dark pb-10" data-navbar="sticky">
        <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img class="logo-dark" src="{{ asset('img/zakem1.png') }}" width="200" height="200" alt="logo">
                </a>
            </div>

            <section class="navbar-mobile">
                <span class="navbar-divider d-mobile-none"></span>

                <ul class="nav nav-navbar">


                </ul>
            </section>
            <!--<a class="btn btn-xs btn-round btn-success mr-2" href="{{ route('register') }}">Registre</a>

        <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">Login</a>-->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item mr-2">
                        <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-xs btn-round btn-success mr-2" href="{{ route('register') }}">Registre</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: black" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Home
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </nav><!-- /.navbar -->

    <div class="mobile-menu-overlay"></div>

    
<!--<div class="layout-centered bg-img" style="background-image: url({{asset('img/5.jpg')}}) ;">-->
<div class="" style="color: gainsboro">  
    <div class="container">
        <div class="height-100-p pt-20">
            @yield('content')
            <div class="footer-wrap pd-20 mb-20 card-box">
                <div class="container">
                    <div class="row gap-y align-items-center">

                        <div class="col-6 col-lg-3">
                            <a href="/"><img src="{{ asset('img/zakem2.png') }}" width="200" height="200"
                                    alt="logo"></a>
                        </div>

                        <div class="col-6 col-lg-3 text-right order-lg-last">
                            <div class="social">
                                <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i
                                        class="fa fa-facebook"></i></a>
                                <a class="social-twitter" href="https://twitter.com/thethemeio"><i
                                        class="fa fa-twitter"></i></a>
                                <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i
                                        class="fa fa-instagram"></i></a>
                                <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i
                                        class="fa fa-dribbble"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- js -->
    <script src="{{ asset('backend/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('backend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('backend/vendors/scripts/layout-settings.js') }}"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ec131ceffee777f"></script>
</body>

</html>
