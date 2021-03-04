@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $category->name }}</h1>

                <ul class="list-inline">
                    @foreach ($category->childs as $child)
                        <li class="list-inline-item"><a href="{{ $child->url() }}">{{ $child->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @include('catalog.site_list', ['site_list' => $category->sites()->paginate(10)])

@endsection
