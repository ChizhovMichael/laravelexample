<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Интернет-магазин Телезапчасти.рф - Скупка телевизоров на запчасти</title>
    <meta name="description" content="Интернет-магазин Телезапчасти.рф - скупка телевизоров на запчасти. Сдать телевизор на запчати, продать телевизор на запчасти в телезапчасти.рф. Старый телевизор на запчасти">
    <meta name="keywords" content="сдать телевизор на запчасти, скупка телевизоров на запчасти, скупка телевизоров, сдать телевизор, продать телевизор на запчасти, продать телевизор, старый телевизор на запчасти, прием телевизоров на запчасти, запчасти б у телевизора, запчасти б у телевизора">

    <meta name="robots" content="index, follow">

    <!-- Headbase -->

    @include('includes.head')

</head>

<body>
    <div class="sd-12 col-12 pr-10 pl-10 pt-5 pb-em-6 flex-between">
        <div class="col-5 sd-12">
            <div class="col-10 sd-7 mb-em-3">
                <a class="logo flex-center sd-12" href="{{ route('main') }}">
                    <img class="sd-2" src="{{ asset('img/icon/logo.svg') }}" alt="Телезапчасти" />
                    <h3>
                        <span>tele</span>
                        Zapchasti
                    </h3>
                </a>
            </div>
            <h1>Скупка битых, дефектных LCD, LED, PDP Телевизоров<br>Санкт-Петербург и ЛО</h1>
            <h6 class="ct m-0">+79112415531 (viber, whatsapp)</h6>
            <h6 class="cm m-0">skupka-televizorov@yandex.ru</h6>

            @error('skypka_tv_model')
                <span class="invalid-feedback" role="alert">
                    <strong>Заполните поле или сократите название до 64 символов</strong>
                </span>
            @enderror

            @error('skypka_defect')
                <span class="invalid-feedback" role="alert">
                    <strong>Заполните поле. Оно обязательное</strong>
                </span>
            @enderror

            @error('skypka_cost')
                <span class="invalid-feedback" role="alert">
                    <strong>Желаемая сумма должна содержать только цифры!</strong>
                </span>
            @enderror

            @error('skypka_email')
                <span class="invalid-feedback" role="alert">
                    <strong>Не заполнен или некорректно заполнен e-mail адрес</strong>
                </span>
            @enderror

            @error('skypka_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>Не верно указан номер телефона</strong>
                </span>
            @enderror
            
        </div>
        

        <form action="{{ route('skypka.post') }}" method="post" class="col-6 sd-12">

            @csrf

            <div class="form-label-group sd-12 bc b5 mt-em-2">
                <input type="text" id="skypka_tv_model" name="skypka_tv_model" class="form-control @error('skypka_tv_model') is-invalid @enderror" placeholder="Напишите модель тв (Указана на задней крышке тв)" required value="{{ old('skypka_tv_model') }}">
                <label for="skypka_tv_model">Напишите модель тв (Указана на задней крышке тв)</label>
            </div>
            <div class="form-label-group sd-12 bc b5 mt-em-2">
                <textarea
                    name="skypka_defect"
                    id="skypka_defect"
                    class="form-control @error('skypka_defect') is-invalid @enderror"
                    placeholder="Опишите дефект вашего телевизора (разбит, залит, не включается и т.п.)"
                    required
                    style="resize: none"
                >{{ old('skypka_defect') }}</textarea>
                <label for="skypka_defect">Опишите дефект вашего телевизора (разбит, залит, не включается и т.п.)</label>
            </div>

            <p class="cm mt-3 mb-3">
                Укажите адрес, где находится ваш телевизор, либо же Вы можете привезти его к нам по адресу (пр. Славы д. 12)
            </p>

            <div class="form-check mt-em-1 mb-em-1">

                    <input class="form-check-input" data-form="brands-check" type="radio" name="skypka_delivery_option" id="skypka_delivery_option_1" value="1">
                    <span class="form-check-span"></span>
                    <label class="form-check-label ct" for="skypka_delivery_option_1">
                        Сами забирайте
                    </label>

                    <div class="pr-em-1 pl-em-1 cc sd-12">
                        <div class="form-label-group sd-12 bc b5">
                            <input type="text" id="skypka_user_adress" name="skypka_user_adress" class="form-control @error('skypka_user_adress') is-invalid @enderror" placeholder="Напишите ваш адрес" value="{{ old('skypka_user_adress') }}">
                            <label for="skypka_user_adress">Напишите ваш адрес</label>
                        </div>
                    </div>
    
                </div>
            <div class="form-check mt-em-1 mb-em-1">

                <input class="form-check-input" data-form="brands-check" type="radio" name="skypka_delivery_option" id="skypka_delivery_option_2" value="2">
                <span class="form-check-span"></span>
                <label class="form-check-label ct" for="skypka_delivery_option_2">
                    Сам привезу на Славы 12
                </label>

            </div>

            <div class="form-label-group sd-12 bc b5 mt-em-2">
                <input type="number" id="skypka_cost" name="skypka_cost" class="form-control @error('skypka_cost') is-invalid @enderror" placeholder="Желаемая сумма за тв" value="{{ old('skypka_cost') }}">
                <label for="skypka_cost">Желаемая сумма за тв</label>
            </div>

            <p class="cm mt-em-2">Контактные данные</p>

            <div class="form-label-group sd-12 bc b5 mt-em-2">
                <input type="email" id="skypka_email" name="skypka_email" class="form-control @error('skypka_email') is-invalid @enderror" placeholder="Email" required value="{{ old('skypka_email') }}">
                <label for="skypka_email">Email</label>
            </div>

            <div class="form-label-group sd-12 bc b5 mt-em-2">
                <input type="text" id="skypka_phone" name="skypka_phone" class="form-control @error('skypka_phone') is-invalid @enderror" placeholder="Телефон" required value="{{ old('skypka_phone') }}">
                <label for="skypka_phone">Телефон</label>
            </div>

            <button type="submit" class="button__trigger sd-12 col-6 mt-em-2">Подать заявку</button>     
        </form>
    </div>
    



    @include('includes.footer')

</body>

</html>