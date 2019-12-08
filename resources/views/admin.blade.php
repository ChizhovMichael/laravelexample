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


    <div class="flex-between pr-5 pl-3 pt-5 pb-5 full-height">
        <div class="col-2 sd-12">
            <a href="{{ route('admin.navigation') }}" class="button__trigger @if(Request::is('admin/navigation') || Request::is('admin/navigation/*')) active @endif">Навигация</a>
            <a href="{{ route('admin.contact') }}" class="button__trigger @if(Request::is('admin/contact') || Request::is('admin/contact/*')) active @endif">Контакты</a>
            <a href="{{ route('admin.order') }}" class="button__trigger @if(Request::is('admin/order') || Request::is('admin/order/*')) active @endif">Заказы</a>
            <a href="{{ route('admin.sales') }}" class="button__trigger @if(Request::is('admin/sales') || Request::is('admin/sales/*')) active @endif">Продажи</a>
            <a href="{{ route('admin.getoffer') }}" class="button__trigger @if(Request::is('admin/getoffer') || Request::is('admin/getoffer/*')) active @endif">Нашли дешевле</a>
            <a href="{{ route('admin.box') }}" class="button__trigger @if(Request::is('admin/box') || Request::is('admin/box/*')) active @endif">Коробки</a>
            <a href="{{ route('admin.buyup') }}" class="button__trigger @if(Request::is('admin/buyup') || Request::is('admin/buyup/*')) active @endif">Скупка</a>
            <a href="{{ route('main') }}" class="button__trigger">На главную</a>
            <a class="button__trigger"  href="{{ route('logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Выход</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="col-10 sd-12 @if($agent->isDesktop()) pl-5 @endif ">
            @include('admin.'. $page)
        </div>
    </div>

    @if(session('success'))
        @component('components.message')
            @slot('title')
                {!! session('success') !!}
            @endslot

            {!! session('message') !!}

        @endcomponent
    @endif


</body>

</html>