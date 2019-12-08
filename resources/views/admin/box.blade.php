<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Коробки</h5>
        <p class="cc col-6 sd-12">Отображение коробок ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <a href="{{ route('admin.box') }}" class="rel mr-em-2 @if(Request::is('admin/box')) cm @else ct @endif hover-main line-right">Все</a>
                <a href="{{ route('admin.box.unsort') }}" class="rel mr-em-2 @if(Request::is('admin/box/unsort')) cm @else ct @endif line-right hover-main">Неотсортированные</a>
                <a href="{{ route('admin.box.control') }}" class="@if(Request::is('admin/box/control')) cm @else ct @endif hover-main">Управление</a>
            </div>
        </div>
        <div class="flex-between b5 shadow p-2">
            <div class="col-1">
                <p class="m-0 ct">№</p>
            </div>
            <div class="col-8">
                <p class="m-0 ct">Запчасти</p>
            </div>
            <div class="col-3"></div>
        </div>

        @foreach ($box_parts as $box => $part)            
            <div class="flex-between p-2 bb-light">
                <div class="col-1">
                    <p class="m-0 ct">{{ $box }}</p>
                </div>
                <div class="col-8">
                    @foreach ($part as $item)
                        <p class="m-0 ct">{{ $item->get_product ? '[' . $item->get_product->id . '] ' . $item->get_product->part_model : '' }}</p>
                    @endforeach                    
                </div>
                <div class="col-3"></div>
            </div>           
        @endforeach

        <h5>Коробка #20</h5>

        @foreach ($box_parts_20 as $company => $part)
            <div class="flex-between p-2 bb-light">
                <div class="col-1">
                    <p class="m-0 ct">{{ $company }}</p>
                </div>
                <div class="col-8">
                    @foreach ($part as $item)
                        <p class="m-0 ct">{{ $item->get_product ? '[' . $item->get_product->id . '] ' . $item->get_product->part_model : '' }}</p>
                    @endforeach                    
                </div>
                <div class="col-3"></div>
            </div>
            
        @endforeach

        


    </div>
</div>