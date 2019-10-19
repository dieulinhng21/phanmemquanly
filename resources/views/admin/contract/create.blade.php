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
input,select,textarea{
    border:none;
    border-radius:5px;
    text-align:center;
}
input.date{
    width: 60px;
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
        Thêm hợp đồng mới
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/contract') }}">Bảng hợp đồng</a></li>
        <li class="active">Thêm hợp đồng</li>
    </ol>
</section>

<!-- Main content -->
{!! Session::has('msg') ? Session::get("msg") : '' !!}
<section class="content">
    <div class="container">
        <form method="POST" action="{{ route('contract.store') }}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
            <label>Mã hợp đồng</label>
            <input type="text" name="contract_code">

            <label for="project_name">Dự án:</label>
            <select name="project_name" id="project_name">Dự án: 
                <option value="1">AZ Lâm Viên</option>
                <option value="2">AZ Five Stars</option>
                <option value="3">AZ SKY Tower</option>
            </select>

            <label>Căn hộ: </label>
            <input type="text" name="flat_name"><br><br>

            <label>Người mua: </label>
            <select name="customer">
            @foreach($contract_array as $item)
                <option value="{{$item->idkhachhang}}">{{$item->hoten}} - {{$item->chungminhthu}}</option>
            @endforeach
            </select><br><br>

            <label>Số hợp đồng</label>
            <input type="text" name="contract_number">

            <label>Giá trị</label>
            <input type="number" name="contract_worth">

            <label>Ngày ký</label>
            <input class="date" type="number" name="day" placeholder="ngày..."> /
            <input class="date" type="number" name="month" placeholder="tháng..."> /
            <input class="date" type="number" name="year" placeholder="năm..."><br><br><br>

            <label>Tiến độ hợp đồng</label>
            <select name="contract_kind">
                <option value="1">1 lần nộp</option>
                <option value="2">2 lần nộp</option>
                <option value="3">3 lần nộp</option>
                <option value="4">4 lần nộp</option>
                <option value="5">5 lần nộp</option>
                <option value="6">6 lần nộp</option>
                <option value="7">7 lần nộp</option>
                <option value="8">8 lần nộp</option>
            </select><br><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')