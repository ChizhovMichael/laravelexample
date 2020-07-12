<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Telezapchasti.ru - Запчасти для телевизоров. Каталог</title>
    <meta name="description" content="Telezapchasti.ru - продажа запчастей для телевизоров, запчасти для телевизоров, телезапчасти, запчасти для телевизоров спб, запчасти для телевизоров lg, запчасти для телевизоров samsung, запчасти для телевизоров самсунг, запчасти для телевизоров sony, бу запчасти телевизоров">
    <meta name="keywords" content="запчасти для телевизоров спб, запчасти для телевизоров lg, запчасти для телевизоров samsung, запчасти для телевизоров sony, купить запчасти для телевизора, запчасти для телевизоров самсунг, телезапчасти рф, запчасти для телевизоров, бу запчасти телевизоров">

    <meta name="robots" content="index, follow">

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
                            <div class="flex-center-between">
                                <a class="block hover @if (Request::is('catalog/'.$item->slug ))) bold cm @endif col-11 sd-10" href="{{ route('category.show', ['part_types_id' => $item->slug ]) }}">{{ $item->name }}</a>
                                @if($item->navigation_items->count() > 1)
                                    <div class="navigation__trigger">+</div>
                                @endif
                            </div>
                            @if($item->navigation_items->count() > 1)
                                <div class="navigation__drop__wrapp @foreach($item->navigation_items as $add) @if (Request::is('catalog/'.$add->additional_slug  )) show @endif @endforeach">
                                    @foreach($item->navigation_items as $add)
                                    <a class="block hover @if (Request::is('catalog/'.$add->additional_slug  )) bold cm @endif col-11 sd-10" href="{{ route('category.show', ['part_types_id' => $add->additional_slug ]) }}">{{ $add->additional_name }}</a>
                                    @endforeach
                                </div>
						    @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <input type="checkbox" checked />
                    <label class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
                        Бренд телевизора
                    </label>
                    <ul class="m-0 pr-em-2 pl-em-2 @if($brand->count() <= 1) rel disable @endif">
                        @foreach($brand->splice(0, 7)->all() as $item)
                        <li class="mt-1 mb-1">
                            <div class="form-check">
                                <input class="form-check-input" data-form="brands-check" type="checkbox" @if(preg_match("/{$item->company}/i", $brands)) checked @endif value="{{ $item->company }}" id="{{ $item->company }}">
                                <span class="form-check-span"></span>
                                <label class="form-check-label" for="{{ $item->company }}">
                                    {{ $item->company }} ({{ $item->cnt }})
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
                                        {{ $item->company }} ({{ $item->cnt }})
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
                    <input type="checkbox" id="sorting_price" checked />
                    <label for="sorting_price" class="m-0 pt-3 pb-3 text-center flex-center-center c-p">
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
                        <li class="mt-1 mb-1 flex-between"><a href="{{ route( $route, [ 'company' => $company, 'model'=> $model, 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'all', 'search' => $search ]) }}" class="@if ($stock == null || $stock == 'all') active @endif block hover">Вся продукция</a><span class="cc">({{ $productsCount }})</span></li>
                        <li class="mt-1 mb-1 flex-between @if($newCount < 1) rel disable @endif"><a href="{{ route( $route, [ 'company' => $company, 'model'=> $model, 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'new', 'search' => $search]) }}" class="@if ($stock == 'new') active @endif block hover">Новые поступления</a><span class="cc">({{ $newCount }})</span></li>
                        <li class="mt-1 mb-1 flex-between @if($saleCount < 1) rel disable @endif"><a href="{{ route( $route, [ 'company' => $company, 'model'=> $model, 'part_types_id' => $part_types_id, 'sort' => $sort, 'brands' => $brands, 'stock' => 'discount', 'search' => $search]) }}" class="@if ($stock == 'discount') active @endif block hover">Акция</a><span class="cc">({{ $saleCount }})</span></li>

                    </ul>
                </div>
                <div class="sorting__item mt-em-2 mb-em-2 b8 shadow-xs hide">
                    <a href="{!! \Request::url() !!}" class="button__trigger">Очистить фильтры</a>
                </div>
            </div>
            @if ($agent->isMobile())
        </div>
        @endif
        <div class="col-9 sd-12 @if($agent->isDesktop()) pl-5 @endif">
            <div class="@if($search != NULL) flex-center-between @endif">
                
            
                <div class="container__sorting col-12 pt-em-1 pb-em-1 pl-5 bb-light">

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
                                <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><a class="sort-link hover pt-2 pb-2 pr-5 pl-5 block" href="{{ route( $route, [ 'company' => $company, 'model'=> $model, 'part_types_id' => $part_types_id, 'sort' => $item[0], 'brands' => $brands, 'stock' => $stock, 'from' => $from, 'to' => $to, 'search' => $search ]) }}">{!! $item[1] !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                @if($search != NULL)
                <div class="col-12">
                    <p class="m-0 col-12 ct pr-em-2 pl-em-2 pt-em-1 pb-em-1 back-back shadow-xs b4">Поиск: <span class="cm">{{ $search }}</span></p>
                </div>
                @endif
            </div>
            <div class="flex-start" id="card">
                @foreach($part_types as $part)
                    @component('components.products', ['part' => $part, 'adminDetect' => $adminDetect])
                    @endcomponent
                @endforeach
            </div>
            @if ($agent->isDesktop())
            {!! $part_types->links() !!}
            @else
            {!! $part_types->onEachSide(1)->links() !!}
            @endif
        </div>
    </div>

    @include('includes.footer')

</body>

</html>