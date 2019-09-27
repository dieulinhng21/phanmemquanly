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
        Thêm dự án
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/project') }}">Bảng dự án</a></li>
        <li class="active">Thêm dự án</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <form method="POST" action="{{ url('/admin/project/store') }}">
        {{ csrf_field() }}
            <label>Tên dự án </label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="project_name">

            <label>Công ty trực thuộc</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="commpany">

            <label>Trị giá</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="price"><br><br><br>

            <label>Số tòa nhà</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="number" name="apartment_number"><br><br>

            <label for="status">Tình trạng :</label><br>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <textarea  rows="4" cols="50" name="status" id="status"></textarea><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')