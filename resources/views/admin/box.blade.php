<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Коробки</h5>
        <p class="cc col-6 sd-12">Отображение коробок ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <a href="#" class="rel mr-em-2 @if(Request::is('admin/box')) cm @else ct @endif hover-main line-right">Все</a>
                <a href="#" class="rel mr-em-2 @if(Request::is()) cm @else ct @endif line-right hover-main">Неотсортированные</a>
                <a href="#" class="@if(Request::is()) cm @else ct @endif hover-main">Управление</a>
            </div>
        </div>
        <div class="flex-between b5 shadow p-2">
            <div class="col-1">
                <p class="m-0 ct">№</p>
            </div>
            <div class="col-10">
                <p class="m-0 ct">Запчасти</p>
            </div>
        </div>

        @foreach ($box_parts as $box => $part)
            @if ($box != 20)
                <div class="flex-between p-2 bb-light">
                    <div class="col-1">
                        <p class="m-0 ct">{{ $box }}</p>
                    </div>
                    <div class="col-10">
                        @foreach ($part as $item)
                            <p class="m-0 ct">{{ $item->get_product ? '[' . $item->get_product->id . '] ' . $item->get_product->part_model : '' }}</p>
                        @endforeach                    
                    </div>
                </div>
            @endif            
        @endforeach

        


    </div>
</div>