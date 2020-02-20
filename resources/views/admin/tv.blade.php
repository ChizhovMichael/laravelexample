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

            <form action="{{ route('admin.company.tvs.add', [ 'corp_id' => $id ]) }}" method="post">
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
                <a href="#" class="standart-a hover-shadow ci">
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


        @endif
        
    </div>    
</div>