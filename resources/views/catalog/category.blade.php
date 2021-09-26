@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Breadcrums -->
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Начало</a></li>

                            @foreach(array_reverse($category->getAllParents()) as $pcat )
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{ $pcat->url() }}">{{ $pcat->name }}</a>
                                </li>
                            @endforeach

                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                        </ol>
                    </nav>
                </div>

                <h1>{{ $category->name }}</h1>

                <ul class="list-inline">
                    @foreach ($category->childs as $child)
                        <li class="list-inline-item"><a href="{{ $child->url() }}">{{ $child->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @include('catalog.site_list', ['site_list' => $category->sites()->orderBy('id', 'DESC')->paginate(10)])

@endsection
