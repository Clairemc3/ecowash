<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Ecowash admin - @yield('title')</title>
    <script src="https://kit.fontawesome.com/82ef6072c7.js" crossorigin="anonymous"></script>
</head>
<body>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


@section('sideBar')
    <header>
    </header>
@show
    {{-- Main body --}}
    <div class="container">
        @yield('content')
    </div>


    {{-- Footer --}}
    <footer>
           
    </footer>
    <script src="js/app.js"></script>
</body>
</html>