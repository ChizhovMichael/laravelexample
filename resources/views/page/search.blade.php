<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Телезапчасти.рф - Запчасти для телевизоров. Поиск</title>
    <meta name="description" content="Телезапчасти.рф - продажа запчастей для телевизоров, запчасти для телевизоров. Поиск. Телезапчасти, запчасти для телевизоров спб, телезапчасти.рф отзывы">
    <meta name="keywords" content="телезапчасти рф, телезапчасти.рф отзывы, запчасти для телевизоров купить, купить запчасти для телевизоров, телезапчасти купить, телезапчасти интернет магазин, запчасти для телевизора lg, запчасти для телевизора самсунг, запчасти для телевизора samsung, запчасти для телевизора лджи">

    <meta name="robots" content="noindex">

    <!-- Headbase -->

    @include('includes.head')

</head>

<body>
    @include('includes.nav')

    <section class="pt-em-3 pb-em-3 pr-5 pl-5">
        <div class="sd-12 rel">
            <div class="sd-12 bc b5">
                <form action="#" method="POST" class="flex-center">
					<div class="form-label-group col-7">
						<input type="text" id="search" name="search" value="" class="form-control col-12" placeholder="Поиск по продукции" />
						<label for="search">Поиск по продукции</label>
					</div>
					<div class="dropdown col-5 arrow-bottom rel">
						<div class="dropdown__list rel flex-center-center">
							<img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти" />
							<span class="dropdown_placeholder col-9 cc c-p flex-center-center" data-link="">
								Все категории
							</span>
							<ul class="dropdown__list__ul abs top-max-left shadow col-12 b5 back-back">
								<li><a class="nav-link hover pt-2 pb-2 pr-5 pl-5 block" href="#" data-link="all">Все категории</a></li>
								@foreach($navigations as $item)
								<li><a class="nav-link hover bt-light pt-2 pb-2 pr-5 pl-5 block" href="#" data-link="{{ $item->slug }}">{{ $item->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</form>
            </div>

            <div class="result__search">
                <div class="result__wrapp">
                    <div class="container">
                        <div class="noscroll">
                            <div class="article pb-em-3" id="tbody">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>