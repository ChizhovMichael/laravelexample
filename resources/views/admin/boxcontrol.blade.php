<div class="flex-between pb-em-5">
        <div class="col-12 sd-12">
            <h5 class="ct mt-0">Коробки</h5>
            <p class="cc col-6 sd-12">Отображение коробок ни чуть не изменилось, вы можете делать с ними все тоже самое что и в старой админ панеле</p>
            <div class="flex-between mt-em-2 bb-light pb-em-1">
                <div>
                </div>
                <div>
                    <a href="{{ route('admin.box') }}" class="rel mr-em-2 @if(Request::is('admin/box')) cm @else ct @endif hover-main line-right">Все</a>
                    <a href="{{ route('admin.box.unsort') }}" class="rel mr-em-2 @if(Request::is('admin/box/unsort')) cm @else ct @endif line-right hover-main">Неотсортированные</a>
                    <a href="{{ route('admin.box.control') }}" class="@if(Request::is('admin/box/control')) cm @else ct @endif hover-main">Управление</a>
                </div>
            </div>


            @if (Request::is('admin/box/control'))

                <h5>Создать новую коробку</h5>
                <form action="{{ route('admin.box.control.detail.create') }}" method="POST">
                    @csrf

                    <div class="col-12 flex-center-between">

                        <div class="b5 bc sd-12 col-3">
                            <div class="form-label-group sd-12">
                                <input type="text" id="boxes_number" name="boxes_number" class="form-control @error('boxes_number') is-invalid @enderror" placeholder="Введите Имя коробки" value="{{ old('boxes_number') }}" required/>
                                <label for="boxes_number">Введите Номер коробки</label>
                            </div>
                        </div>
                        <div class="b5 bc sd-12 col-4">
                            <div class="form-label-group sd-12">
                                <input type="text" id="boxes_name" name="boxes_name" class="form-control @error('boxes_name') is-invalid @enderror" placeholder="Введите Имя коробки" value="{{ old('boxes_name') }}" />
                                <label for="boxes_name">Введите Имя коробки</label>
                            </div>    
                        </div>
                        <div class="b5 bc sd-12 col-4">
                            <div class="form-label-group sd-12">
                                <input type="text" id="boxes_description" name="boxes_description" class="form-control @error('boxes_description') is-invalid @enderror" placeholder="Введите описание для коробки" value="{{ old('boxes_description') }}" />
                                <label for="boxes_description">Введите описание для коробки</label>
                            </div>
                        </div>
                        <div class="flex-center-between col-3">
                            <div class="col-12 sd-12">
                                <button type="submit" class="button__trigger" style="margin-left: 0" @if(session('success')) disabled @endif>Сохранить</button>
                            </div>
                        </div>

                    </div>

                    @error('boxes_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>Коробка уже существует</strong>
                        </span>
                    @enderror   
                </form>
                <div class="flex-start col-12 mt-2">
                    @foreach ($boxes as $box)
                        <div class="col-2 md-4 sd-2 shadow-xs b5 p-5 m-1">
                            <a href="{{ route('admin.box.control.detail', ['boxes_number' => $box->boxes_number ]) }}"><p class="ct">Box #{{ $box->boxes_number }}</p></a>
                        </div>
                    @endforeach
                </div>
            @else

                <form action="{{ route('admin.box.control.detail.save', [ 'id' => $boxDetail->id ]) }}" method="POST">
                    

                    <div class="b5 bc sd-12 col-5 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="boxes_name" name="boxes_name" class="form-control @error('boxes_name') is-invalid @enderror" placeholder="Введите Имя коробки" value="{{ $boxDetail->boxes_name  }}" />
                            <label for="boxes_name">Введите Имя коробки</label>
                
                            @if ($errors->has('boxes_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('boxes_name') }}</strong>
                            </span>
                            @endif
                        </div>   

                    </div>
                    <div class="b5 bc sd-12 col-5 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="boxes_description" name="boxes_description" class="form-control @error('boxes_description') is-invalid @enderror" placeholder="Введите описание для коробки" value="{{ $boxDetail->boxes_description  }}" />
                            <label for="boxes_description">Введите описание для коробки</label>
                
                            @if ($errors->has('boxes_description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('boxes_description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="flex-center-between mt-em-1">
                        <div class="col-3 sd-12">
                            <button type="submit" class="button__trigger" @if(session('success')) disabled @endif>Сохранить</button>
                        </div>
                    </div>


                </form>
                
            @endif

            
        </div>
</div>