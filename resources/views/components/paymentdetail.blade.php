<div class="col-10 sd-12">
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Имя:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->name }}</p>
            @if($additional)
                <input type="hidden" name="firstname" value="{{ $paymentDetail->name }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Фамилия:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->secondname }}</p>
            @if($additional)
                <input type="hidden" name="secondname" value="{{ $paymentDetail->secondname }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Отчество:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->addname }}</p>
            @if($additional)
                <input type="hidden" name="addname" value="{{ $paymentDetail->addname }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Способ доставки:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">@if($paymentDetail->delivery == 1) Почта России @elseif($paymentDetail->delivery == 2) Курьерская служба доставки СДЭК @elseif($paymentDetail->delivery == 3) Доставка курьером (только Санкт-Петербург) @else не выбран @endif</p>
            @if($additional)
                <input type="hidden" name="delivery" value="{{ $paymentDetail->delivery }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Страна:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">@if($paymentDetail->country == 1) Россия @elseif($paymentDetail->country == 2) Булоруссия @elseif($paymentDetail->country == 3) Украина @elseif($paymentDetail->country == 5) Казахстан @else @endif</p>
            @if($additional)
                <input type="hidden" name="country" value="{{ $paymentDetail->country }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Индекс:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->zipcode }}</p>
            @if($additional)
                <input type="hidden" name="zipcode" value="{{ $paymentDetail->zipcode }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Автономный округ:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->autonomous }}</p>
            @if($additional)
                <input type="hidden" name="autoregion" value="{{ $paymentDetail->autonomous }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Регион:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->region }}</p>
            @if($additional)
                <input type="hidden" name="region" value="{{ $paymentDetail->region }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Район:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->district }}</p>
            @if($additional)
                <input type="hidden" name="district" value="{{ $paymentDetail->district }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Город:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->city }}</p>
            @if($additional)
                <input type="hidden" name="city" value="{{ $paymentDetail->city }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Адрес:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->address }}</p>
            @if($additional)
                <input type="hidden" name="address" value="{{ $paymentDetail->address }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Телефон получателя:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->phone }}</p>
            @if($additional)
                <input type="hidden" name="tel" value="{{ $paymentDetail->phone }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Email получателя:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->email }}</p>
            @if($additional)
                <input type="hidden" name="email" value="{{ $paymentDetail->email }}">
            @endif
        </div>
    </div>
    <div class="flex-between shadow-xs b4 mt-em-1 mb-em-1">
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cc">Комментарий к доставке:</p>
        </div>
        <div class="pr-em-2 pl-em-2 col-6 sd-6">
            <p class="cm">{{ $paymentDetail->comment }}</p>
            @if($additional)
                <input type="hidden" name="message" value="{{ $paymentDetail->comment }}">
            @endif
        </div>
    </div>

    @if(!$additional)
    <div class="mt-em-2">
        <a href="{{ route('home.delete') }}" class="button__trigger">Очистить детали оплаты</a>
    </div>
    @endif

</div>