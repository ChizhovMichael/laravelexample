<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Заказы</h5>
        <p class="cc col-6 sd-12">Отображение заказов ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <a href="{{ route('admin.order.all') }}" class="rel mr-em-2 @if(Request::is('admin/order/all')) cm @else ct @endif line-right hover-main">Все</a>
                <a href="{{ route('admin.order') }}" class="@if(Request::is('admin/order')) cm @else ct @endif hover-main">Отображать по 50</a>
            </div>
        </div>
        <div class="flex-between b5 shadow p-2">
            <div class="col-1">
                <p class="m-0 ct">№</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Имя</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Трек-номер</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">Статус</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">Оплата</p>
            </div>
            <div class="col-1">
                <p class="m-0 ct text-center">Доставка</p>
            </div>
        </div>
        @foreach($orderlist as $order)
        
        <a href="{{ route('admin.order.detail', ['id' => $order->id]) }}" class="standart-a hover-shadow ci">
            <div class="flex-between p-2 bb-light @if($order->order_status == 0) line-through @endif">

                <div class="col-1 pr-1">
                    <p class="m-0 cc">{{ $order->id }}</p>
                    <div class="col-12 b5 mt-em-1" style="height: 2em; background: @if($order->order_status == 0) repeating-linear-gradient(-60deg, #555 0, #555 1px, transparent 1px, transparent 5px) @elseif($order->order_status == 1) #409FFF @elseif($order->order_status == 2) #FFFF3E @elseif($order->order_status == 3) #9AFF35 @else #C60 @endif"></div>
                </div>
                <div class="col-3 pr-1 br-light">
                    <p class="m-0 cm wwbw">{{ $order->order_lname }} {{ $order->order_fname }} {{ $order->order_mname }}, <span class="cc">{{ $order->order_index }} @if($order->order_country == 1) Россия @elseif($order->order_country == 2) Булоруссия @elseif($order->order_country == 3) Украина @elseif($order->order_country == 5) Казахстан @else Неизвестная страна @endif {{ $order->order_autonomous }} {{ $order->order_region }} {{ $order->order_city }} {{ $order->order_district }} {!! $order->order_address !!}</span></p>
                    <p class="ct mt-2 mb-2 wwbw">{{ $order->order_email }}</p>
                    <p class="ct mt-2 mb-2">{{ date('Y-m-d H:i:s', $order->order_timestamp) }}</p>


                    @foreach($order->get_part as $part)
                    <div class="flex-center-between">
                        <p class="mt-2 mb-2 cm wwbw col-9">{{ $part->get_product->part_model }}</p>
                        <p class="cm wwbw bold m-v-auto col-2">[{{ $part->get_product->get_box->box_box }}]</p>
                    </div>
                    @endforeach

                </div>
                <div class="col-3 pl-1">
                    <p class="m-0 cc">{{ $order->order_tracking }}</p>
                </div>
                <div class="col-2">
                    <p class="m-0 cc">@if($order->order_status == 0) Отменен @elseif($order->order_status == 1) Ожидает оплаты @elseif($order->order_status == 2) Упаковывается @elseif($order->order_status == 3) Отправлен @else Возврат @endif</p>
                </div>
                <div class="col-2">
                    <p class="m-0 ct">@if($order->order_payment == 1) Оплачен ({{ $order->paymethod }}) @elseif($order->order_payment == 2) Наложенный @else Неопалчен ({{ $order->paymethod }}) @endif</p>
                </div>
                <div class="col-1">
                    <p class="m-0 cc text-center">
                        @if($order->order_delivery == 1) ПР @elseif($order->order_delivery == 2) СДЭК @elseif($order->order_delivery == 3) Курьер (только Санкт-Петербург) @else не выбран @endif
                    </p>
                </div>


            </div>
        </a>
        @endforeach

        @if(Request::is('admin/order'))

        @if ($agent->isDesktop())
        {!! $orderlist->links() !!}
        @else
        {!! $orderlist->onEachSide(1)->links() !!}
        @endif

        @endif


    </div>
</div>