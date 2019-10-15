@extends('partialView.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bảng khách hàng
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="#">Bảng khách hàng</a></li>
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
                    <button type="button" onclick="location.href='{{ url('admin/customer/create') }}'" class="btn btn-block btn-primary">Thêm khách hàng</button>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>căn hộ</th>
                                <th>CMND</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Hộ khẩu</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th colspan="2">Hành động</th> <!-- Default pagination disappear after adding colspan = 2-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer_array as $item )
                            <tr>
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->tencanho}}</td>
                                <td>{{$item->chungminhthu}}</td>
                                <td>{{$item->ngaysinh}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->sodienthoai}}</td>
                                <td>{{$item->hokhau}}</td>
                                <td>{{$item->diachi}}</td>
                                <td>{{$item->ghichu}}</td>
                                <td><a href="customer/{{$item->idkhachhang}}/edit" class="btn btn-primary">Sửa</a></td>
                                <td>
                                <form action="{{ route('customer.destroy', $item->idkhachhang)}}" method="post">
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