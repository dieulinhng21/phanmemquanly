@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm vị trí
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/location') }}">Bảng vị trí</a></li>
        <li class="active">Thêm tòa chung cư</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Fill in this form</h3> -->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ url('/admin/location/store') }}">
                    {{ csrf_field() }}
                    
                    <div class="box-body">
                    <div class="form-group">
                            <label>Tên vị trí</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tổng số dự án</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="number" class="form-control">
                        </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
            
            <!-- Form Element sizes -->
            
            <!-- /.box -->
            
            
            <!-- /.box -->
            
            <!-- Input addon -->
            
            <!-- /.box -->
            
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection('content')