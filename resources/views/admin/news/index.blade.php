@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все новости</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все новости</li>
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
                    <h3 class="card-title">Список новостей</h3>
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
                                Название
                            </th>
                            <th style="width: 5%">
                                Автор
                            </th>
                            <th style="width: 5%">
                                Категория
                            </th>
                            <th style="width: 30%">
                                Текс новости
                            </th>
                            <th style="width: 8%" class="text-center">
                                Статус
                            </th>
                            <th style="width: 5%" class="text-center">
                                Дата публикации
                            </th>
                            <th style="width: 5%" class="text-center">
                                Тихое удаление
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listNews as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->title }}</td>
                                <td>@if(!is_null($news->users)) {{ $news->users->name }} @else нет данных @endif</td>
                                <td>{{ $news->category->title }}</td>
                                <td>{{ mb_substr($news->content, 0, 156).'...' }}</td>
                                <td class="project-state">
                                    @if(optional($news->statuses[0])->id === 1)
                                        <span class="badge badge-dark">{{ optional($news->statuses[0])->name }}</span>
                                    @elseif(optional($news->statuses[0])->id === 2)
                                        <span class="badge badge-warning">{{ optional($news->statuses[0])->name }}</span>
                                    @elseif(optional($news->statuses[0])->id === 3)
                                        <span class="badge badge-success">{{ optional($news->statuses[0])->name }}</span>
                                    @elseif(optional($news->statuses[0])->id === 4)
                                        <span class="badge badge-danger">{{ optional($news->statuses[0])->name }}</span>
                                    @endif
                                </td>
                                <td>@if($news->updated_at) {{ $news->updated_at }} @else {{ now() }} @endif</td>
                                <td>{{ $news->status }}</td>
                                <td>
                                    <form action="{{ route('admin.news.destroy', ['news' => $news->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.news.show', ['news' => $news->id]) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.news.edit', ['news' => $news->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button class="btn btn-danger btn-sm silent-remove" type="submit" value="{{ $news->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Новостей не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="align-self-center my-3">{{ $listNews->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
