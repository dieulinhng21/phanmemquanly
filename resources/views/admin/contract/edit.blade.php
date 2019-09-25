@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sửa hợp đồng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Bảng hợp đồng</a></li>
        <li class="active">Sửa hợp đồng</li>
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
                    <form role="form" method="POST" action="{{ url('/admin/contract/update') }}">
                        {{ csrf_field() }}
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label>Mã hợp đồng</label>
                                
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                                @endif
                                
                                <input name="name" type="text" class="form-control" value="{{$contract->mahodong}}">
                            </div>
                            <div class="form-group">
                                <label>Giá trị</label>
                                
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                                @endif
                                
                                <input name="name" type="text" class="form-control" value="{{$contract->giatri}}">
                            </div>
                            <div class="form-group">
                                <label>Ngày ký</label>
                                
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                                @endif
                                
                                <input name="name" type="text" class="form-control" value="{{$contract->ngayky}}">
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
                                
                                <input name="name" type="text" class="form-control" value="{{$contract->ghichu}}">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
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