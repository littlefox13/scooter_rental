<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
        <link rel="stylesheet" href="/css/app.css"/>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @include('top_menu')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
