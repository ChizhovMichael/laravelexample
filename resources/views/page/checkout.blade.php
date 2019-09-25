<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Карта</title>
    <meta name="description" content="Карта">
    <meta name="keywords" content="Карта">

    <!-- Headbase -->

    @include('includes.head')

</head>

<body>

    @include('includes.nav')
    <form action="{{ route('checkout.post') }}" method="POST">

        @csrf

        <div class="flex-between pt-em-5 pb-em-5 pr-5 pl-5 col-12">
            <div class="col-6 sd-12 pr-5">

                <div>
                    <h3>Детали оплаты</h3>
                </div>

                <div class="flex-between">
                    <div class="b5 bc sd-12 col-5 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="firstname" name="firstname" class="form-control @error('name') is-invalid @enderror" placeholder="Введите ваше Имя" required value="{{ old('firstname') }}">
                            <label for="firstname">Введите ваше Имя</label>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="b5 bc sd-12 col-6 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="secondname" name="secondname" class="form-control @error('secondname') is-invalid @enderror" placeholder="Введите вашу Фамилию" required value="{{ old('secondname') }}">
                            <label for="secondname">Введите вашу Фамилию</label>

                            @if ($errors->has('secondname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('secondname') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-em-3 mb-em-3">
                    <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                        <div class="form-label-group sd-12">
                            <input type="text" id="addname" name="addname" class="form-control @error('addname') is-invalid @enderror" placeholder="Введите ваше Отчество" required value="{{ old('addname') }}">
                            <label for="addname">Введите ваше Отчество</label>

                            @if ($errors->has('addname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('addname') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <h5>Выберете один из способов доставки:</h5>


                    <div>
                        <div class="dropdown bc pt-em-1 pb-em-1 b5 rel col-10 sd-12">
                            <div class="dropdown__list rel flex-center-center">
                                <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
                                <input type="hidden" name="delivery" value="0">
                                <span class="dropdown_placeholder col-10 cc c-p">
                                    Cпособы доставки
                                </span>
                                <ul class="dropdown__list__ul abs top-max-left shadow col-12 b5 back-back" id="sortingProduct">

                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="1">Почта России</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="3">Доставка курьером (только Санкт-Петербург)</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="2">Курьерская служба доставки СДЭК</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="mt-em-3 mb-em-3">
                        <div class="dropdown bc pt-em-1 pb-em-1 b5 rel col-10 sd-12">
                            <div class="dropdown__list rel flex-center-center">
                                <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти">
                                <input type="hidden" name="country" value="0">
                                <span class="dropdown_placeholder col-10 cc c-p">
                                    Выберете страну
                                </span>
                                <ul class="dropdown__list__ul abs top-max-left shadow col-12 b5 back-back" id="sortingProduct">

                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="1">Россия</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="2">Булоруссия</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="3">Украина</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="5">Казахстан</span></li>
                                    <li class="flex-center-between rel bt-light pt-2 pb-2 pr-5 pl-5"><span class="sort-link hover pt-2 pb-2 pr-5 pl-5 block c-p form-link" data-link="4">Другое</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>



                    <div>
                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="number" id="zipcode" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" placeholder="Введите почтовый индекс">
                                    <label for="zipcode">Введите почтовый индекс</label>

                                    @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="text" id="region" name="region" class="form-control @error('region') is-invalid @enderror" placeholder="Введите область/регион">
                                    <label for="region">Введите область/регион</label>

                                    @if ($errors->has('region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="text" id="autoregion" name="autoregion" class="form-control @error('autoregion') is-invalid @enderror" placeholder="Автономная область" value="{{ old('autoregion') }}">
                                    <label for="autoregion">Автономная область</label>

                                    @if ($errors->has('autoregion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('autoregion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="text" id="district" name="district" class="form-control @error('district') is-invalid @enderror" placeholder="Введите район" value="{{ old('district') }}">
                                    <label for="district">Введите район</label>

                                    @if ($errors->has('district'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Введите город" required value="{{ old('city') }}">
                                    <label for="city">Введите город</label>

                                    @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Введите адрес" required value="{{ old('address') }}">
                                    <label for="address">Введите адрес</label>

                                    @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="number" id="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Введите телефон(необязательно)" value="{{ old('tel') }}">
                                    <label for="tel">Введите телефон(необязательно)</label>

                                    @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-em-3 mb-em-3">
                            <div class="b5 bc sd-12 col-10 mt-em-1 sd-12">
                                <div class="form-label-group sd-12">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Введите ваш email" required value="{{ old('email') }}">
                                    <label for="email">Введите ваш email</label>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <p>Примечания к заказазу: </p>
                        <div class="col-10 sd-12 b5 bc">
                            <div class="form-label-group sd-12">

                                <textarea name="message" id="message" class="form-control" placeholder="Примечания к вашему заказу @error('message') is-invalid @enderror" value="{{ old('message') }}"></textarea>
                                <label for="message">Примечания к вашему заказу</label>

                                @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-6 sd-12">
                <h3>Ваш заказ</h3>

                <div class="p-em-2 back-body shadow col-12 sd-12 b8">

                    <div>
                        <div class="flex-between">
                            <div class="col-8 sd-7">
                                <h6 class="ct mt-1">Товар</h6>
                            </div>
                            <div class="col-3 sd-4">
                                <h6 class="ct mt-1">Итого</h6>
                            </div>
                        </div>
                        <div>
                            @foreach ($cartContent as $item)
                            <div class="flex-between bb-light">
                                <div class="col-8 br-light flex-center sd-7 pb-2">
                                    <p class="cc mb-0">{{ $item->options->type }} {{ $item->name }} x {{ $item->qty }}</p>
                                </div>
                                <div class="col-3 flex-center sd-4 pb-2">
                                    <p class="cc mb-0">{{ $item->subtotal }}&nbsp;&#x20bd</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex-between">
                            <div class="col-8 sd-7">
                                <h6 class="ct">Доставка</h6>
                            </div>
                            <div class="col-3 sd-4">
                                <p class="ct">Стоимость доставки уточняйте у сотрудника</p>
                            </div>
                        </div>

                        <div class="flex-between">
                            <div class="col-8 sd-7">
                                <h6 class="ct">Итого</h6>
                            </div>
                            <div class="col-3 flex-center sd-4">
                                <p class="ct">{!! $cart['cart_total'] !!}&nbsp;&#x20bd;</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <h5 class="@if(session('paymethod')) ca @endif">Способ оплаты</h5>

                    <div class="col-12 sd-12 paymethod">

                        <input type="hidden" name="paymethod" value="">

                        <div class="m-em-1 pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 @if(session('paymethod')) b-error @else b-main @endif">
                            <div class="form-check">

                                <input class="form-check-input" data-form="brands-check" type="checkbox" id="sberbank">
                                <span class="form-check-span"></span>
                                <label class="form-check-label ct" for="sberbank">
                                    Оплата Сбербанк Онлайн
                                </label>

                                <p class="pr-em-1 pl-em-1 cc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod quibusdam sit aliquid doloremque tenetur corrupti impedit incidunt asperiores architecto enim.</p>

                            </div>
                        </div>
                    </div>

                    @if(session('paymethod'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{session('paymethod')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="mt-em-2 back-back p-5 col-12 sd-12">
                    <p class="cc">Ваши личные данные будут использованы для обработки вашего заказа, поддержки вашего опыта на этом сайте, а также для других целей, описанных в <a href="{{ route('private') }}" class="cm hover">политика конфиденциальности</a></p>

                </div>

                <div class="pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3">
                    <div class="form-check">

                        <input class="form-check-input" data-form="brands-check" type="checkbox" id="regulations" required>
                        <span class="form-check-span"></span>
                        <label class="form-check-label ct col-9 sd-9" for="regulations">
                            Я прочитал(а) и соглашаюсь с правилами сайта <a href="{{ route('regulations') }}" class="cm hover">правила и условия</a> *
                        </label>

                    </div>
                </div>

                <button class="block text-center back-main col-4 sd-6 b5 pt-1 pb-1 b-main shadow c-p mt-em-3" @if(session('success')) disabled @endif>
                    <img class="col-2 sd-2" src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                </button>



            </div>
        </div>
    </form>

    @include('includes.footer')

</body>

</html>