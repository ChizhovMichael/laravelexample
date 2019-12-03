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
            <div class="col-5">
                    <p class="m-0 ct">Запчасти</p>
            </div>
            <div class="col-3">
                    <p class="m-0 ct">Определить в коробку</p>
            </div>
            <div class="col-3"></div>
        </div>

        @foreach ($box_parts as $tv_model => $box)
            @foreach ($box as $tv_datetime => $part)
                <div class="p-2 bb-light">
                    <p class="m-0 cc mb-em-1">{{ $tv_model }} @if ((int)$tv_datetime != 0) ({{ date('m-d-Y', (int)$tv_datetime) }}) @endif</p>
                    <div>
                        @foreach ($part as $item)
                            
                            <form action="{{ route('admin.box.unsort.add', [ 'id' => $item->id ]) }}" class="col-12 flex-center-between mt-1 mb-1" method="POST">

                                @csrf

                                <div class="form-check mt-1 mb-1 col-5">

                                    <p class="m-0 ct wwbw">{{ $item->get_product_unsort ? $item->get_product_unsort->part_type->parttype_type : '' }} {{ $item->get_product_unsort ? $item->get_product_unsort->part_model : '' }}</p>


                                </div> 
                                <div class="col-3">
                                    <select name="box_box" class="cc flex-center-center back-body b4" required>
                                        @foreach ($boxes as $boxitem)
                                            @if ($boxitem->boxes_name)
                                                <option value="{{ $boxitem->boxes_number }}" class="cc">{{ $boxitem->boxes_name }} [{{ $boxitem->boxes_number }}]</option>
                                            @else
                                                <option value="{{ $boxitem->boxes_number }}" class="cc">{{ $boxitem->boxes_number }}</option>
                                            @endif
                                            
                                        @endforeach                                        
                                    </select>
                                </div>
                                <div class="col-3 flex-center-center">
                                    <button type="submit" class="button__trigger col-10" style="margin: 0">Определить</button>
                                </div>
                            </form>

                        @endforeach                                       
                    </div>                        
                </div>
            @endforeach            
        @endforeach


            
            
        {{-- <form action="#" class="col-12 flex-between">
        
                @csrf

                
                
        </form>   --}}

        

        


    </div>
</div>