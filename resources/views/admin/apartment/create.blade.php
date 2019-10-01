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
</style>
@extends('partialView.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm tòa chung cư
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/apartment') }}">Bảng tòa chung cư</a></li>
        <li class="active">Thêm tòa chung cư</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <form method="POST" action="{{ route('apartment.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <label>Tên dự án</label>
            <select name="project_name">
                <!-- <option value="1">AZ Lâm Viên Complex</option>
                <option value="2">AZ SKY Tower</option>
                <option value="3">Tổ hợp BrightCity</option> -->
                <option value="4" selected>AZ Vân Canh Tower CT1</option>
                <option value="5" selected>AZ Kim Giang</option>
                <option value="6" selected>AZ Vân Canh Tower CT2</option>
            </select>

            <label>Tên chung cư</label>
            <input type="text" name="apartment_name">

            <label>Tổng số phòng</label>
            <input type="number" name="total_room"><br><br><br>

            <label for="status">Tình trạng :</label><br>
            <textarea  rows="4" cols="50" name="status" id="status"></textarea><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')