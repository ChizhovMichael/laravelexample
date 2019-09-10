<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Телезапчасти</title>
        <meta name="description" content="Телезапчасти" />
        <meta name="keywords" content="Телезапчасти" />

        <!-- Headbase -->

        @include('includes.head')
    </head>

    <body>
        @include('includes.nav') @if ($agent->isDesktop()) @include('includes.features') @endif
        <div class="sd-12 col-12 pr-10 pl-10 pt-5 pb-em-6">
            <h1 class="mb-0 cm">Условия доставки</h1>
            <h3 class="mt-0">telezapchasti.ru</h3>



        </div>
        @include('includes.footer')
    </body>
</html>