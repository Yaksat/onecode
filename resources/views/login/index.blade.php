@extends('layouts.base')

@section('page.title', 'Страница входа')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">     <!-- здесь будет карточка бутстрапа -->
                        <div class="card-body">
                            <h4 class="m-0">
                                {{ __('Вход') }}
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="">
                                <div class="mb-3">
                                    <label class="required">{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class="required">{{ __('Пароль') }}</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" value="1" class="form-check-input" id="remember">

                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить меня') }}
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ 'Войти' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
