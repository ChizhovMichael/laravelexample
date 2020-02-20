<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Слайдер</h5>
        <p class="cc col-6 sd-12">Редактор слайдера на главной странице. Загружайте и обновляйте изображения. Слайдер располагается только на главной странице</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                
            </div>
        </div>
    </div>


    <div class="mt-em-2 sd-12">

        <div class="device-control mb-em-2 flex-between sd-12">
            <div class="sd-6">
                <a href="#" class="trigger__item button__trigger" data-device="desktop">Desktop</a>
            </div>
            <div class="sd-6">
                <a href="#" class="trigger__item button__trigger" data-device="mobile">Mobile</a>
            </div>
        </div>

        <div id="desktop" class="mb-em-2 device-control-container active">

            <h5 class="cm">Верхний</h5>
            <form action="{{ route('admin.slider.upload', [ 'type' => 'desktop', 'position' => 'header' ]) }}" method="post" enctype="multipart/form-data" class="mt-em-2 mb-em-2">
                @csrf
                <div class="flex-center-center">
                    <div class="rel upload-img sd-1 col-1">
                        <img src="{{ asset('img/icon/upload.svg') }}" alt="">
                        <input type="file" name="slide" required onchange="form.submit()" class="c-p">
                    </div>
                </div> 
            </form> 

            @foreach ($sliderimg as $slide)
                @if ($slide->type == 'desktop' && $slide->position == 'header')
                    <div class="desktop-screen b10 shadow mb-em-2 rel" style="background-image: url('/storage/slides/{{ $slide->slide }}');">
                        <a href="{{ route('admin.slider.delete', [ 'id' => $slide->id ]) }}" class="edit shadow-xs abs">
                            <img src="{{ asset('img/icon/delete.png') }}" alt="" class="col-12 sd-12">
                        </a>
                    </div>
                @endif              
            @endforeach

            <h5 class="cm mt-em-2">Нижний</h5>
            <form action="{{ route('admin.slider.upload', [ 'type' => 'desktop', 'position' => 'footer' ]) }}" method="post" enctype="multipart/form-data" class="mt-em-2 mb-em-2">
                @csrf
                <div class="flex-center-center">
                    <div class="rel upload-img sd-1 col-1">
                        <img src="{{ asset('img/icon/upload.svg') }}" alt="">
                        <input type="file" name="slide" required onchange="form.submit()" class="c-p">
                    </div>
                </div> 
            </form> 

            @foreach ($sliderimg as $slide)
                @if ($slide->type == 'desktop' && $slide->position == 'footer')
                    <div class="desktop-screen b10 shadow mb-em-2 rel" style="background-image: url('/storage/slides/{{ $slide->slide }}');">
                        <a href="{{ route('admin.slider.delete', [ 'id' => $slide->id ]) }}" class="edit shadow-xs abs">
                            <img src="{{ asset('img/icon/delete.png') }}" alt="" class="col-12 sd-12">
                        </a>
                    </div>
                @endif              
            @endforeach


        </div>

        <div id="mobile" class="flex-start mb-em-2 device-control-container sd-12">

            <h5 class="cm">Верхний</h5>
            <form action="{{ route('admin.slider.upload', [ 'type' => 'mobile', 'position' => 'header' ]) }}" method="post" enctype="multipart/form-data" class="mb-em-2">
                @csrf
                <div class="flex-center-center">
                    <div class="rel upload-img sd-1 col-1">
                        <img src="{{ asset('img/icon/upload.svg') }}" alt="">
                        <input type="file" name="slide" required onchange="form.submit()" class="c-p">
                    </div>
                </div> 
            </form>
            <div class="col-12 sd-12 flex-start">               
                @foreach ($sliderimg as $slide)
                    @if ($slide->type == 'mobile' && $slide->position == 'header')
                        <div class="mobile-screen b10 shadow mb-em-2 mr-em-1 rel" style="background-image: url('/storage/slides/{{ $slide->slide }}');">
                            <a href="{{ route('admin.slider.delete', [ 'id' => $slide->id ]) }}" class="edit shadow-xs abs">
                                <img src="{{ asset('img/icon/delete.png') }}" alt="" class="col-12 sd-12">
                            </a>
                        </div>
                    @endif              
                @endforeach
            </div>

            <h5 class="cm mt-em-3">Нижний</h5>
            <form action="{{ route('admin.slider.upload', [ 'type' => 'mobile', 'position' => 'footer' ]) }}" method="post" enctype="multipart/form-data" class="mb-em-2">
                @csrf
                <div class="flex-center-center">
                    <div class="rel upload-img sd-1 col-1">
                        <img src="{{ asset('img/icon/upload.svg') }}" alt="">
                        <input type="file" name="slide" required onchange="form.submit()" class="c-p">
                    </div>
                </div> 
            </form>
            <div class="col-12 sd-12 flex-start">               
                @foreach ($sliderimg as $slide)
                    @if ($slide->type == 'mobile' && $slide->position == 'footer')
                        <div class="mobile-screen b10 shadow mb-em-2 mr-em-1 rel" style="background-image: url('/storage/slides/{{ $slide->slide }}');">
                            <a href="{{ route('admin.slider.delete', [ 'id' => $slide->id ]) }}" class="edit shadow-xs abs">
                                <img src="{{ asset('img/icon/delete.png') }}" alt="" class="col-12 sd-12">
                            </a>
                        </div>
                    @endif              
                @endforeach
            </div>
        </div>
    

    </div>


</div>
