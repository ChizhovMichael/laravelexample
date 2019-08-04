<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Карта</title>
    <meta name="description" content="Карта">
    <meta name="keywords" content="Карта">

    <!-- Headbase -->

    @include('includes.head')

</head>

<body>

    @include('includes.nav')

    <div class="pt-em-5 pb-em-5 pr-5 pl-5 col-12">
        <h1 class="mb-0 cm">Корзина</h1>
        <h3 class="mt-0">Сумма покупок</h3>
        <p class="cc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, deserunt!</p>

        @if ($agent->isDesktop())

        <div class="col-12 pt-em-1 pb-em-2 pr-em-4 pl-em-4 shadow-xs bc-light b4 mt-em-4 mb-em-4">
            <div class="flex-center-between">
                <div class="text-right col-2"></div>
                <div  class="text-right col-3">
                    <p class="cc">Название</p>
                </div>
                <div class="text-right col-2">
                    <p class="cc">Количество</p>
                </div>
                <div class="text-right col-2">
                    <p class="cc">Цена</p>
                </div>
                <div class="text-right col-2">
                    <p class="cc">Сумма</p>
                </div>
            </div>
            @foreach ($cartContent as $item)
            <div class="flex-center-between mt-em-1">
                <div class="flex-center-center text-right col-2 pr-em-1 pl-em-1">
                    <img class="col-12" src="/img/products/{{ $item->options->company }}/{{ $item->options->matrix }}/m{{ $item->options->img }}" alt="Запчасти для телевизоров, название товара + артикул">
                </div>
                <div  class="text-right col-3">
                    <a href="#" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>                    
                </div>
                <div  class="text-right col-2">
                    <p class="cc mt-1 mb-1">{{ $item->qty }}</p>
                </div>
                <div  class="text-right col-2">
                    <p class="cc mt-1 mb-1">{{ $item->price }}</p>
                </div>
                <div  class="text-right col-2">
                    <h6 class="ct mt-1 mb-1">{{ $item->subtotal }}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 pt-em-1 pb-em-1 pr-em-4 pl-em-4 shadow-xs bc-light b4 mt-em-4 mb-em-4">
            <div class="pt-2 pb-2 flex-center-end">
                <div class="col-2">
                    <p class="cc">Сумма заказа:</p>
                </div>
                <div class="col-2 text-right">
                    <h6 class="ct mt-em-1 mb-em-1">{!! $cart['cart_total'] !!} &#x20bd;</h6>
                </div>
            </div>
        </div>

        @else

        <div class="sd-12 pt-em-3 pb-em-3 pr-em-2 pl-em-2 shadow-xs b4 mt-em-3 mb-em-3 bc-light">
            @foreach ($cartContent as $item)
            <div class="flex mb-em-2 pb-em-2 bb-light">
                <div class="mt-em-1 sd-12">
                    <img class="sd-12 b4" src="/img/products/{{ $item->options->company }}/{{ $item->options->matrix }}/m{{ $item->options->img }}}" alt="Запчасти для телевизоров, название товара + артикул">
                </div>
                <div class="mt-em-1 sd-12">
                    <a href="#" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>
                </div>
                <div class="mt-em-1 sd-12">
                    <p class="cc m-0">{{ $item->price }}&nbsp;&#x20bd; за 1 шт</p>
                </div>
                <div class="mt-em-1 sd-12">
                    <p class="cc m-0">{{ $item->qty }}шт</p>
                </div>
                <div class="mt-em-1 sd-12">
                    <h6 class="ct m-0">Сумма: {{ $item->subtotal }}&nbsp;&#x20bd;</h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="sd-12 pr-em-2 pl-em-2 shadow-xs b4 mt-em-3 mb-em-3 bc-light flex-between">
            <p class="cc m-5">Сумма покупки:</p> 
            <h6 class="ct m-5">{!! $cart['cart_total'] !!}&nbsp;&#x20bd;</h6>
        </div>

        @endif

        <div class="text-right">
            <form action="#">
                <input type="hidden">

                <button class="back-main col-2 sd-6 b5 pt-1 pb-1 b-main shadow c-p">
                    <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                </button>
            </form>
            
        </div>
    </div>

    @include('includes.footer')

</body>

</html>