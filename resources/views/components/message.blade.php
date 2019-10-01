<div class="modal">
    <div class="modal__wrapp col-6 sd-12 shadow-xs back-body b8 hide">
        <div class="modal__background rel top-left col-12 sd-12 hide">
            <img src="{{ asset('/img/favicon/twitter.png') }}" alt="congratulations" class="abs">
        </div>
        <h5 class="text-center">{{ $title }}</h5>
        <div class="pl-em-3 pr-em-3 pb-em-3">
            <p class="cc">{{ $slot }}</p>
            <p class="mt-em-3 cc"><i>С уважением, Telezapchasti</i></p>
            <div class="close c-p">
                <img width="30" height="30" src="/img/icon/cancel.svg">
            </div>
        </div>
    </div>
</div>