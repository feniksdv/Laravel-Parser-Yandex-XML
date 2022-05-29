@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все Url</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все Url</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список Urls</h3>
                    @include('layouts.message')
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Url
                            </th>
                            <th style="width: 5%">
                                Статус
                            </th>
                            <th style="width: 5%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listUrls as $url)
                            <tr>
                                <td>{{ $url->id }}</td>
                                <td>{{ $url->url }}</td>
                                <td>{{ $url->status }}</td>
                                <td>@if($url->updated_at) {{ $url->updated_at }} @else {{ now() }} @endif</td>
                                <td>
                                    <form action="{{ route('admin.resources.destroy', ['resource' => $url->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-info btn-sm my-2 mx-2" href="{{ route('admin.resources.edit', ['resource' => $url->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button class="btn btn-danger btn-sm my-2 mx-2 silent-remove" type="submit" value="{{ $url->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Urls не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="align-self-center my-3">{{ $listUrls->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
{{--    <script type='text/javascript' src="{{ asset('backend/js/remove-silent.js') }}"></script>--}}
@endsection
