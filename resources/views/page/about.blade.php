<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Телезапчасти.рф - Запчасти для телевизоров. О компании</title>
    <meta name="description" content="Телезапчасти.рф - продажа запчастей для телевизоров, запчасти для телевизоров, телезапчасти, запчасти для телевизоров спб, телезапчасти.рф отзывы">
    <meta name="keywords" content="телезапчасти рф, телезапчасти.рф отзывы, запчасти для телевизоров купить, купить запчасти для телевизоров, телезапчасти купить, телезапчасти интернет магазин, запчасти для телевизора lg, запчасти для телевизора самсунг, запчасти для телевизора samsung, запчасти для телевизора лджи">

    
    <meta name="robots" content="index, follow">

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
            {!! $statictext->get('about')->value !!}
        </div>
        <div class="col-5 sd-12 flex-center-center">
            <img src="{{ asset('img/icon/logo_tv.png') }}" alt="Телезапчасти, Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
        </div>
    </div>


    @include('includes.footer')

</body>

</html>