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
                        {{ __('Восстановление пароля') }}
                    </h4>
                </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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
                                placeholder="Ваш Email"
                            />
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('Ваш Email') }}
                            </label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex-center-center">
                        <div class="col-6 sd-6">
                            <button type="submit" class="button__trigger">
                                {{ __('Отправить ссылку для сброса пароля') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>