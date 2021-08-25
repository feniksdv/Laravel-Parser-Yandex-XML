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
                            <th style="width: 30%">
                                Контакты
                            </th>
                            <th style="width: 30%" class="text-center">
                                Сообщение
                            </th>
                            <th style="width: 10%" class="text-center">
                                Дата добавления
                            </th>
                            <th style="width: 10%" class="text-center">
                                Telegram
                            </th>
                            <th style="width: 10%" class="text-center">
                                Тихое удаление
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listMessages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->user->name }}</td>
                                <td>
                                    @if($message->user->email) {{ $message->user->email }} @else нет данных @endif
                                    |
                                    @if(!empty($order->customers[0])) {{ $message->customers[0]->tel }} @else нет данных @endif
                                </td>
                                <td>{{ mb_substr($message->content, 0, 100).'...' }}</td>
                                <td>@if($message->updated_at) {{ $message->updated_at }} @else {{ now() }} @endif</td>
                                <td>
                                    @if(!empty($message->customers[0])) {{ $message->customers[0]->telegram }} @else нет данных @endif
                                </td>
                                <td>{{ $message->status }}</td>
                                <td>
                                    <form action="{{ route('admin.contact.destroy', ['contact' => $message->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.contact.show', ['contact' => $message->id]) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.contact.edit', ['contact' => $message->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button class="btn btn-danger btn-sm silent-remove" type="submit" value="{{ $message->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </form>
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
                <div class="align-self-center my-3">{{ $listMessages->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
