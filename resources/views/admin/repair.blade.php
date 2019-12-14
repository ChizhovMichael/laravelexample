<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Реанимация</h5>
        <p class="cc col-6 sd-12">Отображение раздела реанимация ни чуть не изменилось, вы можете делать с ним все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div class="col-6 sd-12">

                <form action="#" method="post">

                    @csrf

                    <!-- Вставить форму не забыть -->
                </form>

            </div>
        </div>
        <div class="flex-between b5 shadow p-2 mt-em-3">
            <div class="col-3">
                <p class="m-0 ct">Модель</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Дефект</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Текущее состояние</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Необходимые запчасти</p>
            </div>
        </div>
        <a href="#" class="standart-a hover-shadow ci">
            <div class="flex-between p-2 bb-light">
                <div class="col-3">
                    <p class="m-0 ct">Модель</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Дефект</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Текущее состояние</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Необходимые запчасти</p>
                </div>
            </div>
        </a>
        <div class="flex-between b5 shadow p-2 mt-em-3">
            <div class="col-4">
                <p class="m-0 ct">Модель</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Комментарий</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">Комментарий для клиентов</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct"></p>
            </div>
        </div>
        <a href="#" class="standart-a hover-shadow ci">
            <div class="flex-between p-2 bb-light">
                <div class="col-4">
                    <p class="m-0 ct">Модель</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Дефект</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Текущее состояние</p>
                </div>
                <div class="col-2 flex-center-center">
                    <img src="{{ asset('img/icon/edit.svg') }}" alt="edit" width="30px">
                </div>
            </div>
        </a>
    </div>
</div>