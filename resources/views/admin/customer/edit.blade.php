<style>
label {
    margin-left: 30px;
    margin-right: 10px;
}
form {
    border: 1px solid #3c8dbc;
    border-radius: 5px;
    padding: 30px 5%;
}
button {
    margin-left: 50%;
}
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sửa hợp đồng
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/contract') }}">Bảng hợp đồng</a></li>
        <li class="active">Sửa hợp đồng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <div class="container">
                    <form role="form" method="POST" action="{{ route('customer.update', $customer->idkhachhang) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <label>Họ và tên</label>
                            <input name="name" type="text" class="form-control" value="{{$customer->hoten}}">
                       
                            <label>Năm sinh</label>
                            <input name="dob" type="text" class="form-control" value="{{$customer->namsinh}}">
                        
                            <label>Chứng minh thư</label>
                            <input name="identity_card" type="text" class="form-control" value="{{$customer->chungminhthu}}">
                        
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" value="{{$customer->email}}">
                     
                            <label>SĐT</label>
                            <input name="phone_number" type="text" class="form-control" value="{{$customer->sodienthoai}}">
                        
                            <label>Hộ khẩu</label>
                            <input name="inhabitant_number" type="text" class="form-control" value="{{$customer->hokhau}}">
                        
                            <label>Địa chỉ</label>
                            <input name="address" type="text" class="form-control" value="{{$customer->diachi}}">
                        
                            <label>Ghi chú</label>
                            <input name="note" type="text" class="form-control" value="{{$customer->ghichu}}">
                       
                            <button type="submit" class="btn btn-primary">Lưu</button>
                       
                    </form>
                </div>
</section>
<!-- /.content -->
@endsection('content')