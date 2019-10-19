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
input.custom{
    width: 300px;
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
                <option value="1">AZ Lâm Viên</option>
                <option value="2">AZ Five Stars</option>
                <option value="3">AZ SKY Tower</option>
                <option value="4">AZ Vân Canh Tower</option>
                <option value="5">AZ Starry Night</option>
            </select><br><br>

            <label>Tên chung cư</label>
            <input class="custom" type="text" name="apartment_name"><br><br>

            <label>Tầng thương mại</label>
            Từ tầng <input class="detail" type="number" name="trade_begin"> đến <input class="detail" type="number" name="trade_end">

            <label>Tầng dân cư</label>
            Từ tầng <input class="detail" type="number" name="people_begin"> đến <input class="detail" type="number" name="people_end"><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')