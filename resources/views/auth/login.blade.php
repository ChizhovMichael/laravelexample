<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Телезапчасти</title>
        <meta name="description" content="Телезапчасти" />
        <meta name="keywords" content="Телезапчасти" />

        <!-- Headbase -->

        @include('includes.head')
    </head>

    <body>
        <div class="full-height sd-12 col-12 pr-10 pl-10 flex-center-center">
            <div class="col-6 sd-12">
                <div>
                    <a class="logo flex-center-center sd-12" href="{{ route('main') }}">
                        <img class="sd-2" src="{{ asset('img/icon/logo.svg') }}" alt="Телезапчасти" />
                        <h3>
                            <span>tele</span>
                            Zapchasti
                        </h3>
                    </a>
                </div>
                <div>
                    <h4 class="text-center">
                        {{ __('Добро пожаловать') }}
                    </h4>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="b5 bc sd-12 col-12 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="Email"
                            />
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('Email') }}
                            </label>

                            
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="b5 bc sd-12 col-12 mt-em-1">
                        <div class="form-label-group sd-12">
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Пароль"
                            />
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                {{ __('Пароль') }}
                            </label>

                            
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    


                    <div class="pr-em-2 pl-em-2 pt-em-2 pb-em-2 bc-light shadow-xs b3 mt-em-1">
                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <span class="form-check-span"></span>
                            <label class="form-check-label ct col-9 sd-9" for="remember">
                                {{ __('Запомнить меня') }}
                            </label>

                        </div>
                    </div>

                    <div class="flex-center-center">
                        <div class="col-6 sd-6">
                            <button type="submit" class="button__trigger">
                                {{ __('Войти') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="hover-main text-center mt-em-3 block" href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>