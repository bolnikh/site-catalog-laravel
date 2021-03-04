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

            @foreach ($categories as $cat)

                <div class="col-md">
                    <h2 class=""><a href="{{ $cat->url() }}">{{ $cat->name }}</a></h2>
                    <ul class="list-inline">
                        @foreach ($cat->getBestSubCategories() as $best_cat)
                            <li class="list-inline-item"><a href="{{ $best_cat->url() }}">{{ $best_cat->name }}</a></li>
                        @endforeach

                        <li class="list-inline-item"><a href="{{ $cat->url() }}">...</a></li>
                    </ul>
                </div>

            @endforeach

        </div>
    </div>

    <div class="mb-5"></div>

    @include('catalog.site_list', ['site_list' => \App\Models\Site::orderBy('id', 'desc')->paginate(10)])

@endsection
