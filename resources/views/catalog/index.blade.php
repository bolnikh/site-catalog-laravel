@extends('layouts.app')


@section('content')

    <!-- Главная страница -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Категории</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
            <div class="col-md">
                <h2>Категория 1</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Категория 2</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">Категория 3</li>
                    <li class="list-inline-item">...</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mb-5"></div>

    @include('catalog.site_list')

@endsection
