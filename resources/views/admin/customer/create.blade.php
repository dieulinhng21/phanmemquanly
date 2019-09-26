@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm khách hàng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/contract') }}">Bảng khách hàng</a></li>
        <li class="active">Thêm khách hàng</li>
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
                <form role="form" method="POST" action="{{ url('/admin/customer/store') }}">
                    {{ csrf_field() }}
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            
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
                            <label>Năm sinh</label>
                            
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
                            <label>SĐT</label>
                            
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
                            <label>Email</label>
                            
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
                            <label>Chứng minh thư</label>
                            
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
                            <label>Hộ khẩu</label>
                            
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
                            <label>Địa chỉ</label>
                            
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
                            <label>Ghi chú</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control">
                        </div>
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