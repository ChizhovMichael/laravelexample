<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Продажи</h5>
        <p class="cc col-6 sd-12">Отображение продаж ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>

        @foreach ($salelist as $year => $monthsalelist)

            @foreach ($monthsalelist as $month => $list)

                <h5>{{ strtr($month, $monthcollection) }} {{ $year }}</h5>
                <div class="flex-between b5 shadow-xs p-2">
                    <div class="col-2">
                        <p class="m-0 ct">Группа</p>
                    </div>
                    <div class="col-4">
                        <p class="m-0 ct">Продажи</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct">Заказы</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct">%</p>
                    </div>
                </div>

                @foreach ($list->sortByDesc('group_id') as $item)

                    @if ( $item->group_id != 0)

                    <div class="flex-between p-2 bb-light">
                        <div class="col-2">
                            <p class="m-0 ct">{{ $item->group_id }}</p>
                        </div>
                        <div class="col-4">
                            <p class="m-0 ct">{{ $item->sales_turnover }}</p>
                        </div>
                        <div class="col-3">
                            <p class="m-0 ct">{{ $item->sales_orders }}</p>
                        </div>
                        <div class="col-3">
                            <p class="m-0 ct">{{ round($item->sales_orders * 100 / $list->max('sales_orders'), 2) }}</p>
                        </div>
                    </div>

                    @else

                    <div class="flex-between p-2 bb-light">
                        <div class="col-2">
                            <p class="m-0 ct">-</p>
                        </div>
                        <div class="col-4">
                            <p class="m-0 cm-bold">{{ $item->sales_turnover }}</p>
                        </div>
                        <div class="col-3">
                            <p class="m-0 cm-bold">{{ $item->sales_orders }}</p>
                        </div>
                        <div class="col-3">
                            <p class="m-0 ct bold"></p>
                        </div>
                    </div>
                        
                    @endif
                    
                    
                @endforeach
                
            @endforeach
            
        @endforeach
       
        
    </div>
</div>