@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все категории</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все категории</li>
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
                    <h3 class="card-title">Список категорий</h3>
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
                            <th style="width: 30%">
                                Описание
                            </th>
                            <th style="width: 5%">
                                Статус
                            </th>
                            <th style="width: 5%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 5%" class="text-center">
                                Тихое удаление
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->content }}</td>
                                <td>{{ optional($category->statuses[0])->name }}</td>
                                <td>@if($category->updated_at) {{ $category->updated_at }} @else {{ now() }} @endif</td>
                                <td>{{ $category->status }}</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <a class="btn btn-primary btn-sm my-2 mx-2" href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        <a class="btn btn-info btn-sm my-2 mx-2" href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button class="btn btn-danger btn-sm my-2 mx-2 silent-remove" type="submit" value="{{ $category->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Категорий не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="align-self-center my-3">{{ $listCategories->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
{{--    <script type='text/javascript' src="{{ asset('backend/js/remove-silent.js') }}"></script>--}}
@endsection
