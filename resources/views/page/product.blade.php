<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Артикул</title>
    <meta name="description" content="Каталог">
    <meta name="keywords" content="Каталог">

    <!-- Headbase -->

    @include('includes.head')
    <script src="{{ URL::asset('js/flickity/flickity.js') }}"></script>

</head>

<body>

    @include('includes.nav')
    <div class="col-12 sd-12 @if($agent->isMobile()) pt-em-5 pb-em-5 @else pt-em-10 pb-em-5 @endif pr-5 pl-5 flex-between align-start">



        <!-- Images -->

        <ul class="image_list col-2 m-0 sd-12 flex-between">
            @foreach($part_types->part_img as $part)
            <li data-image="/img/products/{{ $part_types->company_id }}/{{ $part_types->tv_id }}/{{ $part->part_img_name }}" class="b4 image_list_li flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-12 sd-4">
                <img class="col-12 sd-12" src="/img/products/{{ $part_types->company_id }}/{{ $part_types->tv_id }}/{{ $part->part_img_name }}" alt="Запчаcть {{ $part_types->parttype_type }} {{ $part_types->part_model }} для {{ $part_types->company }} {{ $part_types->tv_model }}">
            </li>
            @endforeach
        </ul>


        <!-- Selected Image -->
        <div class="col-5 sd-12 @if($agent->isMobile()) mb-em-5 @endif">
            <div class="b8 image_selected flex-center-center bc-light shadow hide p-em-1 mb-em-2">
                @if($part_types->part_img->first() !== NULL)
                <img class="col-12 sd-12 image_list_cont" src="/img/products/{{ $part_types->company_id }}/{{ $part_types->tv_id }}/{{ $part_types->part_img->first()->part_img_name }}" alt="Запчасть">
                @endif
            </div>
            <ul class="image_list col-12 m-0 sd-12 flex-between">
                @foreach($part_types->tv_img as $part)
                <li data-image="/img/products/{{ $part_types->company_id }}/{{ $part_types->tv_id }}/{{ $part->tv_img_name }}" class="b4 image_list_li flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-4 sd-4">
                    <img class="col-12 sd-12" src="/img/products/{{ $part_types->company_id }}/{{ $part_types->tv_id }}/{{ $part->tv_img_name }}" alt="Запчаcть {{ $part_types->parttype_type }} {{ $part_types->part_model }} для {{ $part_types->company }} {{ $part_types->tv_model }}">
                </li>
                @endforeach
            </ul>
        </div>
        


        <!-- Description -->

        <div class="col-4 sd-12">
            <span class="cc">{{ $part_types->parttype_type }}</span>
            <h1 class="ct wwbw">{{ $part_types->part_model }}</h1>
            
            @if($part_types->part_comment_for_client)
            <p class="bb bt m-1 pt-em-1 pb-em-1 found not">{{ $part_types->part_comment_for_client }}</p>
            @endif
            <p class="cc wwbw">{{ $part_types->parttype_type }} {{ $part_types->part_model }} снят(-а) с телевизора <a class="cm hover" href="{{ route('category.tv', [ 'tv' => $part_types->company, 'model' => $part_types->tv_model ]) }}">{{ $part_types->company }} {{ $part_types->tv_model }}</a> с разбитой матрицей {{ $part_types->matrix->matrix_model }}.</p>
            <p class="cc">Доставка в любой регион почтой России или транспортной компанией.</p>

            @if($part_types->part_status == 0)
                <span class="found">В наличии {{ $part_types->part_count }} шт</span>
            @else
                <span class="found not">Нет в наличии</span>
            @endif

            <div>
                
                    <div>

                        <!-- Product Quantity -->
                        @if($part_types->part_status == 0 && $part_types->part_count > 1)
                        <div class="product_quantity">
                            <span>Количество: </span>
                            <input name="qty" id="quantity_input" type="text" pattern="[0-9]*" value="1" max-value="{{ $part_types->part_count }}" product-id="{{ $part_types->id }}">
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
                    @if($partsAdditional->isNotEmpty() && $partsAdditional->count() > 0)
                        <p class="mt-em-2 mb-em-2">Такие же, но с других телевизоров</p>
                    @endif
                    <div class="mb-em-2 hide">
                        <ul class="hide">
                            @foreach($partsAdditional->splice(0, 3)->all() as $item)
                                <li class="m-em-1 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3">
                                    <div class="form-check">
                                        
                                        <a class="cart-link flex-center-center rel top-left col-2 sd-2 back-main b5 mr-em-1 shadow-xs" href="{{ route('addproduct', [ 'id' => $item->id, 'type' => $item->parttype_type, 'company' => $item->company_id, 'tv' => $item->tv_id, 'img' => $item->part_img_main->part_img_name , 'name' => $item->part_model, 'qty' => 1,  'price' => $item->part_cost ]) }}">
                                            <img class="p-12 col-8" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                        </a>
                                        
                                        <p class="form-check-label col-8 wwbw">
                                            {{ $item->parttype_type }} {{ $item->part_model }} c телевизора <span class="ca">{{ $item->company }} {{ $item->tv_model }}</span><span class="block cm">{{ $item->part_cost }} руб</span>
                                        </p>
                                        
                                        <img class="col-1" style="margin-left: auto;" src="{{ asset('img/icon/cart_yes.png') }}" alt="В наличие">
                                    
                                    </div>
                                </li>
                            @endforeach
                            <div class="toggle__sorting">
                                @foreach($partsAdditional->all() as $item)
                                <li class="m-em-1 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3">
                                    <div class="form-check ">
                                        
                                    <a class="cart-link flex-center-center rel top-left col-2 sd-2 back-main b5 mr-em-1 shadow-xs" href="{{ route('addproduct', [ 'id' => $item->id, 'type' => $item->parttype_type, 'company' => $item->company_id, 'tv' => $item->tv_id, 'img' => $item->part_img_main->part_img_name , 'name' => $item->part_model, 'qty' => 1,  'price' => $item->part_cost ]) }}">
                                            <img class="p-12 col-8" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                                        </a>
                                        
                                        <p class="form-check-label col-8 wwbw">
                                            {{ $item->parttype_type }} {{ $item->part_model }} c телевизора <span class="ca">{{ $item->company }} {{ $item->tv_model }}</span><span class="block cm">{{ $item->part_cost }} руб</span>
                                        </p>
                                        
                                        <img class="col-1" style="margin-left: auto;" src="{{ asset('img/icon/cart_yes.png') }}" alt="В наличие">
                                    
                                    </div>
                                </li>
                                @endforeach
                            </div>
                        </ul>
                        @if($partsAdditional->count() > 0)
                            <a href="#" class="toggle--content button__trigger"></a>
                        @endif
                    </div>

                    @foreach($category as $item)
                    <p class="cc mt-2 mb-2">Категория: <a class="cm hover" href="{{ route('category.show', [ 'parttype_id' => $item->additional_slug ]) }}">{{ $item->additional_name }}</a></p>
                    @endforeach
                    <p class="cc mt-2 mb-2">Для телвизора: <a class="cm hover" href="{{ route('category.tv', [ 'tv' => $part_types->company, 'model' => $part_types->tv_model ]) }}">{{ $part_types->company }} {{ $part_types->tv_model }}</a></p>
                    <h5 class="mb-5">{{ $part_types->part_cost }}&nbsp;&#x20bd;</h5>
                    @if($part_types->part_status == 0)
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

                        @if($part_types->part_status == 0)
                            <a class="cart-link block text-center back-main col-6 sd-6 b5 pt-1 pb-1 b-main shadow c-p" href="{{ route('addproduct', [ 'id' => $part_types->id, 'qty' => $qty ]) }}">
                                <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                            </a>
                        @endif
                        
                    </div>
                
            </div>
        </div>
    </div>
    @if($partsSet->isNotEmpty())
        <div class="back-body new pt-em-5 pb-em-5 pr-5 pl-5">
            <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
                <h4 class="m-0">Комплекты</h4>
                <p class="cc col-5 sd-12">Покупать вместе выгодно! Вы можете приобрести вместе с данной запчастью дополнительный товар по специальной цене</p>
            </div>
            <div class="flex-between">
                @foreach($partsSet as $part)
                <div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel">
                    <div class="np__image col-5 sd-5 flex-center-center">
                        <img class="col-12 sd-12 b5" src="/img/sets/{{ $part->set_img }}" alt="Запчасти для телевизоров, {{ $part->set_name }}">
                    </div>
                    <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
                        <p class="block pr-em-2 pl-em-2 cc">{{ $part->set_comment }}</p>
                        <a class="block hover-main pr-em-2 pl-em-2" href="{{ route('set.show', [ 'slug' => $part->set_slug ]) }}">{{ $part->set_name }}</a>
                        <h6 class="ca mt-em-1 mb-em-1 pr-em-2 pl-em-2">
                            {{ $part->set_cost }}&nbsp;&#x20bd;
                            <span class="cc ml-em-1 line-through">{{ $part->set_full_cost }}&nbsp;&#x20bd;</span>
                        </h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($partsSame->isNotEmpty())
        <div class="back-back-add pt-em-5 pb-em-5 pr-5 pl-5">
            <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
                <h4 class="m-0">Похожие товары</h4>
            </div>
            <div class="flex-between">
                @foreach($partsSame as $part)
                <div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel {{ $part->stock }}">
                    <div class="np__image col-5 sd-5 flex-center-center">
                        <img class="col-12 sd-12 b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
                    </div>
                    <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
                        <p class="block pr-em-2 pl-em-2">{{ $part->company }} {{ $part->tv_model }}</p>
                        <a class="block hover-main pr-em-2 pl-em-2" href="{{ route('product.show', ['slug' => $part->part_link ]) }}">{{ $part->part_model }}</a>
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
    @endif
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

    @include('includes.footer')

</body>

</html>