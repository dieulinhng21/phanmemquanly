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
                <option value="4">AZ Lâm Viên Complex</option>
                <option value="5">AZ SKY Tower</option>
                <option value="7">AZ Vân Canh Tower CT2</option>
            </select>

            <label>Căn</label>
            <input type="text" name="flat_name"><br><br>

            <label>ID khách hàng</label>
            <input type="text" name="customer_id"><br><br>

            <label>Giá trị</label>
            <input type="text" name="contract_worth">

            <label>Ngày ký</label>
            <input type="text" name="contract_date"><br><br><br>

            <label for="note">Ghi chú :</label><br>
            <textarea rows="4" cols="50" name="note" id="note"></textarea><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')