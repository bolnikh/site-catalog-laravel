<!-- Список сайтов , поиск-->

<div class="container">


    @foreach ($site_list as $site)
    <div class="row mb-3">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <a href="{{ $site->url }}">{{ $site->title }}</a>
                </div>
                <div class="card-body">

                    {{ $site->description }}

                    @if ($site->long_description)
                        <a href="{{ $site->url() }}" class="btn btn-outline-primary m-2">Подробнее</a>
                    @endif

                </div>

                <div class="card-footer clearfix">
                    <div class="d-inline-block float-left">
                        Подан {{ $site->created_at }}
                    </div>


                    <div class=" d-inline-block float-right">
                        <a href="{{ $site->abuse_url() }}" class="text-danger">Жалоба</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach


    @if (is_object($site_list))
        {{ $site_list->appends(Request::capture()->except('page'))->links('vendor.pagination.bootstrap-4') }}
    @endif


</div>


