<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Коробки</h5>
        <p class="cc col-6 sd-12">Отображение коробок ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                <!-- Разобраться с роутером и выводить все на одну страницу --> 
                <a href="{{ route('admin.list', [ 'add' => '' ]) }}" class="rel mr-em-2 @if(Request::is('admin/list')) cm @else ct @endif hover-main line-right">Публичный</a>
                <a href="{{ route('admin.list', [ 'add' => 'txt' ]) }}" class="rel mr-em-2 @if(Request::is('admin/list/txt')) cm @else ct @endif line-right hover-main">Текстовый</a>
                <a href="{{ route('admin.list', [ 'add' => 'avito' ]) }}" class="rel mr-em-2 @if(Request::is('admin/list/avito')) cm @else ct @endif line-right hover-main">Авито</a>
                <a href="{{ route('admin.list', [ 'add' => 'avitotvmodels' ]) }}" class="rel mr-em-2 @if(Request::is('admin/list/avitotvmodels')) cm @else ct @endif line-right hover-main">Авито ТВ Модели</a>
                <a href="{{ route('admin.list', [ 'add' => 'monitor' ]) }}" class="@if(Request::is('admin/list/monitor')) cm @else ct @endif hover-main">Монитор</a>
            </div>
        </div>
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


    </div>
</div>