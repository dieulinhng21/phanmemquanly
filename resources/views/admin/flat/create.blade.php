<style>
form {
    border: 1px solid #3c8dbc;
    border-radius: 5px;
    padding: 30px 5%;
}
input,select,textarea{
    border:none;
    border-radius:5px;
    text-align:center;
}
label {
    margin-left: 30px;
    margin-right: 10px;
}
input.detail{
    width: 50px;
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
        Thêm căn hộ
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/flat') }}">Bảng căn hộ</a></li>
        <li class="active">Thêm căn hộ</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <form method="POST" action="{{ route('flat.store') }}">
        {{ csrf_field() }}
        
        @if ($errors->any())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            </div>
        @endif
            <label for="project">Tên dự án</label>
            <select name="project">
            @foreach($available_project_list as $project)
                    <option value="{{$project->idduan}}">{{$project->tenduan}}</option>
            @endforeach
            </select>
            
            <label for="apartment">Tòa chung cư</label>
            <!-- take array from create function in FlatController -->
            <select name="apartment">
                @foreach($available_apartment_list as $apartment)
                    <option value="{{$apartment->idtoachungcu}}">{{$apartment->tentoa}}</option>
                @endforeach
            </select>

            <label>Tên căn hộ</label>
            <input type="text" name="flat"><br><br>

            <label>Giá trị</label>
            <input type="number" name="price"><br><br>

            <label>Chi tiết: </label><br>
            <div style="text-align:left; padding-left:40px;">
                Diện tích: <input class="detail" type="number" name="square"> m vuông <br><br>
                Phòng bao gồm :
                <input class="detail" type="number" name="livingroom"> phòng khách - 
                <input class="detail" type="number" name="bedroom"> phòng ngủ - 
                <input class="detail" type="number" name="kitchen"> phòng bếp
            </div><br><br>

            <label for="status">Tình trạng:</label>
            <select name="status" id="status">
                <option value="0">Còn trống</option>
                <option value="1">Đã có người mua</option>
            </select><br><br>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="reset" class="btn btn-primary">Làm mới trang</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')