@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактировать Url</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Редактировать Url</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Редактировать категорию</h3>
                            </div>
                            @include('layouts.message')
                            <form action="{{ route('admin.resources.update', ['resource' => $listUrl->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" disabled>Выбрать статус</option>
                                            @if($listUrl->status === "on")
                                                <option value="on" selected>Включить</option>
                                                <option value="off" >Выключен</option>
                                            @else
                                                <option value="on" >Включить</option>
                                                <option value="off" selected>Выключен</option>
                                            @endif
                                        </select>
                                        @error('status')
                                        <p class="text-danger b"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="url" placeholder="url" name="url" id="url" value="{{ ($errors->any()) ? old('url') : $listUrl->url }}">
                                        @error('url')
                                            <p class="text-danger b"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-pencil-alt"></i>Сохранить</button>
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
