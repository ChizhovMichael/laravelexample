<div class="modal__background rel top-left col-12 sd-12 hide">
    <img src="{{ asset('/img/favicon/twitter.png') }}" alt="congratulations" class="abs">
</div>
<h5 class="text-center wwbw">{{ $product->parttype_type }} {{ $product->part_model }}</h5>

<form action="{{ route('product.update') }}" class="sd-12 col-12 pr-5 pl-5 pb-5" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{ $product->id }}">

    <div class="sd-12 col-12 flex-center-center">

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="part_model" name="part_model" class="form-control" placeholder="Название запчасти" required value="{{ $product->part_model }}">
                <label for="part_model">Название запчасти</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="part_comment" name="part_comment" class="form-control" placeholder="Комментарий к продукту" value="{{ $product->part_comment }}">
                <label for="part_comment">Комментарий к продукту</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="part_comment_for_client" name="part_comment_for_client" class="form-control" placeholder="Комментарий к продукту для клиента" value="{{ $product->part_comment_for_client }}">
                <label for="part_comment_for_client">Комментарий к продукту для клиента</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="part_link" name="part_link" class="form-control" placeholder="Ссылка на продукт" required value="{{ $product->part_link }}">
                <label for="part_link">Ссылка на продукт</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="text" id="part_cost" name="part_cost" class="form-control" placeholder="Стоимость продукта" required value="{{ $product->part_cost }}">
                <label for="part_cost">Стоимость продукта</label>
            </div>
        </div>

        <div class="b5 bc sd-12 col-10 mt-em-1">
            <div class="form-label-group sd-12">
                <input type="number" id="part_count" name="part_count" class="form-control" placeholder="Количество продукта" required value="{{ $product->part_count }}">
                <label for="part_count">Количество продукта</label>
            </div>
        </div>


        <div class="pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 sd-12 col-10 mt-em-1">
            <div class="form-check">

                <input name="part_status" class="form-check-input" data-form="brands-check" type="checkbox" id="part_status" @if($product->part_status == 1) checked @endif>
                <span class="form-check-span"></span>
                <label class="form-check-label ct col-9 sd-9" for="part_status">
                    Товар продан
                </label>

            </div>
        </div>

        <div class="pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 sd-12 col-10 mt-em-1">
            <div class="form-check">

                <input name="part_return" class="form-check-input" data-form="brands-check" type="checkbox" id="part_return" @if($product->part_return == 1) checked @endif>
                <span class="form-check-span"></span>
                <label class="form-check-label ct col-9 sd-9" for="part_return">
                    Возврат
                </label>

            </div>
        </div>

        <h5>Маркировка</h5>

        <div class="sd-12 col-10 paymethod">

            <input type="hidden" name="stock" value="{{ $product->stock }}">

            <div class="mt-em-1 pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 @if($product->stock == 'new') b-main @endif">
                <div class="form-check">

                    <input class="form-check-input form-check-input-change" data-form="brands-check" type="checkbox" id="new">
                    <span class="form-check-span"></span>
                    <label class="form-check-label ct" for="new">
                        Новый товар
                    </label>

                </div>
            </div>

            <div class="mt-em-1 pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 @if($product->stock == 'discount') b-main @endif">
                <div class="form-check">

                    <input class="form-check-input form-check-input-change" data-form="brands-check" type="checkbox" id="discount">
                    <span class="form-check-span"></span>
                    <label class="form-check-label ct" for="discount">
                        Акционный товар
                    </label>

                    <div class="b5 sd-12 col-12 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="price" name="price" class="form-control" placeholder="Дисконтная цена" value="{{ $product->price }}">
                            <label for="price">Дисконтная цена</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-em-1 pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 @if($product->stock == '') b-main @endif">
                <div class="form-check">

                    <input class="form-check-input form-check-input-change" data-form="brands-check" type="checkbox" id="without">
                    <span class="form-check-span"></span>
                    <label class="form-check-label ct" for="without">
                        Без маркировки
                    </label>

                </div>
            </div>
        </div>

        <div class="sd-12 col-8 mt-em-1">
            <button type="submit" class="button__trigger p-5">Обновить товар</button>
        </div>
    </div>

    
</form>