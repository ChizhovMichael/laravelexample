@extends('layouts.app') 
@section('content')
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
                
                <a href="{{ route('home') }}" class="cm hover mt-em-1">Детали оплаты</a>            
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

                    @component('components.paymentdetailform')
                    @endcomponent

                    <button class="block text-center back-main col-4 sd-6 b5 pt-1 pb-1 b-main shadow c-p mt-em-3">
                        <img class="col-2 sd-2" src="{{ asset('img/icon/tick.svg') }}" alt="Запчасти для телевизоров, название товара + артикул">
                    </button>

                </form>

                @else

                @component('components.paymentdetail', [ 'paymentDetail' => $paymentDetail, 'additional' => false ])
                @endcomponent
                
                @endif
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    @component('components.message')
        @slot('title')
            {!! session('success') !!}
        @endslot

        {!! session('message') !!}

    @endcomponent
@endif
@endsection