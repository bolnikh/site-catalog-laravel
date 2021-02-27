@extends('layouts.app')


@section('content')

    <!-- Add edit form-->

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Добавить сайт</h1>

                <form>
                    <div class="form-group">
                        <label for="" >
                            Урл сайта
                        </label>
                        <input type="text" name="url" class="form-control">
                        <small class="form-text text-muted">Урл сайта</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Название
                        </label>
                        <input type="text" name="url" class="form-control">
                        <small class="form-text text-muted">Пара слов</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Описание
                        </label>
                        <textarea name="url" class="form-control"></textarea>
                        <small class="form-text text-muted">Пара предложений</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Длинное описание
                        </label>
                        <textarea name="url" class="form-control"></textarea>
                        <small class="form-text text-muted">Небольшой рассказ, только если хотите чтобы у сайта была отдельная страница</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Категория (ии)
                        </label>
                        <select class="form-control">
                            <option>категория 1</option>
                            <option>категория 2</option>
                            <option>категория 3</option>

                        </select>
                        <small class="form-text text-muted">До 3х категорий для вашего сайта</small>
                    </div>
                    <div class="form-group">
                        <label for="" >
                            Теги, ключевые слова
                        </label>
                        <input type="text" name="url" class="form-control">
                        <small class="form-text text-muted">Ключевые слова описывающие ваш сайт</small>
                    </div>

                    <button class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>



@endsection
