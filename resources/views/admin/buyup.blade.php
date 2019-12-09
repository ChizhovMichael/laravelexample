<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Скупка</h5>
        <p class="cc col-6 sd-12">Отображение заказов ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between b5 shadow p-2">
            <div class="col-1">
                <p class="m-0 ct">№</p>
            </div>
            <div class="col-4">
                <p class="m-0 ct">Инфо</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">Цена</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">Моя цена</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Контакты</p>
            </div>
        </div>
        @foreach ($skypka as $item)
        <a href="{{ route('admin.buyup.detail', ['id' => $item->id ]) }}" class="standart-a hover-shadow ci mt-1 block">
            <div class="flex-between bb-light b3 p-2 @if( $item->skypka_status == 2 ) status-error @elseif ( $item->skypka_status == 1 ) status-success @else @endif">
                <div class="col-1">
                <p class="m-0 ct">{{ $item->id }}</p>
                </div>
                <div class="col-4 pr-2">
                    <p class="m-0 ct">{{ $item->skypka_tv_model }}</p>
                    <p class="m-0 ca">{{ $item->skypka_defect }}</p>
                    @if ($item->skypka_delivery_option == 1)
                        <p class="m-0 cc">{{ $item->skypka_user_adress }}</p>
                    @else
                        <p class="m-0 cc">Привезут</p>
                    @endif
                    
                </div>
                <div class="col-2">
                    <p class="m-0 ct">{{ $item->skypka_cost }}</p>
                </div>
                <div class="col-2">
                    <p class="m-0 ct">{{ $item->skypka_self_cost }}</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">{{ $item->skypka_phone }}</p>
                    <p class="m-0 ct">{{ $item->skypka_email }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>