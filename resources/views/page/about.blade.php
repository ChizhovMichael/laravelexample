<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>О нас</title>
    <meta name="description" content="Карта">
    <meta name="keywords" content="Карта">

    <!-- Headbase -->

    @include('includes.head')

</head>

<body>

    @include('includes.nav')
    @if ($agent->isDesktop())
        @include('includes.features')
    @endif
    <div class="pr-10 pl-10 flex-between mt-em-5 mb-em-10">
        <div class="col-5 sd-12">
            <h1>О Телезапчасти</h1>
            <p class="cc col-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum enim. In massa tempor nec feugiat. Nunc aliquet bibendum enim facilisis gravida. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Amet luctus venenatis lectus magna fringilla. Volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque in. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Sagittis orci a scelerisque purus semper eget duis. Nulla pharetra diam sit amet nisl suscipit. Sed adipiscing diam donec adipiscing tristique risus nec feugiat in. Fusce ut placerat orci nulla. Pharetra vel turpis nunc eget lorem dolor. Tristique senectus et netus et malesuada.</p>
        </div>
        <div class="col-5 sd-12 flex-center-center">
            <img src="{{ asset('img/icon/logo_tv.png') }}" alt="Телезапчасти, Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
        </div>
    </div>


    @include('includes.footer')

</body>

</html>