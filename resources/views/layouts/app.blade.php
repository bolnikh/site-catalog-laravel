<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <meta name="description" content="Простой каталог сайтов на ларавель"/>

    <meta name="keywords" content="каталог сайтов" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="/js/main.js"></script>
</head>
<body>
    <div id="app">

        <!-- Nav top for all pages -->

        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Начало <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-danger" href="/add">Добавить сайт</a>
                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="post" action="/search">
                        @csrf
                        <input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Поиск" aria-label="Search" name="query">
                        <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Поиск</button>
                    </form>
                </div>
            </nav>
        </div>


        @if(Session::has('message'))
            <div class="container mt-3">
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif


        <main class="py-4">
            @yield('content')
        </main>


        <!-- Nav bottom for all pages -->
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="navbar-text d-inline-block" href="#">Копирайт {{ date('Y')}}</div>


                <ul class="navbar-nav mx-auto">
                    <li class="nav-item
                        @if (Request::is('about')) active @endif
                    ">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item
                        @if (Request::is('contact')) active @endif
                        ">
                        <a class="nav-link" href="/contact">Контакт</a>
                    </li>
                    <li class="nav-item
                        @if (Request::is('rules')) active @endif
                    ">
                        <a class="nav-link" href="/rules">Правила</a>
                    </li>
                    <li class="nav-item
                        @if (Request::is('search')) active @endif
                    ">
                        <a class="nav-link" href="/search">Поиск</a>
                    </li>
                </ul>

            </nav>
        </div>

    </div>
</body>
</html>
