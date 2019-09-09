<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Телезапчасти</title>
    <meta name="description" content="Телезапчасти">
    <meta name="keywords" content="Телезапчасти">

    <!-- Headbase -->

    @include('includes.head')

    <link rel="stylesheet" href="{{ URL::asset('css/flickity/flickity.css') }}">
    <script src="{{ URL::asset('js/flickity/flickity.js') }}"></script>

</head>

<body>
    @include('includes.nav')

    <div class="slider-full">
        <div class="carousel" data-flickity='{ "contain": true, "prevNextButtons": false, "pageDots": false, "adaptiveHeight": true, "fade": true, "setGallerySize": false, "autoPlay": 3000 }'>
            <div class="carousel-cell">

            </div>
            <div class="carousel-cell">

            </div>
            <div class="carousel-cell">

            </div>
        </div>
    </div>
    @include('includes.features')
    <div class="tab-card pt-em-6 pb-em-6 pl-5 pr-5">
        <div class="tabs js-tabs">
            <ul role="tablist" class="tabs__tab-list flex m-0">
                <li role="presentation" class="bb-light">
                    <a href="#main" role="tab" aria-controls="main" class="tabs__trigger js-tab-trigger block hover-main pt-em-1 pb-em-1 pr-em-2 pl-em-2">Main Платы</a>
                </li>
                <li role="presentation" class="bb-light">
                    <a href="#power" role="tab" aria-controls="power" class="tabs__trigger js-tab-trigger block hover-main pt-em-1 pb-em-1 pr-em-2 pl-em-2">Блоки питания</a>
                </li>
                <li role="presentation" class="bb-light">
                    <a href="#led" role="tab" aria-controls="led" class="tabs__trigger js-tab-trigger block hover-main pt-em-1 pb-em-1 pr-em-2 pl-em-2">LED подсветки</a>
                </li>
            </ul>
            <div id="main" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_main as $part)
                    <div class="card__item">
                        <div class="product__item rel c-p pt-em-4 flex-center-center text-center b5 {{ $part->stock }}">
                            <div class="product_image flex-center-center">
                                <img class="block col-12 rel b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                            </div>
                            <div class="product_content col-12">
                                <div class="product_price mt-em-1">
                                    <h6 class="ct mt-em-1 mb-em-1">
                                        {{ $part->part_cost }}&nbsp;&#x20bd;
                                        <span class="cc ml-em-1">{{ $part->price }}</span>
                                    </h6>
                                </div>
                                <div class="product_name">
                                    <p class="block pr-em-1 pl-em-1">{{ $part->company }} {{ $part->tv_model }}</p>
                                    <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}" class="hover-main block pr-em-1 pl-em-1 wwbw">{{ $part->part_model }}</a>
                                </div>
                                <div class="product_extras col-12 back-body hide">
                                    @if($part->part_status == 0)
                                    <a class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5" href="{{ route('addproduct', [ 'id' => $part->id, 'qty' => 1 ]) }}">
                                        <img src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                    </a>
                                    @else 
                                    <span class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5 cb">
                                        Нет в наличии
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <ul class="product_marks">
                                <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
                                <li class="product_marks__item product_new">new</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <div id="power" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_power as $part)
                    <div class="card__item">
                        <div class="product__item rel c-p pt-em-4 flex-center-center text-center b5 {{ $part->stock }}">
                            <div class="product_image flex-center-center">
                                <img class="block col-12 rel b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                            </div>
                            <div class="product_content col-12">
                                <div class="product_price mt-em-1">
                                    <h6 class="ct mt-em-1 mb-em-1">
                                        {{ $part->part_cost }}&nbsp;&#x20bd;
                                        <span class="cc ml-em-1">{{ $part->price }}</span>
                                    </h6>
                                </div>
                                <div class="product_name">
                                    <p class="block pr-em-1 pl-em-1">{{ $part->company }} {{ $part->tv_model }}</p>
                                    <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}" class="hover-main block pr-em-1 pl-em-1 wwbw">{{ $part->part_model }}</a>
                                </div>
                                <div class="product_extras col-12 back-body hide">
                                    @if($part->part_status == 0)
                                    <a class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5" href="{{ route('addproduct', [ 'id' => $part->id, 'qty' => 1 ]) }}">
                                        <img src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                    </a>
                                    @else 
                                    <span class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5 cb">
                                        Нет в наличии
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <ul class="product_marks">
                                <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
                                <li class="product_marks__item product_new">new</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="led" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_led as $part)
                    <div class="card__item">
                        <div class="product__item rel c-p pt-em-4 flex-center-center text-center b5 {{ $part->stock }}">
                            <div class="product_image flex-center-center">
                                <img class="block col-12 rel b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                            </div>
                            <div class="product_content col-12">
                                <div class="product_price mt-em-1">
                                    <h6 class="ct mt-em-1 mb-em-1"> 
                                        {{ $part->part_cost }}&nbsp;&#x20bd;
                                        <span class="cc ml-em-1">{{ $part->price }}</span>
                                    </h6>
                                </div>
                                <div class="product_name">
                                    <p class="block pr-em-1 pl-em-1">{{ $part->company }} {{ $part->tv_model }}</p>
                                    <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}" class="hover-main block pr-em-1 pl-em-1 wwbw">{{ $part->part_model }}</a>
                                </div>
                                <div class="product_extras col-12 back-body hide">
                                    @if($part->part_status == 0)
                                    <a class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5" href="{{ route('addproduct', [ 'id' => $part->id, 'qty' => 1 ]) }}">
                                        <img src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                    </a>
                                    @else 
                                    <span class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5 cb">
                                        Нет в наличии
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <ul class="product_marks">
                                <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
                                <li class="product_marks__item product_new">new</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="back-back-add pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
            <h4 class="m-0">Горячее предложение</h4>
        </div>
        <div class="flex-between">
            @foreach($products_discount as $part)
            <div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel {{ $part->stock }}">
                <div class="np__image col-5 sd-5 flex-center-center">
                    <img class="col-12 sd-12 b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                </div>
                <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
                    <p class="block pr-em-2 pl-em-2">{{ $part->company }} {{ $part->tv_model }}</p>
                    <a class="block hover-main pr-em-2 pl-em-2 wwbw" href="{{ route('product.show', ['slug' => $part->part_link ]) }}">{{ $part->part_model }}</a>
                    <h6 class="ct mt-em-1 mb-em-1 pr-em-2 pl-em-2">
                        {{ $part->part_cost }}&nbsp;&#x20bd;
                        <span class="cc ml-em-1">{{ $part->price }}&nbsp;&#x20bd;</span>
                    </h6>
                </div>
                <ul class="product_marks">
                    <li class="product_marks__item product_new">new</li>
                    <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    <div class="back-body new pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
            <h4 class="m-0">Новые поступления</h4>
        </div>
        <div class="flex-between">
            @foreach($products_new as $part)
            <div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel {{ $part->stock }}">
                <div class="np__image col-5 sd-5 flex-center-center">
                    <img class="col-12 sd-12 b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                </div>
                <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
                    <p class="block pr-em-2 pl-em-2">{{ $part->company }} {{ $part->tv_model }}</p>
                    <a class="block hover-main pr-em-2 pl-em-2 wwbw" href="{{ route('product.show', ['slug' => $part->part_link ]) }}">{{ $part->part_model }}</a>
                    <h6 class="ct mt-em-1 mb-em-1 pr-em-2 pl-em-2">
                        {{ $part->part_cost }}&nbsp;&#x20bd;
                        <span class="cc ml-em-1">{{ $part->price }}&nbsp;&#x20bd;</span>
                    </h6>
                </div>
                <ul class="product_marks">
                    <li class="product_marks__item product_new">new</li>
                    <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
    <div class="slider-full">
        <div class="carousel" data-flickity='{ "contain": true, "prevNextButtons": false, "pageDots": false, "adaptiveHeight": true, "fade": true, "setGallerySize": false, "autoPlay": 3000 }'>
            <div class="carousel-cell">

            </div>
            <div class="carousel-cell">

            </div>
            <div class="carousel-cell">

            </div>
        </div>
    </div>
    <div class="pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="p-em-2 back-body shadow col-7 sd-12 b8">
            <h1>
                <span>запчасти для телевизоров</span>
                Телезапчасти
            </h1>
            <p class="cc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


    @include('includes.footer')
</body>

</html>