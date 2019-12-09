<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">{{ $skypka->skypka_tv_model }}</h5>
        <p class="cc col-6 sd-12">Давай, купи эту суку. Ты должен владеть ей)</p>
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
        <div class="flex-between bb-light b3 p-2">
            <div class="col-1">
                <p class="m-0 ct">{{ $skypka->id }}</p>
            </div>
            <div class="col-4 pr-2">
                <p class="m-0 ct">{{ $skypka->skypka_tv_model }}</p>
                <p class="m-0 ca">{{ $skypka->skypka_defect }}</p>
                @if ($skypka->skypka_delivery_option == 1)
                    <p class="m-0 cc">{{ $skypka->skypka_user_adress }}</p>
                @else
                    <p class="m-0 cc">Привезут</p>
                @endif
            </div>
            <div class="col-2">
                <p class="m-0 ct">{{ $skypka->skypka_cost }}</p>
            </div>
            <div class="col-2">
                <p class="m-0 ct">{{ $skypka->skypka_self_cost }}</p>
            </div>
            <div class="col-3">
                <p class="m-0 ct">{{ $skypka->skypka_phone }}</p>
                <p class="m-0 ct">{{ $skypka->skypka_email }}</p>
            </div>
        </div>
        <form action="{{ route('admin.buyup.detail.post', [ 'id' => $skypka->id ]) }}" method="post" class="col-6 sd-12">

            @csrf

            <div class="form-label-group sd-12 bc b5 mt-em-1">
                <input type="text" id="skypka_self_cost" name="skypka_self_cost" class="form-control" placeholder="Моя цена" value="{{ $skypka->skypka_self_cost ?: '' }}">
                <label for="skypka_self_cost">Моя цена</label>
            </div>

            <div class="form-check mt-em-1 mb-em-1">

                <input class="form-check-input" data-form="brands-check" type="radio" name="skypka_status" id="skypka_status_0" value="0" @if ($skypka->skypka_status == 0) checked @endif>
                <span class="form-check-span"></span>
                <label class="form-check-label ct" for="skypka_status_0">
                    Оставить статус без именений
                </label>

            </div>

            <div class="form-check mt-em-1 mb-em-1">

                <input class="form-check-input" data-form="brands-check" type="radio" name="skypka_status" id="skypka_status_1" value="1" @if ($skypka->skypka_status == 1) checked @endif>
                <span class="form-check-span"></span>
                <label class="form-check-label ct" for="skypka_status_1">
                    Выкуплен
                </label>

            </div>

            <div class="form-check mt-em-1 mb-em-1">

                <input class="form-check-input" data-form="brands-check" type="radio" name="skypka_status" id="skypka_status_2" value="2" @if ($skypka->skypka_status == 2) checked @endif>
                <span class="form-check-span"></span>
                <label class="form-check-label ct" for="skypka_status_2">
                    Отменен
                </label>

            </div>
            <button type="submit" class="button__trigger col-6 sd-12">Сохранить</button>

        </form>
    </div>
</div>