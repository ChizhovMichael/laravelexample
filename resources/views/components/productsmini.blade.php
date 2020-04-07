<div class="card__item">
    <div class="product__item rel c-p pt-em-4 flex-center-center text-center b5 {{ $part->stock }}">
        <div class="product_image flex-center-center">
            <img class="block col-12 rel b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
        </div>
        @if($adminDetect)

        <div class="edit abs shadow-xs edit-popup" data-id="{{ $part->id }}">
            <img src="{{ asset('img/icon/settings.svg') }}" alt="setting">
        </div>

        @endif
        <div class="product_content col-12">
            <div class="product_price mt-em-1">
                <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}">
                    <h6 class="ct mt-em-1 mb-em-1">
                        @if($part->price == NULL)
                        {{ $part->part_cost }}&nbsp;&#x20bd;
                        <span class="cc ml-em-1">{{ $part->price }}</span>
                        @else
                        {{ $part->price }}&nbsp;&#x20bd;
                        <span class="cc ml-em-1 line-through">{{ $part->part_cost }}&nbsp;&#x20bd;</span>
                        @endif
                    </h6>
                </a>
            </div>
            <div class="product_name">
                <p class="block pr-em-1 pl-em-1">{{ $part->company }} {{ $part->tv_model }}</p>
                <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}" class="hover-main block pr-em-1 pl-em-1 wwbw">{{ $part->part_model }}</a>
            </div>
            <div class="product_extras col-12 back-body hide">
                @if($part->part_status == 0)
                <a class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5" href="{{ route('addproduct', [ 'id' => $part->id, 'qty' => 1 ]) }}">
                    <img src="{{ asset('img/icon/shopping-bag.svg') }}" alt="Купить">
                </a>
                @else
                <span class="cart-link flex-center-center rel top-left col-12 back-main mt-em-1 bbl5 bbr5 cb">
                    Нет в наличии
                </span>
                @endif
            </div>
        </div>
        <ul class="product_marks">
            <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
            <li class="product_marks__item product_new">new</li>
        </ul>
    </div>
</div>