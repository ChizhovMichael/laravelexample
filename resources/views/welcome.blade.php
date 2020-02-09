<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Телезапчасти.рф - Запчасти для телевизоров</title>
    <meta name="description" content="Телезапчасти.рф - продажа запчастей для телевизоров, запчасти для телевизоров, телезапчасти, запчасти для телевизоров спб, запчасти для телевизоров lg, запчасти для телевизоров samsung, запчасти для телевизоров самсунг, запчасти для телевизоров sony, бу запчасти телевизоров">
    <meta name="keywords" content="запчасти для телевизоров спб, запчасти для телевизоров lg, запчасти для телевизоров samsung, запчасти для телевизоров sony, купить запчасти для телевизора, запчасти для телевизоров самсунг, телезапчасти рф, запчасти для телевизоров, бу запчасти телевизоров">

    <meta name="robots" content="index, follow">

    <!-- Headbase -->

    @include('includes.head')

    
    <script src="{{ URL::asset('js/flickity/flickity.js') }}"></script>

</head>

<body>
    @include('includes.nav')

    @component('components.sliderheader')
    @endcomponent
    
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
                        @component('components.productsmini', ['part' => $part, 'adminDetect' => $adminDetect])
                        @endcomponent
                    @endforeach
                </div>

            </div>
            <div id="power" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_power as $part)
                        @component('components.productsmini', ['part' => $part, 'adminDetect' => $adminDetect])
                        @endcomponent
                    @endforeach
                </div>
            </div>
            <div id="led" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_led as $part)
                        @component('components.productsmini', ['part' => $part, 'adminDetect' => $adminDetect])
                        @endcomponent
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
                @component('components.productsadditional', ['part' => $part, 'adminDetect' => $adminDetect])
                @endcomponent
            @endforeach
        </div>
    </div>
    <div class="back-body new pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="pt-em-2 pb-em-2 bb-light mb-em-3">
            <h4 class="m-0">Новые поступления</h4>
        </div>
        <div class="flex-between">
            @foreach($products_new as $part)
                @component('components.productsadditional', ['part' => $part, 'adminDetect' => $adminDetect])
                @endcomponent
            @endforeach
        </div>
    </div>

    @component('components.sliderfooter')
    @endcomponent

    <div class="pt-em-5 pb-em-5 pr-5 pl-5">
        <div class="p-em-2 back-body shadow col-7 sd-12 b8">
            {!! $statictext->get('about')->value !!}
        </div>        
    </div>


    @include('includes.footer')
</body>

</html>