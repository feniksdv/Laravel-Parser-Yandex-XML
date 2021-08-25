@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все пользователи</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Все пользователи</li>
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
                    <h3 class="card-title">Список пользователей</h3>
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
                            <th style="width: 5%">
                                Почта
                            </th>
                            <th style="width: 5%">
                                Телефон
                            </th>
                            <th style="width: 30%">
                                Телеграм
                            </th>
                            <th style="width: 8%" class="text-center">
                                Автор
                            </th>
                            <th style="width: 5%" class="text-center">
                                Админ
                            </th>
                            <th style="width: 5%" class="text-center">
                                Тихое удаление
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($listUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> @if(!empty($user->customer[0])) {{ $user->customer[0]->tel}} @else Нет данных @endif</td>
                                <td> @if(!empty($user->customer[0])) {{ $user->customer[0]->telegram }} @else Нет данных @endif</td>
                                <td> @if(!empty($user->customer[0])) {{ $user->customer[0]->is_author }} @else Нет данных @endif</td>
                                <td> @if(!empty($user->customer[0]))
                                        @if($user->customer[0]->is_admin)
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.user.update', ['user' => $user->id]) }}">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-dark btn-sm" href="{{ route('admin.user.update', ['user' => $user->id]) }}">
                                                <i class="fas fa-toggle-off"></i>
                                            </a>
                                        @endif
                                    @endif
                                </td>
                                <td> @if(!empty($user->customer[0])) {{ $user->customer[0]->status }} @else Нет данных @endif</td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm silent-remove" type="submit" value="{{ $user->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Пользователей не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="align-self-center my-3">{{ $listUsers->links() }}</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
