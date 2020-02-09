<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ $set->set_name }} купить в Телезапчасти.рф - Запчасти для телевизоров</title>
    <meta name="description" content="{{ $set->set_name }}, купить комплект {{ $set->set_name }} запчастей в Телезапчасти.рф, {{ $set->set_name }}, комплект запчастей {{ $set->set_name }}, @foreach($setInfo as $item) {{ $item->parttype_type }} {{ $item->part_model }}, @endif @foreach($setInfo as $item) запчасть {{ $item->parttype_type }} {{ $item->part_model }} для телевизора, @endif">
    <meta name="keywords" content="{{ $set->set_name }}, купить комплект {{ $set->set_name }} запчастей в Телезапчасти.рф, {{ $set->set_name }}, комплект запчастей {{ $set->set_name }}, @foreach($setInfo as $item) {{ $item->parttype_type }} {{ $item->part_model }}, @endif @foreach($setInfo as $item) запчасть {{ $item->parttype_type }} {{ $item->part_model }} для телевизора, @endif">

    <meta name="robots" content="index, follow">

    <!-- Headbase -->

    @include('includes.head')
    <script src="{{ URL::asset('js/flickity/flickity.js') }}"></script>

</head>

<body>

    @include('includes.nav')
    <div class="col-12 sd-12 @if($agent->isMobile()) pt-em-5 pb-em-5 @else pt-em-10 pb-em-5 @endif pr-5 pl-5 flex-between align-start">



        <!-- Selected Image -->
        <div class="col-5 sd-12 @if($agent->isMobile()) mb-em-5 @endif">
            <div class="b8 image_selected flex-center-center bc-light shadow hide p-em-1 mb-em-2">
                @if($set->set_img !== NULL)
                    <img class="col-12 sd-12 image_list_cont" src="/img/sets/{{ $set->set_img }}" alt="Запчасть, {{ $set->set_name }}">
                @endif
            </div>
        </div>


        <!-- Images -->

        <ul class="image_list col-2 m-0 sd-12 flex-between">
            @foreach($setInfo as $item)
                <li class="b4 flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-12 sd-4 rel">
                    <div class="abs top-left bottom-right" style="background: url('/img/products/{{ $item->company_id }}/{{ $item->tv_id }}/{{ $item->part_img_name }}') center center no-repeat; background-size: cover; z-index: 1"></div>
                    <div class="abs top-left bottom-right" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.35)); z-index: 2;"></div>
                    <a href="{{ route( 'product.show', ['slug' => $item->part_link]) }}" class="abs bottom-left ml-em-1 mb-em-1 cb hover-main bold" style="z-index: 3">{{ $item->parttype_type }} {{ $item->part_model}}</a>
                </li>
            @endforeach
        </ul>



        <!-- Description -->

        <div class="col-4 sd-12">
            <h1 class="ct wwbw">{{ $set->set_name }}</h1>

            @if($set->set_comment)
            <p class="bb bt m-1 pt-em-1 pb-em-1 found not">{{ $set->set_comment }}</p>
            @endif
            <p class="cc wwbw">Комплект запчастей "{{ $set->set_name }}" для мастеров и организаций, занимающихся продажами запчастей для телевизоров оптом</p>
            <p class="cc">Комплект включает в себя:</p>
            @foreach($setInfo as $item)
            <div>
                <p class="cc m-0"><a href="{{ route( 'product.show', ['slug' => $item->part_link]) }}" class="cm hover">{{ $item->parttype_type }} {{ $item->part_model }}</a> - {{ $item->product_count}} шт.</p>
            </div>
            @endforeach


            <p class="cc">Доставка в любой регион почтой России или транспортной компанией.</p>

            @if($set->set_count > 0)
            <span class="found">В наличии {{ $set->set_count }} шт</span>
            @else
            <span class="found not">Нет в наличии</span>
            @endif

            <div>
                
                    <div>

                        <!-- Product Quantity -->
                        @if($set->set_count > 1)
                        <div class="product_quantity set">
                            <span>Количество: </span>
                            <input name="qty" id="quantity_input" type="text" pattern="[0-9]*" value="1" max-value="{{ $set->set_count }}" product-id="{{ $set->id }}">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control">
                                    <img src="{{ asset('img/icon/chevron-arrow-up.svg') }}" alt="">
                                </div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control">
                                    <img src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <h5 class="mb-5">{{ $set->set_cost }}&nbsp;&#x20bd;</h5>
                    @if($set->set_count > 0)
                    <span class="cm hover popup c-p">Нашли дешевле? Снизим цену!</span>
                    @else
                    <div class="bb bt m-1 pt-em-1 pb-em-1 flex-start">
                        <div class="warning mr-em-2"></div>
                        <div class="col-8">
                            <p class="m-0 cc">Данный товар временно отсутствует в продаже, но вы можете приобрести идентичный ему</p>
                        </div>
                    </div>

                    @endif
                    <div class="mt-em-2">

                        @if($set->set_count > 0)
                        <a class="cart-link block text-center back-main col-6 sd-6 b5 pt-1 pb-1 b-main shadow c-p" href="{{ route('addset', [ 'id' => $set->id, 'qty' => 1 ]) }}">
                            <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                        </a>
                        @endif

                    </div>

                
            </div>
        </div>
    </div>


    @component('components.sliderfooter')
    @endcomponent

    @include('includes.footer')
</body>

</html>