<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Контакты</h5>
        <p class="cc">
            Скажем прямо. Ваши контакты - наша боль. Постоянное редактирование, добавление, удаление - ну нахуй. Давайте
            сами. Спасибо за понимание.
        </p>
        <p class="cс">Основная почта - это та почта, на которую приходят письма. Из множества основных берется самая верхняя.</p>

        <div class="mt-em-1">
            <h5 class="mt-em-2 mb-em-1">Почта</h5>

            @foreach($contact->where('name', 'email') as $item)
            <form action="{{ route('admin.contact.update', [ 'id' => $item->id, 'name' => 'email' ]) }}" method="POST" class="flex-center-between mt-em-1">
                @csrf

                <div class="form-label-group col-6 sd-12 bc b5 rel">
                    <input type="email" id="{{ $item->id }}" name="email" class="form-control" placeholder="Почта @if($item->status == 1) (основная) @endif" required value="{{ $item->value }}" />
                    <label for="{{ $item->id }}">Почта @if($item->status == 1) (основная) @endif</label>
                    <a href="{{ route('admin.contact.delete', [ 'id' => $item->id ]) }}" class="edit abs shadow">
                        <img src="{{ asset('img/icon/delete.png') }}" alt="delete" class="sd-12 col-12">
                    </a>
                </div>

                <div class="flex-between col-6 sd-12">
                    <button type="submit" class="button__trigger col-5 sd-5">Сохранить</button>
                    
                </div>
            </form>
            @endforeach

            <div class="mt-em-3 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 b-main col-6 sd-12">
                <div class="form-check">
                    <input class="form-check-input abs" type="checkbox" id="addsection" />
                    <label class="form-check-label flex-between" for="addsection">
                        <span class="ct">Добавить почту</span>
                    </label>

                    <div class="b5 sd-12 col-12 mt-em-1">
                        <form action="{{ route('admin.contact.add', [ 'name' => 'email' ]) }}" method="POST">
                            @csrf

                            <div class="form-label-group sd-12 bc b5 mt-em-1">
                                <input type="email" id="addemail" name="email" class="form-control" placeholder="Название почты" required value="{{ old('name') }}" />
                                <label for="addemail">Название почты</label>
                            </div>
                            <div class="form-check mt-em-1 mb-em-1">
                                <input class="form-check-input" data-form="brands-check" type="checkbox" name="status" id="emailstatus" />
                                <span class="form-check-span"></span>
                                <label class="form-check-label ct" for="emailstatus">
                                    Сделать основной
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








        <div class="mt-em-1">
            <h5 class="mt-em-2 mb-em-1">Адреса</h5>

            @foreach($contact->where('name', 'address') as $item)
            <form action="{{ route('admin.contact.update', [ 'id' => $item->id, 'name' => 'address' ]) }}" method="POST" class="flex-center-between mt-em-1">
                @csrf

                <div class="form-label-group col-6 sd-12 bc b5 rel">
                    <input type="text" id="{{ $item->id }}" name="address" class="form-control" placeholder="Адрес @if($item->status == 1) (основная) @endif" required value="{{ $item->value }}" />
                    <label for="{{ $item->id }}">Адрес @if($item->status == 1) (основной) @endif</label>
                    <a href="{{ route('admin.contact.delete', [ 'id' => $item->id ]) }}" class="edit abs shadow">
                        <img src="{{ asset('img/icon/delete.png') }}" alt="delete" class="sd-12 col-12">
                    </a>
                </div>

                <div class="flex-between col-6 sd-12">
                    <button type="submit" class="button__trigger col-5 sd-5">Сохранить</button>
                    
                </div>
            </form>
            @endforeach

            <div class="mt-em-3 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 b-main col-6 sd-12">
                <div class="form-check">
                    <input class="form-check-input abs" type="checkbox" id="addsectionaddress" />
                    <label class="form-check-label flex-between" for="addsectionaddress">
                        <span class="ct">Добавить адрес</span>
                    </label>

                    <div class="b5 sd-12 col-12 mt-em-1">
                        <form action="{{ route('admin.contact.add', [ 'name' => 'address' ]) }}" method="POST">
                            @csrf

                            <div class="form-label-group sd-12 bc b5 mt-em-1">
                                <input type="text" id="addaddress" name="address" class="form-control" placeholder="Введите адрес" required value="{{ old('name') }}" />
                                <label for="addaddress">Введите адрес</label>
                            </div>
                            <div class="form-check mt-em-1 mb-em-1">
                                <input class="form-check-input" data-form="brands-check" type="checkbox" name="status" id="addressstatus" />
                                <span class="form-check-span"></span>
                                <label class="form-check-label ct" for="addressstatus">
                                    Сделать основным
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


















        <div class="mt-em-1">
            <h5 class="mt-em-2 mb-em-1">Телефоны</h5>

            @foreach($contact->where('name', 'phone') as $item)
            <form action="{{ route('admin.contact.update', [ 'id' => $item->id, 'name' => 'phone' ]) }}" method="POST" class="flex-center-between mt-em-1">
                @csrf

                <div class="form-label-group col-6 sd-12 bc b5 rel">
                    <input type="text" id="{{ $item->id }}" name="phone" class="form-control" placeholder="Телефон @if($item->status == 1) (основная) @endif" required value="{{ $item->value }}" />
                    <label for="{{ $item->id }}">Телефон @if($item->status == 1) (основной) @endif</label>
                    <a href="{{ route('admin.contact.delete', [ 'id' => $item->id ]) }}" class="edit abs shadow">
                        <img src="{{ asset('img/icon/delete.png') }}" alt="delete" class="sd-12 col-12">
                    </a>
                </div>

                <div class="flex-between col-6 sd-12">
                    <button type="submit" class="button__trigger col-5 sd-5">Сохранить</button>
                    
                </div>
            </form>
            @endforeach

            <div class="mt-em-3 pr-em-2 pl-em-2 pt-em-1 pb-em-1 bc-light shadow-xs b3 b-main col-6 sd-12">
                <div class="form-check">
                    <input class="form-check-input abs" type="checkbox" id="addsectionphone" />
                    <label class="form-check-label flex-between" for="addsectionphone">
                        <span class="ct">Добавить телефон</span>
                    </label>

                    <div class="b5 sd-12 col-12 mt-em-1">
                        <form action="{{ route('admin.contact.add', [ 'name' => 'phone' ]) }}" method="POST">
                            @csrf

                            <div class="form-label-group sd-12 bc b5 mt-em-1">
                                <input type="text" id="addphone" name="phone" class="form-control" placeholder="Введите телефон" required value="{{ old('name') }}" />
                                <label for="addphone">Введите телефон</label>
                            </div>
                            <div class="form-check mt-em-1 mb-em-1">
                                <input class="form-check-input" data-form="brands-check" type="checkbox" name="status" id="phonestatus" />
                                <span class="form-check-span"></span>
                                <label class="form-check-label ct" for="phonestatus">
                                    Сделать основным
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