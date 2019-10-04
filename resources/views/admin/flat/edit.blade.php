@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sửa căn hộ
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/flat') }}">Bảng căn hộ</a></li>
        <li class="active">Sửa căn hộ</li>
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
                    <form role="form" method="POST" action="{{ url('/admin/flat/update') }}">
                        {{ csrf_field() }}
                        
                        <div class="box-body">
                        <div class="form-group">
                            <label>ID tòa nhà</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="number" class="form-control" value="{{$flat->idtoanha}}">
                        </div>
                        <div class="form-group">
                            <label>ID khách hàng</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="number" class="form-control" value="{{$flat->idkhachhang}}">
                        </div>
                        <div class="form-group">
                            <label>Tầng</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="number" class="form-control" value="{{$flat->tang}}">
                        </div>
                        <div class="form-group">
                            <label>Tòa</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control" value="{{$flat->toa}}">
                        </div>
                        <div class="form-group">
                            <label>Căn</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control" value="{{$flat->can}}">
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control" value="{{$flat->loai}}">
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
                            
                            <input name="name" type="text" class="form-control" value="{{$flat->giatri}}">
                        </div>
                        <div class="form-group">
                            <label>Số phòng ngủ</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="number" class="form-control" value="{{$flat->sophongngu}}">
                        </div>
                        <div class="form-group">
                            <label>Tình trạng</label>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            
                            <input name="name" type="text" class="form-control" value="{{$flat->tinhtrang}}">
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