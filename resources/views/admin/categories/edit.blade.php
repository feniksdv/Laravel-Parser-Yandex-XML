@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактировать категорию</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Редактировать категорию</li>
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
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @include('layouts.message')
                            <form action="{{ route('admin.categories.update', ['category' => $listCategory->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="status_id">
                                            <option value="0">Выбрать статус</option>
                                            @foreach($listStatuses as $status)
                                                @if($listCategory->statuses[0]->id === $status->id)
                                                    <option value="{{ $status->id }}" selected >{{ $status->name }}</option>
                                                @else
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Заголовок" name="title" value="{{ ($errors->any()) ? old('title') : $listCategory->title }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="compose-textarea" class="form-control" name="content" style="height: 500px">{!! ($errors->any()) ? old('content') : $listCategory->content !!}</textarea>
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
                                        <input class="form-control" type="text" placeholder="Title" name="seo_title" value="{{ ($errors->any()) ? old('seo_title') : $listCategory->seo_title }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Description" name="seo_description">{!! ($errors->any()) ? old('seo_description') : $listCategory->seo_description !!}</textarea>
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
