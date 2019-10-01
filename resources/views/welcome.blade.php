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
                        @component('components.productsmini', ['part' => $part])
                        @endcomponent
                    @endforeach
                </div>

            </div>
            <div id="power" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_power as $part)
                        @component('components.productsmini', ['part' => $part])
                        @endcomponent
                    @endforeach
                </div>
            </div>
            <div id="led" role="tabpanel" class="tabs__panel js-tab-panel block pt-em-3 pb-em-3">
                <div class="flex-start">
                    @foreach($products_led as $part)
                        @component('components.productsmini', ['part' => $part])
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
                @component('components.productsadditional', ['part' => $part])
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
                @component('components.productsadditional', ['part' => $part])
                @endcomponent
            @endforeach
        </div>
    </div>

    @component('components.sliderfooter')
    @endcomponent

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