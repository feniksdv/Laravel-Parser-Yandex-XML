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
                            <th style="width: 10%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listCategories as $category)
                            <tr>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['title'] }}</td>
                                <td>{{ $category['description'] }}</td>
                                <td>{{ now()->format('d-m-Y H:m') }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', ['category' => $category['id']]) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Смотреть
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.categories.edit', ['category' => $category['id']]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Править
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.categories.destroy', ['category' => $category['id']]) }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Удалить
                                    </a>
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
