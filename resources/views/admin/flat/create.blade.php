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
        <form method="POST" action="{{ url('/admin/flat/store') }}">
        {{ csrf_field() }}
        <label for="project">Dự án</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <select name="project" id="project">
                <option value="lam_vien">AZ Lâm Viên Complex</option>
                <option value="sky_tower">AZ SKY Tower</option>
                <option value="bright_city">Tổ hợp BrightCity</option>
                <option value="van_canh">AZ Vân Canh Tower CT1</option>
                <option value="kim_giang">AZ Kim Giang</option>
                <option value="van_canh_tower">AZ Vân Canh Tower CT2</option>
            </select>
            <label>Tòa chung cư</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="apartment">

            <label>Số phòng ngủ</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="number" name="bedroom_numer"><br><br>

            <label>Tầng</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="floor">

            <label>Căn</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="room">

            <label>Loại</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="kind"><br><br>

            <label>Giá trị</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="price"><br><br>

            <label>ID khách hàng</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="customer_id"><br><br>

            <label for="status">Tình trạng :</label><br>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <textarea rows="4" cols="50" name="status" id="status"></textarea><br><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')