<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Заказы №{{ $order->id }}</h5>
        <div class="col-3 sd-12 b5 mt-em-1 flex-center-center" style="height: 3em; background: @if($order->order_status == 0) repeating-linear-gradient(-60deg, #555 0, #555 1px, transparent 1px, transparent 5px) @elseif($order->order_status == 1) #409FFF @elseif($order->order_status == 2) #FFFF3E @elseif($order->order_status == 3) #9AFF35 @else #C60 @endif">
            <p class="cb m-0">@if($order->order_status == 0) Отменен @elseif($order->order_status == 1) Ожидает оплаты @elseif($order->order_status == 2) Упаковывается @elseif($order->order_status == 3) Отправлен @else Возврат @endif</p>
        </div>
        <div class="col-4 sd-12">
            <p>Кому: <span class="cm">{{ $order->order_lname }} {{ $order->order_fname }} {{ $order->order_mname }}</span></p>
            <p class="cc">Куда: {{ $order->order_index }} @if($order->order_country == 1) Россия @elseif($order->order_country == 2) Булоруссия @elseif($order->order_country == 3) Украина @elseif($order->order_country == 5) Казахстан @else Неизвестная страна @endif {{ $order->order_autonomous }} {{ $order->order_region }} {{ $order->order_city }} {{ $order->order_district }} {!! $order->order_address !!}</p>
            <p class="cc">Доставка: @if($order->order_delivery == 1) ПР @elseif($order->order_delivery == 2) СДЭК @elseif($order->order_delivery == 3) Курьер (только Санкт-Петербург) @else не выбран @endif</p>
            <p>Email: <span class="cm">{{ $order->order_email }}</span></p>
            <p>Телефон: <span class="cm">{{ $order->order_phone }}</span></p>
            <p>Комментарий: {{ $order->order_comment }}</p>
            <p class="cc">Время заказа: {{ date('Y-m-d H:i:s', $order->order_timestamp) }}</p>

            
            @foreach($products as $item)

            <div class="flex-between col-6 sd-12">
                <div class="col-6 sd-12">
                    <img src="/img/products/{{ $item->company_id }}/{{ $item->tv_id }}/m{{ $item->part_img_name }}" alt="запчасть" class="b5">
                </div>
            </div>


            @endforeach

        </div>
        

    </div>
</div>