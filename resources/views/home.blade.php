@extends('layouts.app') @section('content')
<div class="sd-12 col-12 pr-10 pl-10 pt-5 pb-em-6">
    <h1 class="mb-0 cm">Мой аккаунт</h1>
    <h3 class="mt-0">Привет, {{ $user->name }}!</h3>
    <p class="cc col-6 sd-12">
        Мы стремимся к совершенству и поэтому постоянно развиваемся. Пока ваш кабинет находится на минимальной стадии
        формирования. Но в ближайшем будущем мы сделаем ваши покупки еще удобнее. Пока вы можете заполнить свои учетные
        данные, чтобы вам было легче совершать покупки.
    </p>

    <div class="catalog pt-em-3 pb-em-5 flex-between">
        @if ($agent->isMobile())
        <div class="sorting__back fix sd-12 top-left "></div>
        <div class="sorting__wrapp fix sd-9 top-left back-body">
            @endif
            <div class="sorting col-3 sd-12 @if($agent->isMobile()) pt-em-3 pb-em-3 pr-7 pl-7 back-body @else br-light @endif">
                @if ($agent->isMobile())
                <div class="sd-12 flex-center-between">
                    <div class="sd-9">
                        <h6 class="mt-em-1 mb-em-1 ct">Меню</h6>
                    </div>
                    <a class="sd-2" href="#" onclick="
                    event.preventDefault();
                    document.querySelector('.sorting__wrapp').classList.remove('active');
                    document.querySelector('.sorting__back').classList.remove('active')
                    ">
                        <img class="sd-12" src="{{ asset('img/icon/cancel.svg') }}" alt="cancel" />
                    </a>
                </div>
                @endif
                
                <a href="{{ route('home') }}" class="cc hover mt-em-5">Детали оплаты</a>            
            </div>
            @if ($agent->isMobile())
        </div>
        @endif

        <div class="col-9 sd-12 @if($agent->isDesktop()) pl-5 @endif">
            @if ($agent->isMobile())
            <a href="#" class="trigger b5 flex-center-center hover pt-4 pb-4" onclick="
                    event.preventDefault();
                    document.querySelector('.sorting__wrapp').classList.add('active');
                    document.querySelector('.sorting__back').classList.add('active')
                    ">
                Меню
            </a>

            @endif

            <div class="col-10 sd-12">
                <div>
                    <h3 class="mt-0">Детали оплаты</h3>
                </div>

                @if($paymentDetail == NULL)

                <form action="{{ route('home.push') }}" method="POST">

                    @csrf

                    <div class="flex-between">
                        <div class="b5 bc sd-12 col-5 mt-em-1">
                            <div class="form-label-group sd-12">
                                <input type="text" id="firstname" name="firstname" class="form-control @error('name') is-invalid @enderror" placeholder="Введите ваше Имя" required value="{{ old('firstname') }}" />
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
                                <input type="text" id="secondname" name="secondname" class="form-control @error('secondname') is-invalid @enderror" placeholder="Введите вашу Фамилию" required value="{{ old('secondname') }}" />
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
                                <input type="text" id="addname" name="addname" class="form-control @error('addname') is-invalid @enderror" placeholder="Введите ваше Отчество" required value="{{ old('addname') }}" />
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
                                    <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти" />
                                    <input type="hidden" name="delivery" value="0" />
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
                                    <img class="ml-em-1" src="{{ asset('img/icon/chevron-arrow-down.svg') }}" alt="Запчасти для телевизоров, продать телевизор +на запчасти, телевизор скупка, телезапчасти" />
                                    <input type="hidden" name="country" value="0" />
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
                                        <input type="number" id="zipcode" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" placeholder="Введите почтовый индекс" />
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
                                        <input type="text" id="region" name="region" class="form-control @error('region') is-invalid @enderror" placeholder="Введите область/регион" />
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
                                        <input type="text" id="autoregion" name="autoregion" class="form-control @error('autoregion') is-invalid @enderror" placeholder="Автономная область" value="{{ old('autoregion') }}" />
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
                                        <input type="text" id="district" name="district" class="form-control @error('district') is-invalid @enderror" placeholder="Введите район" value="{{ old('district') }}" />
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
                                        <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Введите город" required value="{{ old('city') }}" />
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
                                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Введите адрес" required value="{{ old('address') }}" />
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
                                        <input type="number" id="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Введите телефон(необязательно)" value="{{ old('tel') }}" />
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
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Введите ваш email" required value="{{ old('email') }}" />
                                        <label for="email">Введите ваш email</label>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <p>Примечания к заказазу:</p>
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
                            <button class="block text-center back-main col-4 sd-6 b5 pt-1 pb-1 b-main shadow c-p mt-em-3" @if(session('success')) disabled @endif>
                                <img class="col-2 sd-2" src="{{ asset('img/icon/tick.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                            </button>
                        </div>
                    </div>
                </form>

                @else

                
                <div class="col-10 sd-12">
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Имя:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->name }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Фамилия:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->secondname }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Отчество:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->addname }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Способ доставки:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">@if($paymentDetail->delivery == 1) Почта России @elseif($paymentDetail->delivery == 2) Курьерская служба доставки СДЭК @elseif($paymentDetail->delivery == 3) Доставка курьером (только Санкт-Петербург) @else не выбран @endif</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Страна:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">@if($paymentDetail->country == 1) Россия @elseif($paymentDetail->country == 2) Булоруссия @elseif($paymentDetail->country == 3) Украина @elseif($paymentDetail->country == 5) Казахстан @else  @endif</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Индекс:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->zipcode }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Автономный округ:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->autonomous }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Регион:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->region }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Район:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->district }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Город:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->city }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Адрес:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->address }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Телефон получателя:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->phone }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Email получателя:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->email }}</p>
                        </div>
                    </div>
                    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cc">Комментарий к доставке:</p>
                        </div>
                        <div class="pr-em-2 pl-em-2 col-6 sd-6">
                            <p class="cm">{{ $paymentDetail->comment }}</p>
                        </div>
                    </div>
                    <div class="mt-em-2">
                        <a href="{{ route('home.delete') }}" class="button__trigger">Очистить детали оплаты</a>
                    </div>
                    
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@if(session('success'))
{!! session('success') !!}
@endif
@endsection