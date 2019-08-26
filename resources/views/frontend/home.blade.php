<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Ecowash Launderette in Godalming</title>
</head>
<body>


    <header >
        <div class="main-header">
        <div class="main-header__logo">
            <img src="/images/ecowash-launderette-logo.png" alt="Ecowash launderette in Godalming">
        </div>
    </div>
    <div class="callout">Open daily from 7.30am to 8.30pm</div>
    </header>

    {{-- Main body --}}
    <div class="container">

        {{-- Slider --}}
        @include('frontend.sections.slider')

        {{-- Prices --}}
        @include('frontend.sections.prices')

        {{-- Promotion 1 --}}
        @include('frontend.sections.promotion')

        {{-- Service washes --}}
        @include('frontend.sections.serviceWashes')

        {{-- Promotion 2 --}}
        @include('frontend.sections.promotion2')

        {{-- Find us --}}
        @include('frontend.sections.findUs')

    </div>


    {{-- Footer --}}
    <footer>
            <div class="footer">
                <div class="footer__container">
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

</body>
</html>