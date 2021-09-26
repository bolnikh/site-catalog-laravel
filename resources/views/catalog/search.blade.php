@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Поиск</h1>
                <div>Ищем: {{$query}}</div>
                <div>Всего найдено: {{$total}}</div>

                @include('catalog.site_list', ['site_list' => $site_list])
            </div>
        </div>
    </div>
@endsection
