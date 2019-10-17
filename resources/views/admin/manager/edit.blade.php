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
        Sửa người quản lý
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/manager') }}">Bảng người quản lý</a></li>
        <li class="active">Sửa thông tin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <div class="container">
            <form role="form" method="POST" action="{{ route('manager.update', $manager->idquanly) }}">
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
                <input name="name" type="text" value="{{$manager->hoten}}">
                     
                <label>Vai trò</label>
                <select name="role" selected="{{$manager->vaitro}}">
                    <option value="editor">Editor</option>
                    <option value="manager">Manager</option>
                    <option value="contributor">Contributor</option>
                </select><br><br>

                      
                <label>SĐT</label>
                <input name="phone_number" type="text" value="{{$manager->sodienthoai}}">
                       
                <label>Email</label>
                <input name="email" type="email" value="{{$manager->email}}">
                       
                <label>Địa chỉ</label>
                <input name="address" type="text" value="{{$manager->diachi}}"><br><br>
                
                <button type="submit" class="btn btn-primary">Lưu</button>
                   
            </form>
        </div>
</section>
<!-- /.content -->
@endsection('content')