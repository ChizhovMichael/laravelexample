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
    <div class="col-12 sd-12 @if($agent->isMobile()) pt-em-5 pb-em-5 @else pt-em-10 pb-em-10 @endif pr-5 pl-5 flex-between">



        <!-- Images -->

        <ul class="image_list col-2 m-0 sd-12 flex-between">
            <li data-image="{{ asset('img/m1513630340d.jpg') }}" class="image_list_li flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-12 sd-4">
                <img class="col-12 sd-12" src="{{ asset('img/m1513630340d.jpg') }}" alt="Запчать {{ $part_types->parttype_type }} {{ $part_types->part_model }} для {{ $part_types->company }} {{ $part_types->tv_model }}">
            </li>
            <li data-image="{{ asset('img/m1513630340d.jpg') }}" class="image_list_li flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-12 sd-4">
                <img class="col-12 sd-12" src="{{ asset('img/m1513630340d.jpg') }}" alt="Запчать {{ $part_types->parttype_type }} {{ $part_types->part_model }} для {{ $part_types->company }} {{ $part_types->tv_model }}">
            </li>
            <li data-image="{{ asset('img/m1513630340d.jpg') }}" class="image_list_li flex-center-center bc-light shadow-xs mb-em-1 c-p p-em-1 hide col-12 sd-4">
                <img class="col-12 sd-12" src="{{ asset('img/m1513630340d.jpg') }}" alt="Запчать {{ $part_types->parttype_type }} {{ $part_types->part_model }} для {{ $part_types->company }} {{ $part_types->tv_model }}">
            </li>
        </ul>


        <!-- Selected Image -->

        <div class="image_selected flex-center-center bc-light shadow hide p-em-1 col-5 sd-12 @if($agent->isMobile()) mb-em-5 @endif">
            <img class="col-12 sd-12" src="{{ asset('img/m1513630340d.jpg') }}" alt="" class="image_list_cont">
        </div>


        <!-- Description -->

        <div class="col-4 sd-12">
            <span class="cc">{{ $part_types->parttype_type }}</span>
            <h1 class="ct">{{ $part_types->part_model }}</h1>
            
            <p class="cc">{{ $part_types->parttype_type }} {{ $part_types->part_model }} снята с телевизора {{ $part_types->company }} {{ $part_types->tv_model }}. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p>
            
            <span class="found">В наличие</span>
            <div>
                <form action="#">
                    <div>

                        <!-- Product Quantity -->
                        <div class="product_quantity">
                            <span>Количество: </span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control">
                                    <img src="{{ asset('img/icon/chevron-arrow-up.svg') }}" alt="">
                                </div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control">
                                    <img src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                    <h5>2000&nbsp;&#x20bd;</h5>
                    <div>
                        <form action="#">
                            <input type="hidden">

                            <button class="back-main col-6 sd-6 b5 pt-1 pb-1 b-main shadow c-p">
                                <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                            </button>
                        </form>
                        
                    </div>

                </form>
            </div>
        </div>




    </div>

    <div class="back-back-add pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
            <h4 class="m-0">Похожие товары</h4>
        </div>
        <div class="flex-between">
            <div class="card__item__np flex-center-between b8 p-em-2 back-body col-5 sd-12 rel discount">
                <div class="np__image col-5 sd-5 flex-center-center">
                    <img class="col-12 sd-12 b5" src="#" alt="#">
                </div>
                <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
                    <p class="block pr-em-2 pl-em-2">Lorem ipsum</p>
                    <a class="block hover-main pr-em-2 pl-em-2" href="#">Lorem ipsum</a>
                    <h6 class="ct mt-em-1 mb-em-1 pr-em-2 pl-em-2">
                        2200&nbsp;&#x20bd;
                        <span class="cc ml-em-1">3200&nbsp;&#x20bd;</span>
                    </h6>
                </div>
                <ul class="product_marks">
                    <li class="product_marks__item product_new">new</li>
                    <li class="product_marks__item product_discount">-25%</li>
                </ul>
            </div>
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

    @include('includes.footer')

</body>

</html>