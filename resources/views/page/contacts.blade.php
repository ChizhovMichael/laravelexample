<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Интернет-магазин Телезапчасти.рф - Запчасти для телевизоров. Контакты</title>
        <meta name="description" content="Телезапчасти.рф - продажа запчастей для телевизоров, запчасти для телевизоров. Тел.: +7 (921) 418-39-59. Почта: telezapchasti@yandex.ru. Телезапчасти, запчасти для телевизоров спб, телезапчасти.рф отзывы" />
        <meta name="keywords" content="телезапчасти рф, телезапчасти.рф отзывы, запчасти для телевизоров купить, купить запчасти для телевизоров, телезапчасти купить, телезапчасти интернет магазин, запчасти для телевизора lg, запчасти для телевизора самсунг, запчасти для телевизора samsung, запчасти для телевизора лджи" />

        <meta name="robots" content="index, follow">

        <!-- Headbase -->

        @include('includes.head')
    </head>

    <body>
        @include('includes.nav') @if ($agent->isDesktop()) @include('includes.features') @endif
        <div class="sd-12 col-12 pr-10 pl-10 pt-5 pb-em-6">
            <div>
                {!! $statictext->get('contacts')->value !!}
            </div>
            <form action="{{ route('contacts.mail') }}" class="mt-em-3 sd-12 col-12" method="POST">
                @csrf

                <div class="flex-between sd-12 col-12 mb-em-3">
                    <div class="b5 bc sd-12 col-4 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Введите ваше Имя и Фамилию"
                                required
                            />
                            <label for="name">Введите ваше Имя и Фамилию</label>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="b5 bc sd-12 col-3 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Введите ваш email"
                                required
                            />
                            <label for="email">Введите ваш email</label>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="b5 bc sd-12 col-4 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input
                                type="number"
                                id="tel"
                                name="tel"
                                class="form-control @error('tel') is-invalid @enderror"
                                placeholder="Введите ваш телефон"
                            />
                            <label for="tel">Введите ваш телефон</label>

                            @if ($errors->has('numeric'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('numeric') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-7 sd-12 b5 bc">
                    <div class="form-label-group sd-12">
                        <textarea
                            name="message"
                            id="message"
                            class="form-control area @error('message') is-invalid @enderror"
                            placeholder="Введите сообщение"
                            required
                        ></textarea>
                        <label for="message">Введите сообщение</label>

                        @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="flex-center-between mt-em-5">
                    <div class="col-3 sd-12">
                        <button type="submit" class="button__trigger" @if(session('success')) disabled @endif>Написать</button>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="col-12 sd-12 mt-em-5 mb-em-5">
            <iframe
                class="sd-12 col-12"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2010.4644058420245!2d30.573138216149907!3d59.74172478493014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469627649fb6c13b%3A0xfa2838b624ad603f!2sProletarskaya+Ulitsa%2C+Sankt-Peterburg!5e0!3m2!1sen!2sru!4v1564425496855!5m2!1sen!2sru"
                height="550"
                frameborder="0"
                style="border:0"
                allowfullscreen
            ></iframe>
        </div>

        @include('includes.footer')
    </body>
</html>