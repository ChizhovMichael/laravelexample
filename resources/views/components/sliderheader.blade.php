<div class="slider-full">
    <div class="carousel" data-flickity='{ "contain": true, "prevNextButtons": false, "pageDots": false, "adaptiveHeight": true, "fade": true, "setGallerySize": false, "autoPlay": 3000 }'>
        
        @if ($agent->isDesktop())
            @foreach ($sliderimg as $item)
                @if ($item->type == 'desktop')
                    <div class="carousel-cell">
                        <div class="slide" style="background-image: url('/storage/slides/{{$item->slide }}');"></div>
                    </div>
                @endif                
            @endforeach            
        @else 
            @foreach ($sliderimg as $item)
                @if ($item->type == 'mobile')
                    <div class="carousel-cell">
                        <div class="slide" style="background-image: url('/storage/slides/{{$item->slide }}');"></div>
                    </div>
                @endif                
            @endforeach
        @endif
    </div>
</div>