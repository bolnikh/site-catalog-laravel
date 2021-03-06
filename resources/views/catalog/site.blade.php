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

                            @foreach(array_reverse($site->category->getAllParents()) as $pcat )
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{ $pcat->url() }}">{{ $pcat->name }}</a>
                                </li>
                            @endforeach

                            <li class="breadcrumb-item " aria-current="page">
                                <a href="{{ $site->category->url() }}">{{ $site->category->name }}</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">{{ $site->title }}</li>
                        </ol>
                    </nav>
                </div>

                <h1>{{ $site->title }}</h1>

                <div>
                    {{ $site->description }}
                </div>

                <div>
                    {{ $site->long_description }}
                </div>
            </div>
        </div>
    </div>

@endsection
