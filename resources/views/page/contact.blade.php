@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Контакт</h1>

                <p>
                    Пишите нам.
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post">
                    @csrf

                    <div class="form-group">
                        <label for="" >
                            Ваше имя *
                        </label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                               value="{{ old('contact') }}"
                        >
                        <small class="form-text text-muted">Как к Вам обращаться</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            E-mail *
                        </label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                        >
                        <small class="form-text text-muted">Мы никому не скажем Ваш е-мейл</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Текст сообщения *
                        </label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        <small class="form-text text-muted">Все что вы хотите сказать</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Послать сообщение</button>
                </form>

            </div>
        </div>
    </div>

@endsection
