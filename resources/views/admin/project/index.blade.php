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
                                <th>ID dự án</th>
                                <th> ID Vị trí</th>
                                <th>Tên dự án</th>
                                <th>Trị giá</th>
                                <th>Số tòa nhà</th>
                                <th>Công ty trực thuộc</th>
                                <th>Tình trạng</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($model as $item )
                            <tr>
                                <td>{{$item->idduan}}</td>
                                <td>{{$item->idvitri}}</td>
                                <td>{{$item->tenduan}}</td>
                                <td>{{$item->trigia}}</td>
                                <td>{{$item->sotoanha}}</td>
                                <td>{{$item->congtytructhuoc}}</td>
                                <td>{{$item->tinhtrang}}</td>
                                <td><a href="{{ url('/admin/project/edit'. $item->id) }}" class="btn btn-primary">Sửa</a></td>
                                <td><a href="{{ url('/admin/project/destroy'. $item->id) }}" class="btn btn-primary">Xóa</a></td>
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