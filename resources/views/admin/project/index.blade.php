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
        Bảng dự án
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Bảng dự án</a></li>
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
                    <button type="button" onclick="location.href='{{ url('admin/project/create') }}'" class="btn btn-block btn-primary">Thêm dự án</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên dự án</th>
                                <th>Công ty trực thuộc</th>
                                <th>Vị trí</th>
                                <th>Trị giá</th>
                                <th>Số tòa nhà</th>
                                <th>Tình trạng</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($model as $item )
                            <tr>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->congtytructhuoc}}</td>
                                <td>{{$item->vitri}}</td>
                                <td>{{$item->trigia}}</td>
                                <td>{{$item->sotoanha}}</td>
                                @if($item->tinhtrang == 1)
                                    <td>Đã hoàn thành</td>
                                @elseif($item->tinhtrang == 0)
                                    <td>Chưa hoàn thành</td>
                                @endif
                                <td><a href="project/{{$item->idduan}}/edit" class="btn btn-primary">Sửa</a></td>
                                <td>
                                <form action="{{ route('project.destroy', $item->idduan)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $model->links() }}
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
@section('page_script')
<!-- DataTables -->
<script src="{{asset('layouts/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('layouts/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
    $('#example1').DataTable()
            $('#example2').DataTable({
    'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
    })
    })
</script>
@endsection('page_script')