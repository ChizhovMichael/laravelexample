<div class="card__item__np flex-center-between mb-em-2 b8 p-em-2 back-body col-5 sd-12 rel">
    <div class="np__image col-5 sd-5 flex-center-center">
        <img class="col-12 sd-12 b5" src="/img/sets/{{ $part->set_img }}" alt="Запчасти для телевизоров, {{ $part->set_name }}">
    </div>
    <div class="np__content col-7 sd-7 pr-em-1 pl-em-1 flex-start">
        <p class="block pr-em-2 pl-em-2 cc">{{ $part->set_comment }}</p>
        <a class="block hover-main pr-em-2 pl-em-2" href="{{ route('set.show', [ 'slug' => $part->set_slug ]) }}">{{ $part->set_name }}</a>
        <h6 class="ca mt-em-1 mb-em-1 pr-em-2 pl-em-2">
            {{ $part->set_cost }}&nbsp;&#x20bd;
            <span class="cc ml-em-1 line-through">{{ $part->set_full_cost }}&nbsp;&#x20bd;</span>
        </h6>
    </div>
</div>