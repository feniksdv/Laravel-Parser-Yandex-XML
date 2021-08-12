@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все Заказы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все Заказы</li>
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
                    <h3 class="card-title">Список заказов</h3>

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
                            <th style="width: 20%">
                                Описание Задания
                            </th>
                            <th style="width: 30%">
                                Контакты
                            </th>
                            <th style="width: 10%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listOrders as $order)
                            <tr>
                                <td>{{ $order['id'] }}</td>
                                <td>{{ $order['name'] }}</td>
                                <td>{{ $order['tel']." | ".$order['email'] }}</td>
                                <td>{{ $order['content'] }}</td>
                                <td>{{ now()->format('d-m-Y') }}</td>
                                <td class="project-actions text-right">
                                    <form action="{{ route('admin.order.destroy', ['order' => $order['id']]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                            Удалить
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Заказов не найдено</td>
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
