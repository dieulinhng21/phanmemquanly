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
<section class="content">
    <div class="container">
        <form method="POST" action="{{ url('/admin/contract/store') }}">
        {{ csrf_field() }}
            <label>Mã hợp đồng</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="contract_code">

            <label>Giá trị</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="contract_worth">

            <label>Ngày ký</label>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <input type="text" name="contract_date"><br><br><br>

            <label for="note">Ghi chú :</label><br>
            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
            <textarea rows="4" cols="50" name="note" id="note"></textarea><br><br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection('content')