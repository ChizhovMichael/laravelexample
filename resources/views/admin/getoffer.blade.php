<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Нашли дешевле</h5>
        <p class="cc col-6 sd-12">Отображение раздела Нашли дешевле? Отмечайте какие сообщения вами обработаны, а какие нет. В данном разделе не предусмотрены автоматические отправки писем. Только на этапе запроса самим клиентом. Ему отправляется сообщение, что его заявка отправлена на рассмотрение. Т.е. если вы обработали сообщение, пожалуйста, свяжитесь с клиентом самостоятельно.</p>

        <div class="flex-between b5 shadow-xs p-2">
            <div class="col-2">
                <p class="m-0 ct">Имя</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Email</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">Ссылка на товар</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Дата запроса</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct"></p>
            </div>
        </div>

        @foreach ($pricerequest as $item)
            <div class="flex-between p-2 bb-light">
                <div class="col-2">
                    <p class="m-0 ct @if($item->checked != 'on') bold @endif">{{ $item->name }}</p>
                </div>
                <div class="col-3">
                    <a href="mailto:{{ $item->email }}" class="m-0 cm standart-a @if($item->checked != 'on') bold @endif">{{ $item->email }}</a>
                </div>
                <div class="col-2">
                    <a href="{{ $item->url }}" class="m-0 cm standart-a @if($item->checked != 'on') bold @endif">Посмотреть</a>
                </div>
                <div class="col-3">
                    <p class="m-0 ct @if($item->checked != 'on') bold @endif">{{  $item->created_at }}</p>
                </div>
                <div class="col-2">
                    <form action="{{ route('admin.getoffer.checked', [ 'id' => $item->id ]) }}" method="POST" id="change-form-{{ $item->id }}">

                        @csrf

                        <div class="form-check">
                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="show" id="show_{{ $item->id }}" @if($item->checked == 'on') checked @endif onchange="event.preventDefault();
                            document.getElementById('change-form-{{ $item->id }}').submit();">
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="show_{{ $item->id }}">
                                Обработан
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>