<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Telezapchasti.ru - Запчасти для телевизоров. Корзина</title>
    <meta name="description" content="Telezapchasti.ru - продажа запчастей для телевизоров, запчасти для телевизоров. Корзина. Телезапчасти, запчасти для телевизоров спб, Telezapchasti.ru отзывы">
    <meta name="keywords" content="телезапчасти рф, Telezapchasti.ru отзывы, запчасти для телевизоров купить, купить запчасти для телевизоров, телезапчасти купить, телезапчасти интернет магазин, запчасти для телевизора lg, запчасти для телевизора самсунг, запчасти для телевизора samsung, запчасти для телевизора лджи">

    <meta name="robots" content="index, follow">

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
                <div class="text-right col-3">
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
            <div class="flex-center-between mt-em-1 destroyContainer">
                <div class="flex-center-center text-right col-2 pr-em-1 pl-em-1">
                    @if($item->options->get('company') == NULL)
                    <img class="sd-12 b4" src="/img/sets/{{ $item->options->img }}" alt="Запчасти для телевизоров, название товара + артикул">
                    @else
                    <img class="sd-12 b4" src="/img/products/{{ $item->options->company }}/{{ $item->options->tv }}/m{{ $item->options->img }}" alt="Запчасти для телевизоров, название товара + артикул">
                    @endif
                </div>
                <div class="text-right col-3">
                    @if($item->options->get('company') == NULL)
                    <a href="{{ route('set.show', [ 'slug' => $item->options->part_link ]) }}" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>
                    @else
                    <a href="{{ route('product.show', [ 'slug' => $item->options->part_link ]) }}" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>
                    @endif
                </div>
                <div class="text-right col-2">
                    <p class="cc mt-1 mb-1">{{ $item->qty }}</p>
                </div>
                <div class="text-right col-2">
                    <p class="cc mt-1 mb-1">{{ $item->price }}</p>
                </div>
                <div class="text-right col-2">
                    <h6 class="ct mt-1 mb-1 rel">{{ $item->subtotal }}
                        <a href="{{ route('cart.destroy', [ 'cart_id' => $item->rowId ]) }}" class="destroy flex-center shadow-xs">
                            <img class="sd-12 col-12" src="{{ asset('img/icon/cancel.svg') }}" alt="delete">
                        </a>
                    </h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 pt-em-1 pb-em-1 pr-em-4 pl-em-4 shadow-xs bc-light b4 mt-em-4 mb-em-4">
            <div class="flex-center-end">
                <div class="col-2 br-light bb-light">
                    <p class="cc">Сумма заказа:</p>
                </div>
                <div class="col-3 text-right">
                    <h6 class="ct m-0">{!! $cart['cart_total'] !!} &#x20bd;</h6>
                </div>
            </div>
            <div class="flex-center-end">
                <div class="col-2 br-light">
                    <p class="cc">Доставка:</p>
                </div>
                <div class="col-3 text-right">
                    <p class="cc">Варианты доставки будут представлены при оформлении заказа</p>
                </div>
            </div>
        </div>

        @else

        <div class="sd-12 pt-em-3 pb-em-3 pr-em-2 pl-em-2 shadow-xs b4 mt-em-3 mb-em-3 bc-light">
            @foreach ($cartContent as $item)
            <div class="flex mb-em-2 pb-em-2 bb-light">
                <div class="mt-em-1 sd-12">
                    @if($item->options->get('company') == NULL)
                    <img class="sd-12 b4" src="/img/sets/{{ $item->options->img }}" alt="Запчасти для телевизоров, название товара + артикул">
                    @else
                    <img class="sd-12 b4" src="/img/products/{{ $item->options->company }}/{{ $item->options->tv }}/m{{ $item->options->img }}" alt="Запчасти для телевизоров, название товара + артикул">
                    @endif
                </div>
                <div class="mt-em-1 sd-12">
                    @if($item->options->get('company') == NULL)
                    <a href="{{ route('set.show', [ 'slug' => $item->options->part_link ]) }}" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>
                    @else
                    <a href="{{ route('product.show', [ 'slug' => $item->options->part_link ]) }}" class="cc mt-1 mb-1 hover-main">{{ $item->options->type }} {{ $item->name }}</a>
                    @endif
                </div>
                <div class="mt-em-1 sd-12">
                    <p class="cc m-0">{{ $item->price }}&nbsp;&#x20bd; за 1 шт</p>
                </div>
                <div class="mt-em-1 sd-12">
                    <p class="cc m-0">{{ $item->qty }}шт</p>
                </div>
                <div class="mt-em-1 sd-12">
                    <h6 class="ct m-0 rel sd-6">Сумма: {{ $item->subtotal }}&nbsp;&#x20bd;
                        <a href="{{ route('cart.destroy', [ 'cart_id' => $item->rowId ]) }}" class="destroy flex-center shadow-xs">
                            <img class="sd-12 col-12" src="{{ asset('img/icon/cancel.svg') }}" alt="delete">
                        </a>
                    </h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="sd-12 pr-em-2 pl-em-2 shadow-xs b4 mt-em-3 mb-em-3 bc-light flex-between">
            <p class="cc m-5">Сумма покупки:</p>
            <h6 class="ct m-5">{!! $cart['cart_total'] !!}&nbsp;&#x20bd;</h6>
        </div>
        <div class="sd-12 pr-em-2 pl-em-2 shadow-xs b4 mt-em-3 mb-em-3 bc-light flex-between">
            <p class="cc m-5">Доставка:</p>
            <p class="cc m-5">Варианты доставки будут представлены при оформлении заказа</p>
        </div>
        

        @endif

        <div class="flex-center-end">
            <a class="block text-center back-main col-2 sd-6 b5 pt-1 pb-1 b-main shadow c-p" href="{{ route('checkout') }}">
                <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
            </a>
        </div>
    </div>

    @include('includes.footer')

</body>

</html>