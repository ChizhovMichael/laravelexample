<div class="flex-between pb-em-5">
    <div class="col-12 sd-12">
        <h5 class="ct mt-0">Телевизоры</h5>
        <p class="cc col-6 sd-12">Редактор телевизоров и продукции</p>
        <div class="flex-between mt-em-2 bb-light pb-em-1">
            <div>
            </div>
            <div>
                
            </div>
        </div>

        @if (Request::route()->named('admin.company'))
            
            <div class="flex-start col-12 mt-2">
                @foreach ($companies as $company)
                    <div class="col-2 md-4 sd-2 shadow-xs b5 p-5 m-1">
                        <a href="{{ route('admin.company.tvs', [ 'id' => $company->id ]) }}" class="block hover-main"><p class="ct">{{ $company->company }}</p></a>
                    </div>
                @endforeach 
            </div>           
        @elseif(Request::route()->named('admin.company.tvs'))

            <form action="{{ route('admin.company.tvs.add', [ 'corp_id' => $companyId ]) }}" method="post">
                @csrf

                <p class="cc">Категории - ТВ</p>

                <div class="flex-start">
                    <div class="b5 bc sd-12 col-3 mr-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="tv_model" name="tv_model" class="form-control @error('tv_model') is-invalid @enderror" placeholder="Модель" value="{{ old('tv_model') }}" required/>
                            <label for="tv_model">Модель</label>
                        </div>
                    </div>
    
                    <div class="b5 bc sd-12 col-3  mr-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="matrix_model" name="matrix_model" class="form-control @error('matrix_model') is-invalid @enderror" placeholder="Матрица" value="{{ old('matrix_model') }}" required/>
                            <label for="matrix_model">Матрица</label>
                        </div>
                    </div>
    
                    <div class="b5 bc sd-12 col-3 mr-1">
                        <div class="form-label-group sd-12">
                            <input type="date" id="tv_datetime" name="tv_datetime" class="form-control @error('tv_datetime') is-invalid @enderror" value="{{ old('tv_datetime') }}" required/>
                            <label for="tv_datetime">дд.мм.гггг</label>
                        </div>
                    </div>
                </div>
                
                <div class="flex-start">
                    <select name="tv_condition" class="sd-12 col-3 cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1 mr-1" required>
                        @foreach($tv_condition as $key => $item)
                            <option value="{{ $key }}" class="cc">{{ $item }}</option>
                        @endforeach
                    </select>
    
                    <select name="group_id" class="sd-12 col-3 cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" required>
                        @for ( $i = 1; $i <= count($group_id); $i++ )
                            <option value="{{ $i }}" class="cc">Группа {{ $group_id[$i] }}</option>
                        @endfor
                    </select>
                </div>               

                <div class="col-7 sd-12 b5 bc mt-em-1">
                    <div class="form-label-group sd-12">
                        <textarea name="tv_comment" id="tv_comment" class="form-control" placeholder="Комментарий"></textarea>
                        <label for="tv_comment">Комментарий</label>
                    </div>
                </div>
                <div class="flex-center-between">
                    <div class="col-3 sd-12">
                        <button type="submit" class="button__trigger mt-em-1">Далее</button>
                    </div>
                </div>
            </form>

            <div class="flex-between b5 shadow p-2">
                <div class="col-3">
                    <p class="m-0 ct">Модель</p>
                </div>
                <div class="col-4">
                    <p class="m-0 ct">Матрица</p>
                </div>
                <div class="col-3">
                    <p class="m-0 ct">Дата разбора</p>
                </div>
                <div class="col-2">
                    <p class="m-0 ct">Группа</p>
                </div>
            </div>

            @foreach ($tvs as $tv)
                <a href="{{ route('admin.company.tvs.single', [ 'companyId' => $companyId, 'tvId' => $tv->id ]) }}" class="standart-a hover-shadow ci">
                    <div class="flex-between p-1 bb-light">
                        <div class="col-3">
                            <p class="m-0 ct pr-2">{{ $tv->tv_model }}</p>
                        </div>
                        <div class="col-4">
                            <p class="m-0 ct">{{ $tv->get_matrix->matrix_model }} {!! $tv->tv_condition > 0 ? '(<span style="color:#f00;">' . $tv_condition[$tv->tv_condition] . '</span>)' : '' !!}</p>
                        </div>
                        <div class="col-3">
                            <p class="m-0 ct">
                                {{ $tv->tv_datetime > 0 ? date('d.m.Y', $tv->tv_datetime) : '' }}
                            </p>
                        </div>
                        <div class="col-2">
                            <p class="m-0 ct">{{ $tv->group_id }}</p>
                        </div>
                    </div>
                </a> 
            @endforeach

        @elseif(Request::route()->named('admin.company.tvs.single'))


        <h5>Редактирование {{ $tv->tv_model }}</h5>

        <!-- Згрузчик изображений -->

        <div class="flex-start mb-em-2">
            <div class="mr-1">
                <form action="{{ route('admin.company.image.add', [ 'company_id' => $companyId, 'tv_id' => $tv->id ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex-start">
                        <div class="rel upload-img sd-12 col-12">
                            <img src="{{ asset('img/icon/upload.svg') }}" alt="">
                            <input type="file" name="slide" required onchange="form.submit()" class="c-p">
                        </div>
                    </div> 
                </form>
            </div>
            @foreach ($tv_images as $image)

                <div class="mr-1 b4 shadow-xs rel">
                    <img src="/img/products/{{ $companyId }}/{{ $tv->id }}/s{{ $image->tv_img_name }}" />
                    <a href="#" class="edit shadow-xs abs">
                        <img src="{{ asset('img/icon/delete.png') }}" alt="" class="col-12 sd-12">
                    </a>
                </div>
            
            @endforeach
        </div>

        

        <!-- / Згрузчик изображений -->

        <form action="{{ route('admin.company.tvs.update', [ 'tvId' => $tv->id ]) }}" method="post">
            @csrf


            <div class="flex-start">
                <div class="b5 bc sd-12 col-3 mr-1">
                    <div class="form-label-group sd-12">
                        <input type="text" id="tv_model" name="tv_model" class="form-control @error('tv_model') is-invalid @enderror" placeholder="Модель" value="{{ $tv->tv_model }}" required/>
                        <label for="tv_model">Модель</label>
                    </div>
                </div>

                <div class="b5 bc sd-12 col-3  mr-1">
                    <div class="form-label-group sd-12">
                        <input type="text" id="matrix_model" name="matrix_model" class="form-control @error('matrix_model') is-invalid @enderror" placeholder="Матрица" value="{{ $tv->get_matrix->matrix_model }}" required/>
                        <label for="matrix_model">Матрица</label>
                    </div>
                </div>
            </div>
            
            <div class="flex-start">
                <select name="tv_condition" class="sd-12 col-3 cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1 mr-1" required>
                    @foreach($tv_condition as $key => $item)
                        @if($tv->tv_condition == $key)
                            <option value="{{ $key }}" class="cc" selected>{{ $item }}</option>
                        @else
                            <option value="{{ $key }}" class="cc">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>

                <select name="group_id" class="sd-12 col-3 cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-em-1" required>
                    @for ( $i = 1; $i <= count($group_id); $i++ )
                        @if($tv->group_id == $i)
                            <option value="{{ $i }}" class="cc" selected>Группа {{ $group_id[$i] }}</option>
                        @else
                            <option value="{{ $i }}" class="cc">Группа {{ $group_id[$i] }}</option>
                        @endif
                    @endfor
                </select>
            </div>               

            <div class="col-7 sd-12 b5 bc mt-em-1">
                <div class="form-label-group sd-12">
                    <textarea name="tv_comment" id="tv_comment" class="form-control" placeholder="Комментарий">{{ $tv->tv_comment }}</textarea>
                    <label for="tv_comment">Комментарий</label>
                </div>
            </div>
            <div class="flex-center-between">
                <div class="col-3 sd-12">
                    <button type="submit" class="button__trigger mt-em-1">Сохранить</button>
                </div>
            </div>
        </form>

        <div class="flex-between">
            <div class="sd-12 col-6">
                <h5>Новый блок</h5>
                <form action="{{ route('admin.company.product.add', [ 'matrix_id' => $tv->get_matrix->id, 'tv_id' => $tv->id, 'company_id' => $companyId ]) }}" method="post">
                    @csrf

                    <select name="part_condition" class="sd-12 col-12 cc pr-em-2 pl-em-2 flex-center-center back-body b4" required>
                        @for ($i = 0; $i < count($part_condition); $i++)
                            <option value="{{ $i }}">{{ $part_condition[$i] }}</option>
                        @endfor
                    </select>
    
                    <div class="b5 bc sd-12 col-12 mt-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="part_model" name="part_model" class="form-control @error('part_model') is-invalid @enderror" placeholder="Модель" value="{{ old('part_model') }}" required/>
                            <label for="part_model">Модель</label>
                        </div>
                    </div>

                    <div class="b5 bc sd-12 col-12 mt-1">
                        <div class="form-label-group sd-12">
                            <input type="text" id="part_link" name="part_link" class="form-control @error('part_link') is-invalid @enderror" placeholder="Ссылка" value="{{ old('part_link') }}" required/>
                            <label for="part_link">Ссылка</label>
                        </div>
                    </div>

                    @if ($errors->has('part_link'))
                        <span class="invalid-feedback mt-em-1 mb-em-1 block" role="alert">
                            <strong>{{ $errors->first('part_link') }}</strong>
                        </span>
                    @endif

                    <select name="parttype_id" class="sd-12 col-12 cc pr-em-2 pl-em-2 flex-center-center back-body b4 mt-1" required>
                        @foreach ($parttype as $item)
                            <option value="{{ $item->id }}">{{ $item->parttype_type }}</option>
                        @endforeach
                    </select>

                    <div class="b5 bc sd-12 col-12 mt-1">
                        <div class="form-label-group sd-12">
                            <input type="number" id="part_cost" name="part_cost" class="form-control @error('part_cost') is-invalid @enderror" placeholder="Цена" value="{{ old('part_cost') }}" required/>
                            <label for="part_cost">Цена</label>
                        </div>
                    </div>

                    <div class="b5 bc sd-12 col-12 mt-1">
                        <div class="form-label-group sd-12">
                            <input type="number" id="part_count" name="part_count" class="form-control @error('part_count') is-invalid @enderror" placeholder="Количество" value="1" required/>
                            <label for="part_count">Количество</label>
                        </div>
                    </div>

                    <div class="col-12 sd-12 b5 bc mt-1">
                        <div class="form-label-group sd-12">
                            <textarea name="part_comment" id="part_comment" class="form-control" placeholder="Коммент">{{ old('part_comment') }}</textarea>
                            <label for="part_comment">Коммент</label>
                        </div>
                    </div>

                    <div class="col-12 sd-12 b5 bc mt-1">
                        <div class="form-label-group sd-12">
                            <textarea name="part_comment_for_client" id="part_comment_for_client" class="form-control" placeholder="Коммент для клиентов">{{ old('part_comment_for_client') }}</textarea>
                            <label for="part_comment_for_client">Коммент для клиентов</label>
                        </div>
                    </div>


                    @for ( $i = 1; $i <= count($group_id); $i++ )
                        @if($tv->group_id == $i)
                            <input type="hidden" name="group_id" value="{{ $i }}">
                        @endif
                    @endfor

                    <div class="flex-center-between">
                        <div class="col-6 sd-12">
                            <button type="submit" class="button__trigger mt-em-1">Сохранить</button>
                        </div>
                    </div>


                </form>
                <h5>Yandex Direct</h5>
                @foreach ($products as $item)
                <div class="mb-2">
                    <p class="ct m-0">Ищете исправный блок {{ $item->part_model }}?</p>
                    <p class="ct m-0">{{ $item->parttype_type }} {{ $item->part_model }} в наличии за {{ $item->part_cost }} руб. Рабочий. Доставка. Гарантия</p>
                    <p class="cc m-0">{{ route('product.show', [ 'slug' => $item->part_link ]) }}</p>
                </div>
                @endforeach
            </div>
            <div class="sd-12 col-5">
                <h5>Платы</h5>
                @foreach ($products as $item)
                    <a href="{{ route('admin.company.product', [ 'companyId' => $item->company_id, 'tvId' => $item->tv_id, 'productId' => $item->id ]) }}" class="block standart-a ct hover-main">{{ $item->part_type->parttype_type }} {{ $item->part_model }}</a>
                @endforeach
            </div>
        </div>

        @elseif(Request::route()->named('admin.company.product'))

            <p>Редактируем продукт</p>

        @endif
        
    </div>    
</div>