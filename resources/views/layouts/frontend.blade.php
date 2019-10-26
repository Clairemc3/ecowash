<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/frontend.css">
    <title>Ecowash @yield('title')</title>
    <script src="https://kit.fontawesome.com/82ef6072c7.js" crossorigin="anonymous"></script>
</head>
<body>


<button id="scrollToTop" title="Go to top"><i class="fas fa-chevron-up"></i></button>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

@auth
    @include('backend.partials.navbar', ['withoutMenu' => true])
@endauth


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
            <div class="left">Open daily from 7.30am to 8.30pm</div>
            <div class="right">
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
                        <i class="fab fa-facebook"></i>
                    </div>
                    
                    <div class="footer__address">
                        <span>Farncombe Street,</span>
                        <span>near Godalming,</span>
                        <span>GU7 3AZ</span>
                        <span>Tel: 01483 415149</span>
                        <span>Email: ecowash@btinternet.com</span>
                    </div>
                </div>
            </div>
    </footer>
    <script src="js/app.js"></script>
</body>
</html>