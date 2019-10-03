<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Главная навигация</h5>
        <p class="cc">Для напоминания: создавая раздел, вы обязаны указать как минимум один подраздел. Это связано с тем, что ссылки на подразделы забиты в отдельной таблице. Нахуя и зачем? не спрашивайте.</p>
        <p class="mb-10 cc">Для примера: создайте раздел: со ссылкой ... что-то там ... _main. И добавьте требуемый подраздел. Поскольку у нас все никак у людей, где сначала создается раздел, а затем подраздел, нам пришлось идти от обратного</p>

        @foreach($navigations as $navigation)

        <div class="mt-em-1 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3">
            <div class="form-check">

                <input class="form-check-input abs" type="checkbox" id="{{ $navigation->slug }}">
                <label class="form-check-label flex-between" for="{{ $navigation->slug }}">
                    <span class="ct">{{ $navigation->name }}</span>
                    <span class="cc hover-main">Редактировать</span>
                </label>

                <div class="b5 sd-12 col-12 mt-em-1">

                    <form action="{{ route('admin.navigation.save.section', [ 'id' => $navigation->id ]) }}" method="POST">

                        @csrf

                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                            <input type="text" id="{{ $navigation->name }}" name="name" class="form-control" placeholder="Название раздела" value="{{ $navigation->name }}">
                            <label for="{{ $navigation->name }}">Название раздела</label>
                        </div>
                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                            <input type="text" id="{{ $navigation->slug }}" name="slug" class="form-control" placeholder="Ссылка" value="{{ $navigation->slug }}">
                            <label for="{{ $navigation->slug }}">Ссылка</label>
                        </div>
                        <div class="form-check mt-em-1 mb-em-1">

                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="show" id="show_{{ $navigation->slug }}" @if($navigation->show == 'on') checked @endif>
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="show_{{ $navigation->slug }}">
                                Показывать подразделы
                            </label>

                        </div>
                        <div class="flex-between">
                            <a href="{{ route('admin.navigation.delete.section', ['id' => $navigation->id ]) }}" class="button__trigger delete col-4 sd-5">Удалить</a>
                            <button type="submit" class="button__trigger col-4 sd-5">Сохранить</button>
                        </div>

                    </form>


                    <div class="col-12 sd-12 flex-center-end">


                        @foreach($navigation->navigation_items as $add)
                        <div class="mt-em-1 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 col-10 sd-10">
                            <div class="form-check">


                                <input class="form-check-input abs" type="checkbox" id="{{ $add->additional_slug }}">
                                <label class="form-check-label flex-between" for="{{ $add->additional_slug }}">
                                    <span class="ct">{{ $add->additional_name }}</span>
                                    <span class="cc hover-main">Редактировать</span>
                                </label>

                                <div class="b5 sd-12 col-12 mt-em-1">


                                    <form action="{{ route('admin.navigation.save.subsection', [ 'id' => $add->id, 'navigation' => $navigation->id ]) }}" method="POST">

                                        @csrf

                                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                                            <input type="text" id="{{ $add->additional_name }}" name="additional_name" class="form-control" placeholder="Название подраздела" value="{{ $add->additional_name }}" required>
                                            <label for="{{ $add->additional_name }}">Название подраздела</label>
                                        </div>
                                        
                                        <select name="parttype" class="cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" required>
                                            @foreach($parttype as $item)
                                                @if($add->additional_id == $item->id)
                                                <option value="{{ $item->id }}" class="cc" selected>{{ $item->parttype_type }}</option>
                                                @else
                                                <option value="{{ $item->id }}" class="cc">{{ $item->parttype_type }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        <div class="form-check mt-em-1 mb-em-1">

                                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="show" id="show_{{ $add->additional_slug}}" @if($add->show == 'on') checked @endif>
                                            <span class="form-check-span"></span>
                                            <label class="form-check-label ct" for="show_{{ $add->additional_slug }}">
                                                Показывать в меню
                                            </label>

                                        </div>

                                        <div class="flex-between">
                                            <a href="{{ route('admin.navigation.delete.subsection', ['id' => $add->id ]) }}" class="button__trigger delete col-4 sd-5">Удалить</a>
                                            <button type="submit" class="button__trigger col-4 sd-5">Сохранить</button>
                                        </div>

                                    </form>
                                </div>


                            </div>
                        </div>
                        @endforeach

                        <div class="mt-em-3 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 b-main col-10 sd-10">
                            <div class="form-check">

                                <input class="form-check-input abs" type="checkbox" id="new_{{ $navigation->slug }}">
                                <label class="form-check-label flex-between" for="new_{{ $navigation->slug }}">
                                    <span class="ct">Добавить подраздел</span>
                                </label>

                                <div class="b5 sd-12 col-12 mt-em-1">

                                    <form action="{{ route('admin.navigation.add.subsection', ['navigation_id' => $navigation->id ]) }}" method="POST">

                                        @csrf

                                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                                            <input type="text" id="add_{{ $navigation->slug }}" name="additionalname" class="form-control" placeholder="Название подраздела" required value="{{ old('additionalname') }}">
                                            <label for="add_{{ $navigation->slug }}">Название подраздела</label>
                                        </div>
                                        <select name="additional_id" class="cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" required>
                                            @foreach($parttype as $item)          
                                                <option value="{{ $item->id }}" class="cc">{{ $item->parttype_type }}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-check">

                                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="show" id="show_add_{{ $navigation->slug }}" checked>
                                            <span class="form-check-span"></span>
                                            <label class="form-check-label ct" for="show_add_{{ $navigation->slug }}">
                                                Показывать в меню
                                            </label>

                                        </div>

                                        <div class="flex-between">
                                            <button type="submit" class="button__trigger col-4 sd-5">Сохранить</button>
                                        </div>

                                        

                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>

        @endforeach

        @if ($errors->has('additional_id'))
        <span class="invalid-feedback mt-em-1 mb-em-1 block" role="alert">
            <strong>{{ $errors->first('additional_id') }}</strong>
        </span>
        @endif

        @if ($errors->has('slug'))
        <span class="invalid-feedback mt-em-1 mb-em-1 block" role="alert">
            <strong>{{ $errors->first('slug') }}</strong>
        </span>
        @endif



        <div class="mt-em-3 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 b-main">
            <div class="form-check">

                <input class="form-check-input abs" type="checkbox" id="addsection">
                <label class="form-check-label flex-between" for="addsection">
                    <span class="ct">Добавить раздел</span>
                </label>

                <div class="b5 sd-12 col-12 mt-em-1">

                    <form action="{{ route('admin.navigation.add.section') }}" method="POST">

                        @csrf

                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                            <input type="text" id="addname" name="name" class="form-control" placeholder="Название раздела" required value="{{ old('name') }}">
                            <label for="addname">Название раздела</label>
                        </div>
                        <div class="form-label-group sd-12 bc b5 mt-em-1">
                            <input type="text" id="addslug" name="slug" class="form-control" placeholder="slug" required value="{{ old('slug') }}">
                            <label for="addslug">slug</label>
                        </div>
                        <div class="form-check mt-em-1 mb-em-1">

                            <input class="form-check-input" data-form="brands-check" type="checkbox" name="show" id="showsection" checked>
                            <span class="form-check-span"></span>
                            <label class="form-check-label ct" for="showsection">
                                Показывать подразделы
                            </label>

                        </div>
                        <div class="flex-between">
                            <button type="submit" class="button__trigger col-4 sd-5">Сохранить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
<div class="mb-em-5">
<h5>Slug или ссылка</h5>
<img src="{{ asset('img/admin/slug.png') }}" alt="slug" class="col-12 sd-12">
<p class="cc">Slug - это уникальный path-ссылка. Она не должна повторяться, поскольку тогда вы получите дубли страниц. Хоть в данной системе и настоена валидация на проверку уникальности значений slug, постарайтесь также контролировать и себя при заполнении форм. Slug не может содежать пробеды или спец символы и также должен индецифировать страницу. Также старайтесь избегать заглавных букв</p>
<p class="cc m-0">Хорошие варианты: mainboard, main-board, main_board, материнская_плата</p>
<p class="cc m-0">Недопустимые варианты: материнская плата, Материнская_плата, main!!board, Main#board</p>
<p class="cc">Также вы можете увидеть ошибку связанную с <span class="ca">additional_id</span>. Нам было впадлу ее переименовывать, дабы сохранить затраченное время, поэтому опишим ее так. Она значит что данный подраздел уже используется. Это также сделано для исключения дублей в навигации. Единственный правильный подход, спланировать свою навигацию для удобства как вашего, так и клиента</p>
<h5>Примечание по названиям</h5>
<img src="{{ asset('img/admin/name.png') }}" alt="slug" class="col-12 sd-12 mb-em-2">
<p class="cc m-0">Если в разделе содержится всего лишь один подраздел (категория товаров), то ссылка на данную категорию в меню навигации высвечиваться не будет, а следовательно создавая раздел с одной категорией товаров, например материнские платы, название подраздела нигде не учитывается.</p>
<p class="cc m-0">Если в разделе более одного подраздела, то названия подразделов высвечивают в дроп меню при наведении курсором.</p>
</div>