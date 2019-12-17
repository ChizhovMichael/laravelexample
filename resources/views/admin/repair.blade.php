<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Реанимация</h5>
        <p class="cc col-6 sd-12">Отображение раздела реанимация ни чуть не изменилось, вы можете делать с ним все тоже самое что и в старой админ панеле</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div class="col-12 sd-12">

                {{-- <form action="#" method="post" class="flex-between">

                    @csrf

                    <!-- Вставить форму не забыть -->

                    <select name="repair_tv_corp_id" class="cc col-5 sd-12 pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" > 
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" class="cc">{{ $company->company }}</option>
                        @endforeach                        
                    </select>

                    <div class="form-label-group bc b5 mt-em-1 col-5 sd-12">
                        <input type="text" id="repair_tv_model" name="repair_tv_model" class="form-control" placeholder="Модель" value="" required/>
                        <label for="repair_tv_model">Модель</label>
                    </div>

                    <div class="form-label-group col-3 sd-12 bc b5 mt-em-2 ">
                        <textarea
                            name="repair_tv_defect"
                            id="repair_tv_defect"
                            class="form-control"
                            placeholder="Дефект"
                            required
                            style="resize: none"
                        ></textarea>
                        <label for="repair_tv_defect">Дефект</label>
                    </div>

                    <div class="form-label-group col-4 sd-12 bc b5 mt-em-2">
                        <textarea
                            name="repair_tv_comment"
                            id="repair_tv_comment"
                            class="form-control"
                            placeholder="Текущее состояние"
                            required
                            style="resize: none"
                        ></textarea>
                        <label for="repair_tv_comment">Текущее состояние</label>
                    </div>

                    <div class="form-label-group col-4 sd-12 bc b5 mt-em-2">
                        <textarea
                            name="repair_tv_looking_part_model"
                            id="repair_tv_looking_part_model"
                            class="form-control"
                            placeholder="Необходимые запчасти"
                            required
                            style="resize: none"
                        ></textarea>
                        <label for="repair_tv_looking_part_model">Необходимые запчасти</label>
                    </div>

                    <button type="submit" class="button__trigger sd-12 col-4 mt-em-2">Добавить</button> 
                </form> --}}

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
        @foreach ($part_without_test as $item)
            <a href="#" class="standart-a hover-shadow ci">
                <div class="flex-between p-2 bb-light">
                    <div class="col-4">
                        <p class="m-0 ct pr-1">{{ $item->part_model }}</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct pr-1">{{ $item->part_comment }}</p>
                    </div>
                    <div class="col-3">
                        <p class="m-0 ct pr-1">{{ $item->part_comment_for_client }}</p>
                    </div>
                    <div class="col-2 flex-center-center">
                        <img src="{{ asset('img/icon/edit.svg') }}" alt="edit" width="30px">
                    </div>
                </div>
            </a>
        @endforeach


        

        @if ($agent->isDesktop())
        {!! $part_without_test->links() !!}
        @else
        {!! $part_without_test->onEachSide(1)->links() !!}
        @endif
        
    </div>
</div>