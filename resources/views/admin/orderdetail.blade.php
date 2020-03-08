<div class="flex-between pb-em-5">
    <div class="col-12 sd-12 flex-between">

        <div class="col-5 sd-12 shadow pt-em-1 pb-em-1 pr-em-2 pl-em-2 b5">
            <h5 class="ct mt-0">Заказ №{{ $order->id }}</h5>
            <div class="col-10 sd-12 b5 mt-em-1 flex-center-center" style="height: 3em; background: @if($order->order_status == 0) repeating-linear-gradient(-60deg, #555 0, #555 1px, transparent 1px, transparent 5px) @elseif($order->order_status == 1) #409FFF @elseif($order->order_status == 2) #FFFF3E @elseif($order->order_status == 3) #9AFF35 @else #C60 @endif">
                <p class="ct m-0">@if($order->order_status == 0) Отменен @elseif($order->order_status == 1) Ожидает оплаты @elseif($order->order_status == 2) Упаковывается @elseif($order->order_status == 3) Отправлен @else Возврат @endif</p>
            </div>
            <div>
                <p>Кому: <span class="cm">{{ $order->order_lname }} {{ $order->order_fname }} {{ $order->order_mname }}</span></p>
                <p class="cc">Куда: {{ $order->order_index }} @if($order->order_country == 1) Россия @elseif($order->order_country == 2) Булоруссия @elseif($order->order_country == 3) Украина @elseif($order->order_country == 5) Казахстан @else Неизвестная страна @endif {{ $order->order_autonomous }} {{ $order->order_region }} {{ $order->order_city }} {{ $order->order_district }} {!! $order->order_address !!}</p>
                <p class="cc">Доставка: @if($order->order_delivery == 1) ПР @elseif($order->order_delivery == 2) СДЭК @elseif($order->order_delivery == 3) Курьер (только Санкт-Петербург) @else не выбран @endif</p>
                <p>Email: <span class="cm">{{ $order->order_email }}</span></p>
                <p>Телефон: <span class="cm">{{ $order->order_phone }}</span></p>
                <p>Комментарий: {{ $order->order_comment }}</p>
                <p class="cc">Время заказа: {{ date('Y-m-d H:i:s', $order->order_timestamp) }}</p>
                @if($order->order_status == 3)
                <p class="mt-em-2 bt-light pt-em-1">Трек-номер: <span class="cm bold">{{ $order->order_tracking }}</span></p>
                @endif
            </div>
        </div>
        

        <div class="col-6 sd-12">
            @foreach($products as $item)
            <div class="flex-between col-10 sd-12 rel mt-em-1 mb-em-1 b5 @if($item->part_cancel == 1) line-through back-through @endif">
                <div class="col-4 sd-12 shadow-xs">
                    <img src="/img/products/{{ $item->company_id }}/{{ $item->tv_id }}/m{{ $item->part_img_name }}" alt="запчасть" class="b5 col-12 sd-12">
                </div>
                <div class="col-5 sd-10">
                    <a class="mb-1 cm hover" href="{{ route('product.show', [ 'slug' => $item->part_link ]) }}" target="_blank">{{ $item->part_model }}</a>
                    <p class="cc m-0">{{ $item->order_count }} шт. х {{ $item->part_cost }} = {!! $item->order_count*$item->part_cost !!}</p>
                    <p class="mt-1 cm bold">[{{ $item->box_box }}]</p>
                </div>                
                <div class="col-2 sd-2 rel">
                    @if ($item->part_cancel == 0)
                    <a href="{{ route('admin.order.detail.delete.part', ['part_id' => $item->part_id, 'order_part_count' => $products->count(), 'order_status' => $order->order_status, 'order_id' => $order->id, 'order_timestamp' => $order->order_timestamp  ]) }}" class="edit abs shadow">
                        <img src="{{ asset('img/icon/delete.png') }}" alt="delete" class="sd-12 col-12">
                    </a>
                    @endif
                </div>
            </div>
            @endforeach

            <h5 class="ct bt-light pt-em-1">Общая сумма:  {{ $sum }} руб</h5>

            
        </div>

        @if($order->order_status == 1 ||  $order->order_status == 2)

            <div class="col-12 sd-12 mt-em-2 flex-between">

                <div class="sd-12 col-6">
                    
                    @if($order->order_status == 1)
                    <h5>Оплата</h5>

                    <form action="{{ route('admin.order.checked', [ 'id' => $order->id, 'sum' => $sum ]) }}" method="POST">
                        
                        @csrf

                        <div class="form-check mt-em-1 mb-em-1">
                            <input class="form-check-input" type="radio" name="order_payment" id="order_payment_1" value="1" required/>
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="order_payment_1">
                                Перевод
                            </label>
                        </div>
                        <div class="form-check mt-em-1 mb-em-1">
                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="mailstatus" id="mailstatus" />
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="mailstatus">
                                Без почты
                            </label>
                        </div>
                        <div class="flex-between">
                            <button type="submit" class="button__trigger col-7 sd-5">Подтвердить</button>
                        </div>
                    </form>

                    @else

                    <h5>Трек-номер</h5>
                    <form action="{{ route('admin.order.tracking', [ 'id' => $order->id ]) }}" method="POST">

                        @csrf

                        <div class="form-label-group col-10 sd-12 bc b5 rel">
                            <input type="text" id="tracking" name="order_tracking" class="form-control" placeholder="Введите трек-номер" required value="{{ $order->order_tracking }}" />
                            <label for="tracking">Введите трек-номер</label>
                        </div>

                        <div class="form-check mt-em-1 mb-em-1">
                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="mailstatus" id="mailstatus" />
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="mailstatus">
                                Без почты
                            </label>
                        </div>


                        <div class="flex-between">
                            <button type="submit" class="button__trigger col-7 sd-5">Подтвердить</button>
                        </div>
                    </form>


                    @endif

                </div>

                <div class="col-6 sd-12">

                    <h5>Отмена заказа</h5>
                    <form action="{{ route('admin.order.delete', [ 'id' => $order->id ]) }}" method="POST">
                        @csrf
                        <div class="form-check mt-em-1 mb-em-1">
                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="mailstatus" id="cancelmailstatus" />
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="cancelmailstatus">
                                Без почты
                            </label>
                        </div>
                        <div class="flex-between">
                            <button type="submit" class="button__trigger delete col-7 sd-5">Подтвердить</button>
                        </div>
                    </form>
                
                </div>

            </div>

            @endif
        
        

    </div>
</div>