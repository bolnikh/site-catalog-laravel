<!-- Список сайтов , поиск-->

<div class="container">


    @foreach ($site_list as $site)
    <div class="row mb-3">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    {{ $site->title }}
                </div>
                <div class="card-body">

                    {{ $site->description }}

                    <a href="{{ $site->url() }}" class="btn btn-outline-primary m-2">Подробнее</a>

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
        {{ $site_list->links('vendor.pagination.bootstrap-4') }}
    @endif


</div>


