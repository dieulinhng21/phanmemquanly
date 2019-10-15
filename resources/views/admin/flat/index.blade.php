<style>
    div.notification{
        color:#006622;
        font-style: oblique;
        border:1px solid #006622;
        background-color:#99ffbb;
        padding:15px 15px;
        margin-bottom:20px;
        border-radius:5px;
        width:50%
    }
    div.delete_notification{
        color:#cc0000;
        font-style: oblique;
        border:1px solid #cc0000;
        background-color:#ff6666;
        padding:15px 15px;
        margin-bottom:20px;
        border-radius:5px;
        width:50%
    }
</style>
@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bảng căn hộ
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Bảng căn hộ</a></li>
        <!-- <li class="active">Bảng hợp đồng</li> -->
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div>
    <!-- Alerts -->
    @if(session()->has('create_notif'))
        <div class="notification">{{ session()->get('create_notif') }}</div>
    @elseif(session()->has('update_notif'))
        <div class="notification">{{ session()->get('update_notif') }}</div>
    @elseif(session()->has('delete_notif'))
    <div class="delete_notification">{{ session()->get('delete_notif') }}</div>
    @endif
    <!-- End alerts -->
</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Contract Table</h3> -->
                </div>
                <div class="btn">
                    <button type="button" onclick="location.href='{{ url('admin/flat/create') }}'" class="btn btn-block btn-primary">Thêm căn hộ</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên căn</th>
                                <th>Tên dự án</th>
                                <th>Tên chung cư</th>
                                <!-- <th>Số phòng ngủ</th> -->
                                <th>Giá trị</th>
                                <th>Chi tiết</th>
                                <th>Tình trạng</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flat_array as $item )
                            <tr>
                                <td>{{$item->tencanho}}</td>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->tentoa}}</td>
                                <!-- <td>{{$item->sophongngu}}</td> -->
                                <td>{{$item->giatri}}</td>
                                <td>
                                Diện tích: {{$item->dientich}} -
                                Số phòng khách: {{$item->sophongkhach}} -
                                Số phòng ngủ: {{$item->sophongngu}} -
                                Số phòng bếp: {{$item->sophongbep}}
                                </td>
                                @if($item->tinhtrang == 1)
                                    <td>Đã có người mua</td>
                                @elseif($item->tinhtrang == 0)
                                    <td>Còn trống</td>
                                @endif
                                <td><a href="flat/{{$item->idcanho}}/edit" class="btn btn-primary">Sửa</a></td>
                                <td>
                                <form action="{{ route('flat.destroy', $item->idcanho)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- link paginate -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection('content')

