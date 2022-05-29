@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактировать заказ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Редактировать заказ</li>
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
                                <h3 class="card-title">Редактировать заказ</h3>
                            </div>
                            @include('layouts.message')
                            <form action="{{ route('admin.order.update', ['order' => $listOrder->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control" id="status" name="status">
                                            <option value="active" @if($listOrder->status === 'active') selected @endif>active</option>
                                            <option value="delete" @if($listOrder->status === 'delete') selected @endif>delete</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="compose-textarea" class="form-control" id="content" name="content" style="height: 500px">{!! ($errors->any()) ? old('order') : $listOrder->content !!}</textarea>
                                        @error('content')
                                            <p class="text-danger"><strong>{{ $message }}</strong></p>
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
