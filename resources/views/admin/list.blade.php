<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Коробки</h5>
        <p class="cc col-6 sd-12">Отображение коробок ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <a href="{{ route('admin.list') }}" class="rel mr-em-2 @if(Request::is('admin/list')) cm @else ct @endif hover-main line-right">Публичный</a>
                <a href="{{ route('admin.list.txt') }}" class="rel mr-em-2 @if(Request::is('admin/list/txt')) cm @else ct @endif line-right hover-main">Текстовый</a>
                <a href="{{ route('admin.list.avito') }}" class="rel mr-em-2 @if(Request::is('admin/list/avito')) cm @else ct @endif line-right hover-main">Авито</a>
                <a href="{{ route('admin.list.avitotvmodels') }}" class="rel mr-em-2 @if(Request::is('admin/list/avitotvmodels')) cm @else ct @endif line-right hover-main">Авито ТВ Модели</a>
                <a href="{{ route('admin.list.monitor') }}" class="@if(Request::is('admin/list/monitor')) cm @else ct @endif hover-main">Монитор</a>
            </div>
        </div>

        @if(Request::is('admin/list'))

            @foreach ($products as $part_type => $collection)

                <h5>{{ $part_type }}</h5>
                <div class="flex-between b5 shadow p-2">
                    <div class="col-4">
                        <p class="m-0 ct">Плата</p>
                    </div>
                    <div class="col-2">
                        <p class="m-0 ct">Бренд</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct">Модель ТВ</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct">Матрица</p>
                    </div>
                </div>
                @foreach ($collection as $product)
                    <a href="#" class="standart-a hover-shadow ci">
                        <div class="flex-between p-2 bb-light">
                            <div class="col-4">
                                <p class="m-0 ct pr-2">{{ $product->part_model }}</p>
                            </div>
                            <div class="col-2">
                                <p class="m-0 ct">{{ $product->company->company }}</p>
                            </div>
                            <div class="col-3">
                                <p class="m-0 ct">{{ $product->tv->tv_model }}</p>
                            </div>
                            <div class="col-3">
                                <p class="m-0 ct">{{ $product->matrix->matrix_model }}</p>
                            </div>
                        </div>
                    </a>        
                @endforeach            
            @endforeach
        
        

        @endif

        @if(Request::is('admin/list/txt'))

            <p>
            
                @foreach ($products as $product)
                    {{ $product->part_model }} ---- {{ $product->company->company }} ---- {{ $product->tv->tv_model }} ---- {{ $product->matrix->matrix_model }}
                @endforeach

            </p>

        @endif

        @if(Request::is('admin/list/avito'))

            <form action="{{ route('admin.list.avito.post') }}" method="post" class="col-7 sd-12 flex-center-between">

                @csrf

                <select name="company" class="cc col-6 sd-12 pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1">
                    @foreach($companies as $item)
                        <option value="{{ $item->id }}" class="cc" @if ($item->id == (int)$companySelected) selected @endif >{{ $item->company }}</option>
                    @endforeach
                    <option value="other">Все остальное</option>
                </select>
                <button type="submit" class="button__trigger col-5 sd-8">Показать</button>
            </form>
            @foreach ($products as $parttype => $product)
                <h5>{{ $parttype }}</h5>
                @if(!is_int($product))
                    @foreach ($product as $item)
                        <p class="mt-0 mb-0">{{ $item->part_model }} @if ($item->part_condition > 0) {{ $part_condition[$item->part_condition] }} @endif <span class="cm">{{ $item->part_cost }}р.</span></p>
                    @endforeach
                @endif
            @endforeach

        @endif

        @if(Request::is('admin/list/avitotvmodels'))

            <form action="{{ route('admin.list.avitotvmodels.post') }}" method="post" class="col-7 sd-12 flex-center-between">

                @csrf

                <select name="company" class="cc col-6 sd-12 pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" required>
                    @foreach($companies as $item)
                        <option value="{{ $item->id }}" class="cc" @if ($item->id == (int)$companySelected) selected @endif >{{ $item->company }}</option>
                    @endforeach
                </select>
                <button type="submit" class="button__trigger col-5 sd-8">Показать</button>
            </form>

            
        
        <p>admin/list/avitotvmodels</p>

        @endif

        @if(Request::is('admin/list/monitor'))
        
        <p>admin/list/monitor</p>

        @endif

    </div>
</div>