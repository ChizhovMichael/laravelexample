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
    <form action="{{ route('checkout.post') }}" method="POST" enctype="multipart/form-data">

        @csrf


        <div class="flex-between pt-em-5 pb-em-5 pr-5 pl-5 col-12">
            <div class="col-6 sd-12 pr-5">




                <div>
                    <h3>Детали оплаты</h3>
                </div>

                
                @if($paymentDetail == NULL)

                @component('components.paymentdetailform')
                @endcomponent

                @else

                @component('components.paymentdetail', [ 'paymentDetail' => $paymentDetail, 'additional' => true ])
                @endcomponent

                @endif



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
    @if(session('success'))
        @component('components.message')
            @slot('title')
                {!! session('success') !!}
            @endslot

            {!! session('message') !!}

        @endcomponent
    @endif
    @include('includes.footer')

</body>

</html>