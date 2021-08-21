@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактировать новость</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Редактировать новость</li>
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
                                <h3 class="card-title">Редактировать новость</h3>
                            </div>
                            @include('layouts.message')
                            <form action="{{ route('admin.news.update', ['news' => $listNews->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" name="status_id" id="status_id">
                                            <option value="0">Выбрать статус</option>
                                            @foreach($listStatuses as $status)
                                                @if($listNews->statuses[0]->id === $status->id)
                                                    <option value="{{ $status->id }}" selected >{{ $status->name }}</option>
                                                @else
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="0">Выбрать категорию</option>
                                            @foreach($listCategory as $category)
                                                @if($listNews->category_id === $category->id)
                                                    <option value="{{ $category->id }}" selected >{{ $category->title }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option value="0">Выбрать автора</option>
                                            @foreach($listAuthors as $authors)
                                                @if($listNews->user_id === $authors->user_id)
                                                    <option value="{{ $authors->user_id }}" selected >{{ $authors->user->name }}</option>
                                                @else
                                                    <option value="{{ $authors->user->id }}">{{ $authors->user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Заголовок" id="title" name="title" value="{{ ($errors->any()) ? old('title') : $listNews->title }}">
                                        @error('title')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea id="compose-textarea" class="form-control" name="content" style="height: 500px">{!! ($errors->any()) ? old('content') : $listNews->content !!}</textarea>
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
                                        <input class="form-control" type="text" placeholder="Title" name="seo_title" value="{{ ($errors->any()) ? old('seo_title') : $listNews->seo_title }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Description" name="seo_description">{!! ($errors->any()) ? old('seo_description') : $listNews->seo_description !!}</textarea>
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
