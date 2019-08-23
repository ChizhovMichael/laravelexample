<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Каталог</title>
    <meta name="description" content="Каталог">
    <meta name="keywords" content="Каталог">

    <!-- Headbase -->

    @include('includes.head')

    <script src="{{ URL::asset('js/noUiSlider/noUiSlider.js') }}"></script>

</head>

<body>

    @include('includes.nav')
    @if ($agent->isDesktop())
        @include('includes.features')
    @endif
    <div class="catalog @if($agent->isDesktop()) pt-0 @else pt-em-3 @endif  pr-5 pl-5 pb-em-5 flex-between">
        @if ($agent->isMobile())
        <div class="sorting__back fix sd-12 top-left "></div>
        <div class="sorting__wrapp fix sd-9 top-left ">
            @endif
            <div class="sorting col-3 sd-12 @if($agent->isMobile()) pt-em-3 pb-em-3 pr-7 pl-7 back-body @endif">

                @if ($agent->isMobile())
                <div class="sd-12 flex-center-between">
                    <div class="sd-9">
                        <h6 class="mt-em-1 mb-em-1 ct">Фильтры</h6>
                    </div>
                    <a class="sd-2" href="#" onclick="
                    event.preventDefault();
                    document.querySelector('.sorting__wrapp').classList.remove('active');
                    document.querySelector('.sorting__back').classList.remove('active')
                    "><img class="sd-12" src="{{ asset('img/icon/cancel.svg') }}" alt="cancel"></a>
                </div>
                @endif

                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <input type="checkbox" id="product" checked />
                    <label for="product" class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
                        Запчасти
                        <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="arrow">
                    </label>
                    <ul class="m-0 pr-em-2 pl-em-2">
                        @foreach($navigations as $item)
                        <li class="mt-1 mb-1">
                            <a class="block hover @if (Request::is('каталог/'.$item->slug )) active @endif" href="{{ route('category.show', ['part_types_id' => $item->slug ]) }}">{{ $item->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <input type="checkbox" checked />
                    <label class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
                        Бренд телевизора
                    </label>
                    <ul class="m-0 pr-em-2 pl-em-2">
                        @foreach($brand->splice(0, 7)->all() as $item)
                        <li class="mt-1 mb-1">
                            <div class="form-check">
                                <input class="form-check-input" data-form="brands-check" type="checkbox" @if(preg_match("/{$item->company}/i", $brands)) checked @endif value="{{ $item->company }}" id="{{ $item->company }}">
                                <span class="form-check-span"></span>
                                <label class="form-check-label" for="{{ $item->company }}">
                                    {{ $item->company }}
                                </label>
                            </div>
                        </li>
                        @endforeach
                        <div class="toggle__sorting">
                            @foreach($brand->all() as $item)
                            <li class="mt-1 mb-1">
                                <div class="form-check">
                                    <input class="form-check-input" data-form="brands-check" type="checkbox" @if(preg_match("/{$item->company}/i", $brands)) checked @endif value="{{ $item->company }}" id="{{ $item->company }}">
                                    <span class="form-check-span"></span>
                                    <label class="form-check-label" for="{{ $item->company }}">
                                        {{ $item->company }}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </div>


                        <form id="brands-check" action="{{ route( $route, [ 

                            'part_types_id' => $part_types_id,
                            'sort' => $sort,
                            'stock' => $stock,
                            'brands' => $brands,
                            'search' => $search

                            ]) }}" method="GET" style="display: none;">
                            @if ($sort) <input type="hidden" name="sort" value="{{ $sort }}"> @endif
                            <input type="hidden" class="brands-check" name="brands" value="{{ $brands }}">
                            @if ($stock) <input type="hidden" name="stock" value="{{ $stock }}"> @endif

                        </form>



                    </ul>
                    @if($brand->count() > 0)
                    <a href="#" class="toggle--content button__trigger"></a>
                    @endif
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <input type="checkbox" id="price" checked />
                    <label for="price" class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
                        Цена
                        <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="arrow">
                    </label>
                    <ul class="m-0 pr-em-2 pl-em-2 @if($from == $to) rel disable @endif">
                        <li class="mt-1 mb-1">
                            <div class="price">
                                <span id="from">{{ $from }} &#x20bd;</span>
                                <span> - </span>
                                <span id="to">{{ $to }} &#x20bd;</span>
                            </div>
                            <form action="{{ route( $route, [ 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => $stock, 'from' => $from, 'to' => $to, 'search' => $search ]) }}" method="GET">
                                @if ($sort) <input type="hidden" name="sort" value="{{ $sort }}"> @endif
                                @if ($brands) <input type="hidden" name="brands" value="{{ $brands }}"> @endif
                                @if ($stock) <input type="hidden" name="stock" value="{{ $stock }}"> @endif
                                <div class="multi-range">
                                    <input id="min" type="range" name="from" min="{{ $min }}" max="{{ $max }}" value="{{ $from }}" step="1" />
                                    <input id="max" type="range" name="to" min="{{ $min }}" max="{{ $max }}" value="{{ $to }}" step="1" />
                                </div>
                                <button class="button__trigger" type="submit">Фильтровать</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <input type="checkbox" id="category" checked />
                    <label for="category" class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
                        Категория
                        <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="arrow">
                    </label>
                    <ul class="m-0 pr-em-2 pl-em-2">
                        <li class="mt-1 mb-1"><a href="{{ route( $route, [ 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'all', 'from' => $from, 'to' => $to, 'search' => $search ]) }}" class="@if ($stock == null || $stock == 'all') active @endif block hover">Вся продукция</a></li>
                        <li class="mt-1 mb-1"><a href="{{ route( $route, [ 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'new', 'from' => $from, 'to' => $to, 'search' => $search]) }}" class="@if ($stock == 'new') active @endif block hover">Новые поступления</a></li>
                        <li class="mt-1 mb-1"><a href="{{ route( $route, [ 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'discount', 'from' => $from, 'to' => $to, 'search' => $search]) }}" class="@if ($stock == 'discount') active @endif block hover">Акция</a></li>
                    </ul>
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <a href="{!! urldecode(\Request::url()) !!}" class="button__trigger">Очистить фильтры</a>
                </div>
            </div>
            @if ($agent->isMobile())
        </div>
        @endif
        <div class="col-9 sd-12 @if($agent->isDesktop()) pl-5 @endif">
            <div class="@if($search != NULL) flex-center-between @endif">
                @if($search != NULL)
                <div class="col-5">
                    <p class="m-0 col-12 ct pr-em-2 pl-em-2 pt-em-1 pb-em-1 back-back shadow-xs b4">Поиск: <span class="cm">{{ $search }}</span></p>
                </div>
                @endif
            
                <div class="container__sorting @if($search != NULL) col-6 @else col-12 @endif pt-em-1 pb-em-1 pl-5 bb-light">

                    @if ($agent->isMobile())
                    <a href="#" class="trigger b5 flex-center-center hover pt-4 pb-4" onclick="
                    event.preventDefault();
                    document.querySelector('.sorting__wrapp').classList.add('active');
                    document.querySelector('.sorting__back').classList.add('active')
                    ">Фильтры</a>

                    @endif

                    <div class="dropdown bc pt-em-1 pb-em-1 b5 rel">
                        <div class="dropdown__list rel flex-center-center">
                            <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
                            <span class="dropdown_placeholder col-9 cc c-p flex-center-center">
                                {!! $value !!}
                            </span>
                            <ul class="dropdown__list__ul abs top-max-left shadow col-12 b5 back-back" id="sortingProduct">
                                @foreach ($sorting as $item)
                                <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><a class="sort-link hover pt-2 pb-2 pr-5 pl-5 block" href="{{ route( $route, [ 'part_types_id' => $part_types_id, 'sort' => $item[0], 'brands' => $brands, 'stock' => $stock, 'from' => $from, 'to' => $to, 'search' => $search ]) }}">{!! $item[1] !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-start" id="card">
                @foreach($part_types as $part)
                <div class="card__item shop">
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
                                <a href="{{ urldecode(route('product.show', ['slug' => $part->part_link ])) }}" class="hover-main block pr-em-1 pl-em-1">{{ ltrim($part->part_model) }}</a>
                            </div>
                            <div class="product_extras col-12 back-body hide">
                                <a class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5" href="{{ urldecode(route('addproduct', [ 'id' => $part->id, 'type' => $part->parttype_type, 'company' => $part->company_id, 'tv' => $part->tv_id, 'img' => $part->part_img_name , 'name' => $part->part_model, 'qty' => 1,  'price' => $part->part_cost ])) }}">
                                    <img src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                </a>
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
            @if ($agent->isDesktop())
            {!! urldecode($part_types->links()) !!}
            @else
            {!! urldecode($part_types->onEachSide(1)->links()) !!}
            @endif
        </div>
    </div>

    @include('includes.footer')

</body>

</html>