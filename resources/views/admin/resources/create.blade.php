@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить Url</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Добавить Url</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            @include('layouts.message')
                            <form action="{{ route('admin.resources.store') }}" method="POST">
                            @csrf
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" disabled selected>Выбрать статус</option>
                                            <option value="on">Включить</option>
                                            <option value="off">Выключить</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="url" id="url" placeholder="url" name="url" value="{{ old('url') }}">
                                        @error('url')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-pencil-alt"></i>Добавить</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
