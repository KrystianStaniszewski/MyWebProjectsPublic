<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{--<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="css/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/panier.js') }}"></script>
</head>

<header>
    <div class ="header">
        <ul>
            <li><a class="active" href="/catalogue">Liberty Commerce</a></li>
            <li><a class="log" href="/login">My Account</a></li>
            <li><a class="panier" href="/basket">Cart</a></li>
        </ul>
    </div>
    <div class ="header">
        <ul class="nav2">
            <li><a class="nav20" href="/catalogue">Catalog</a></li>
            <li><a class="nav20" href="/phone">Phone</a></li>
            <li><a class="nav20" href="/tablet">Tablet</a></li>
            <li><a class="nav20" href="/laptop">Laptop</a></li>
            <li><a class="nav20" href="/software">Software</a></li>
            <li><a class="nav20" href="/console">Console</a></li>
            <input type="text" id="navbar" placeholder="Search..">
            <li><a class="logout" href="/logout">Logout</a></li>
        </ul>
    </div>
</header>
<body onload="check_popup()">
@yield('content')
</body>



<footer>
    <section>
        <article>
            <div class="div_footer">
                <ul>
                    <li><a class="footerbf" href="about:blank" class="fb_tw" target="_blank"><img src="img/fb.png"  width="50px" height="50px"></a></li>
                    <li><a class="footertw" href="about:blank" class="fb_tw" target="_blank"><img src="img/twitter.png" width="50px" height="50px"></a></li>
                    <li><a class="footerinst" href="about:blank" class="fb_tw" target="_blank"><img src="img/insta.png" width="50px" height="50px"></a></li>
                    
                </ul>
            </div>
        </article>
    </section>
</footer>

</html>

