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
                <a href="#" class="@if(Request::is()) cm @else ct @endif hover-main">Управление</a>
            </div>
        </div>
        <div class="flex-between b5 shadow p-2">
            <div class="col-3">
                <p class="m-0 ct">Телевизор</p>
            </div>
            <div class="col-6">
                <p class="m-0 ct">Запчасти</p>
            </div>
            <div class="col-3"></div>
        </div>

        @foreach ($box_parts as $tv => $box)            
            <div class="flex-between p-2 bb-light">
                <div class="col-3">
                    <p class="m-0 ct">{{ $tv }}</p>
                    <p class="m-0 ct">{{ $box->get_product_unsort->tv->tv_datetime }}</p>
                </div>
                <div class="col-6">
                    <p class="m-0 ct">{{ $box->get_product_unsort->part_type->parttype_type }}</p>
                    <p class="m-0 ct">{{ $box->get_product_unsort->part_model }}</p>             
                </div>
                <div class="col-3">

                </div>
            </div>            
        @endforeach

        


    </div>
</div>