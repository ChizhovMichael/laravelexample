<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Телезапчасти</title>
        <meta name="description" content="Телезапчасти" />
        <meta name="keywords" content="Телезапчасти" />

        <meta name="robots" content="noindex">

        <!-- Headbase -->

        @include('includes.head')
    </head>
    <body>
        @include('includes.nav')

        <div>
            @yield('content')
        </div>

        @include('includes.footer')
    </body>
</html>