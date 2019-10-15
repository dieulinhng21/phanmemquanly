@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tòa chung cư
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/flat') }}">Bảng tòa chung cư</a></li>
        <li class="active">Sửa tòa chung cư</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
    <form role="form" method="POST" action="{{ route('apartment.update', $apartment->idtoachungcu) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
        <label>Dự án</label>
        <select name="project_name">
            <option value="1">AZ Lâm Viên</option>
            <option value="2">AZ Five Stars</option>
            <option value="3">AZ SKY Tower</option>
            <option value="4">AZ Vân Canh Tower</option>
            <option value="5">AZ Starry Night</option>
        </select>
        
        <label>Tên tòa chung cư</label>
        <input name="name" type="number" value="{{$apartment->ten}}">
        
        <label for="">Tầng dân cư</label>
        <input name="people_floor" type="text" value="{{$apartment->tangthuongmai}}">

        <label for="">Tầng thương mại</label>
        <input name="trade_floor" type="text" value="{{$apartment->tangdancu}}">

        <label>Tổng số phòng</label>
        <input name="name" type="number" value="{{$apartment->tongsophong}}">
        
        <label>Tình trạng</label>
            @if($apartment->tinhtrang == 1)
            <select name="status">
                <option value="1" selected>Đã đầy</option>
                <option value="0">Còn trống</option>
            </select>
            @elseif($apartment->tinhtrang == 0)
                <select name="status">
                    <option value="1">Đã đầy</option>
                    <option value="0" selected>Còn trống</option>
                </select>
            @endif
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