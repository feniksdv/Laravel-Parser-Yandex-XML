@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все сообщения</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все сообщения</li>
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
                    <h3 class="card-title">Список сообщений</h3>

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
                                Имя
                            </th>
                            <th style="width: 30%">
                                Контакты
                            </th>
                            <th style="width: 50%" class="text-center">
                                Сообщение
                            </th>
                            <th style="width: 10%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listMessages as $message)
                            <tr>
                                <td>{{ $message['id'] }}</td>
                                <td>{{ $message['name'] }}</td>
                                <td>{{ $message['email'] }}</td>
                                <td>{{ $message['sms'] }}</td>
                                <td>{{ $message['date'] }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.contact.destroy', ['contact' => $message['id']]) }}">
                                        <i class="fas fa-trash"></i>
                                        Удалить
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Сообщений не найдено</td>
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
