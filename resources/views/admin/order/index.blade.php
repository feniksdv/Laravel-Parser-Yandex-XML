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
                            <th style="width: 10%" class="text-center">
                                Статус
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->users[0]->name }}</td>
                                <td>{{ $order->users[0]->email ." | ". $order->customers[0]->tel}}</td>
                                <td>{{ mb_substr($order->content, 0, 100).'...' }}</td>
                                <td>@if($order->updated_at) {{ $order->updated_at }} @else {{ now() }} @endif</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <form action="{{ route('admin.order.destroy', ['order' => $order->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-primary btn-sm my-2 mx-2" href="{{ route('admin.order.show', ['order' => $order->id]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Смотреть
                                        </a>
                                        <a class="btn btn-info btn-sm my-2 mx-2" href="{{ route('admin.order.edit', ['order' => $order->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Править
                                        </a>
                                        <button class="btn btn-danger btn-sm my-2 mx-2 silent-remove" type="submit" value="{{ $order->id }}">
                                            <i class="fas fa-trash">
                                            </i>
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
                <div class="align-self-center my-3">{{ $listOrders->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
