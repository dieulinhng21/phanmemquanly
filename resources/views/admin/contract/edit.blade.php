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
        <form role="form" method="POST" action="{{ route('contract.update', $contract->idhopdong) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                         @endforeach
                    </div>
                @endif
                    <label>Mã hợp đồng</label>
                    <input name="contract_code" type="text" value="{{$contract->mahopdong}}">
                            
                    <label>Giá trị</label>
                    <input name="contract_worth" type="text" min="0" max="2000000000" value="{{$contract->giatri}}">
                            
                    <label>Ngày ký</label>
                    <input name="contract_date" type="text" value="{{$contract->ngayky}}"><br><br>
                            
                    <label>Ghi chú</label>
                    <input name="note" type="text" value="{{$contract->ghichu}}"><br><br>

                    <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
            
</section>
<!-- /.content -->
@endsection('content')