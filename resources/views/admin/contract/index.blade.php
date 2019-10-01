@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bảng hợp đồng
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Bảng hợp đồng</a></li>
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
                    <button type="button" onclick="location.href='{{ url('admin/contract/create') }}'" class="btn btn-block btn-primary">Thêm hợp đồng</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã hợp đồng</th>
                                <th>Giá trị</th>
                                <th>ID căn hộ</th>
                                <th>Ngày ký</th>
                                <th>Ghi chú</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $item )
                            <tr>
                                <td>{{$item->idhopdong}}</td>
                                <td>{{$item->mahopdong}}</td>
                                <td>{{$item->giatri}}</td>
                                <td>{{$item->idcanho}}</td>
                                <td>{{$item->ngayky}}</td>ff
                                <td>{{$item->ghichu}}</td>
                                <td>
                                <a href="contract/{{$item->idhopdong}}/edit" class="btn btn-block btn-primary">Sửa</a>
                                </td>
                                <td>
                                <form action="{{ route('contract.destroy', $item->idhopdong)}}" method="post">
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