<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Интернет-магазин Телезапчасти.рф - Запчасти для телевизоров. Доставка</title>
        <meta name="description" content="Телезапчасти.рф - продажа запчастей для телевизоров, запчасти для телевизоров. Доставка в регионы и по всей России. Телезапчасти, запчасти для телевизоров спб, телезапчасти.рф отзывы" />
        <meta name="keywords" content="телезапчасти рф, телезапчасти.рф отзывы, запчасти для телевизоров купить, купить запчасти для телевизоров, телезапчасти купить, телезапчасти интернет магазин, запчасти для телевизора lg, запчасти для телевизора самсунг, запчасти для телевизора samsung, запчасти для телевизора лджи" />

        <meta name="robots" content="index, follow">

        <!-- Headbase -->

        @include('includes.head')
    </head>

    <body>
        @include('includes.nav') @if ($agent->isDesktop()) @include('includes.features') @endif
        <div class="sd-12 col-12 pr-10 pl-10 pt-5 pb-em-6">
            <h1 class="mb-0 cm">Условия доставки</h1>
            <h3 class="mt-0">telezapchasti.ru</h3>

            <div>
                {!! $statictext->get('delivery')->value !!}
            </div>


        </div>
        @include('includes.footer')
    </body>
</html>