<div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel {{ $part->stock }}">
    <div class="np__image col-5 sd-5 flex-center-center">
        <img class="col-12 sd-12 b5" src="/img/products/{{ $part->company_id }}/{{ $part->tv_id }}/m{{ $part->part_img_name }}" alt="Запчасти для телевизоров, {{ $part->parttype_type }} {{ $part->part_model }} c телевизора {{ $part->company }} {{ $part->tv_model }}">
    </div>
    @if($adminDetect)

    <div class="edit abs shadow-xs edit-popup" data-id="{{ $part->id }}">
        <img src="{{ asset('img/icon/settings.svg') }}" alt="setting">
    </div>

    @endif
    <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
        <p class="block pr-em-2 pl-em-2">{{ $part->company }} {{ $part->tv_model }}</p>
        <a class="block hover-main pr-em-2 pl-em-2 wwbw" href="{{ route('product.show', ['slug' => $part->part_link ]) }}">{{ $part->part_model }}</a>
        <a href="{{ route('product.show', ['slug' => $part->part_link ]) }}">
            <h6 class="ct mt-em-1 mb-em-1 pr-em-2 pl-em-2">
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
    <ul class="product_marks">
        <li class="product_marks__item product_new">new</li>
        <li class="product_marks__item product_discount">-{{ $part->percent }}%</li>
    </ul>
</div>