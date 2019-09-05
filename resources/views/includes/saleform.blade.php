<h5 class="text-center">Нашли дешевле?</h5>
<form action="#" class="sd-12 col-12 pr-5 pl-5 pb-5">
    @csrf

    <div class="sd-12 col-12 flex-center-center">

        <div class="b5 bc sd-12 col-8 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="name" name="name" class="form-control" placeholder="Введите ваше Имя и Фамилию">
                <label for="name">Введите ваше Имя и Фамилию</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-8 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="email" id="email" name="email" class="form-control" placeholder="Введите ваш email">
                <label for="email">Введите ваш email</label>
            </div>
        </div>
        <div class="b5 bc sd-12 col-8 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="url" id="url" name="url" class="form-control" placeholder="Введите ссылку">
                <label for="url">Введите ссылку</label>
            </div>
        </div>
        <div class="sd-12 col-8 mt-em-1">
            <button type="submit" class="button__trigger p-5">Получить такую же цену</button>
        </div>
    </div>

    
</form>