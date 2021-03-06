@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">

            <!-- Breadcrums -->
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Начало</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Добавить сайт</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Добавить сайт</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="/add">
                    @csrf

                    <div class="form-group">
                        <label for="" >
                            Категория  <span>*</span>
                        </label>
                        <select class="form-control @error('category_id') is-invalid @enderror"
                                name="category_id"
                        >
                            @foreach ($cat_arr as $id => $name)
                                <option value="{{ $id }}"
                                @if (old('category_id') ==$id)
                                    selected
                                @endif
                                >{{ $name }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="" >
                            Урл сайта <span>*</span>
                        </label>
                        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                               value="{{ old('url') }}"
                        >
                        <small class="form-text text-muted">Урл сайта</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Название <span>*</span>
                        </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}"
                        >
                        <small class="form-text text-muted">Пара слов</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Описание <span>*</span>
                        </label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        <small class="form-text text-muted">Пара предложений</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Длинное описание
                        </label>
                        <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror">{{ old('long_description') }}</textarea>
                        <small class="form-text text-muted">Небольшой рассказ, только если хотите чтобы у сайта была отдельная страница</small>
                    </div>



                    <button class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>


@endsection
