@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Личный кабинет</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Аккаунт</a></li>
                            <li class="breadcrumb-item active">Личный кабинет</li>
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
                    <h3 class="card-title">Настройки</h3>
                    @include('layouts.message')
                </div>
                <div class="row mx-3 my-3">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Профиль</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('account.save.form.profile', ['profile' => Auth::user()->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Изменить Имя</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Изменить почту</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Изменить телефон</label>
                                        <input type="tel" id="tel" name="tel" class="form-control" value="{{ Auth::user()->customer[0]->tel }}">
                                        @error('tel')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="telegram">Изменить телеграм</label>
                                        <input type="text" id="telegram" name="telegram" class="form-control" value="{{ Auth::user()->customer[0]->telegram  }}">
                                        @error('telegram')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Сохранить" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Изменить пароль</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('account.save.form.password', ['password' => Auth::user()->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Старый пароль</label>
                                        <input type="password" id="inputEstimatedBudget" name="password-old" class="form-control">
                                        @error('password-old')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Новый пароль</label>
                                        <input type="password" id="inputSpentBudget" name="password" class="form-control">
                                        @error('password')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Подтвердите пароль</label>
                                        <input type="password" id="inputEstimatedDuration" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Сохранить" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
