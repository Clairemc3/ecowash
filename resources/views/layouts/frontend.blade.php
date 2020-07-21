<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <title>Ecowash @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/82ef6072c7.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div id="app">
        <button id="scrollToTop" title="Go to top"><i class="fas fa-chevron-up"></i></button>
        <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

        @auth
            @include('backend.partials.navbar', ['withAdminSidebar' => false])
        @endauth


        <div @auth class="mt-65px" @endauth>
            {{-- Alert block and modal --}}
            @includeWhen($alert, 'frontend.partials.alert')
            @section('mainMenu')
                <header>
                    <div class="main-header">
                        <div class="main-header__top">
                            <div class="main-header__logo">
                                <img src="/images/ecowash-launderette-logo.png" alt="Ecowash launderette in Godalming">
                                <span class="main-header__tagline">a coin operated self service launderette</span>
                            </div>

                            <div id="menuToggle" data-target="#mainNavMenu">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>

                        <div class="main-header__navigation" id="mainNavMenu">
                            <ul class="main-nav__links">
                                <li><a href="">Home</a> </li>
                                <li><a href="#findUs">Find us</a></li>
                                <li><a href="#prices">Prices</a></li>
                                <li><a href="#serviceWash">Service wash</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="topline container">
                        <div class="topline__left">Open daily from 7.30am to 8.30pm <br> (except Xmas day)</div>
                        <div class="topline__right">
                            <span class="review-text">Rated 4.7 by our customers</span>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>

                        </div>
                    </div>
                </header>
            @show
                {{-- Main body --}}
                <div class="container">
                    @yield('content')
                </div>


                {{-- Footer --}}
                <footer>
                    <div class="footer">
                        <div class="footer__container">

                            <div class="social-icons">
                                <a href="https://www.facebook.com/Farncombe.Surrey" target="_blank"><i class="fab fa-facebook"></i></a>
                            </div>

                            <div class="footer__address">
                                <span>Farncombe Street,</span>
                                <span>near Godalming,</span>
                                <span>GU7 3AZ</span>
                                <span>Tel: 07547 774630</span>
                                <span>Tel: 01483 415149</span>
                                <span>Email: ecowash@btinternet.com</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
