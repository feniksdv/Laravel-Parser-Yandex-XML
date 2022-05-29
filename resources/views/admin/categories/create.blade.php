@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить категорию</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Добавить категорию</li>
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
                                <h3 class="card-title">Выбрать категорию</h3>
                            </div>
                            @include('layouts.message')
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="status_id" id="status_id">
                                            <option value="0" selected>Выбрать статус</option>
                                            @foreach($listStatuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                            @error('status_id')
                                                <p class="text-danger b"><strong>{{ $message }}</strong></p>
                                            @enderror
                                        </select>
                                        @error('status_id')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="title" placeholder="Заголовок" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea id="compose-textarea" class="form-control" name="content" style="height: 500px">{!! old('content') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-default btn-file">
                                            <i class="fas fa-paperclip"></i> Картинка
                                            <input type="file" name="attachment">
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title">SEO параметры</h3>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Title" name="seo_title" value="{{ old('seo_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Description" name="seo_description">{!!old('seo_description') !!}</textarea>
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
