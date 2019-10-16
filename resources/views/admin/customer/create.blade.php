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
                Thêm khách hàng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
                <li><a href="{{ url ('admin/customer') }}">Bảng khách hàng</a></li>
                <li class="active">Thêm khách hàng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <form method="POST" action="{{ route('customer.store') }}">
                {{ csrf_field() }}
                @if ($errors->any())
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    </div>
                @endif
                    <label>Họ tên</label>
                    <input type="text" name="name">

                    <label>Căn hộ</label>
                    <select name="flat">
                    @foreach($flats as $flat)
                        <option value="{{$flat->idcanho}}">{{$flat->tencanho}}</option>
                    @endforeach
                    </select>

                    <label>Chứng minh thư</label>
                    <input type="text" name="identity_card"><br><br>

                    <label>Ngày sinh</label>
                    <input type="text" name="dob"> (form:Năm-Tháng-Ngày)

                    <label>Email</label>
                    <input type="email" name="email">

                    <label>SĐT</label>
                    <input type="text" name="phone_number"><br><br>

                    <label>Hộ khẩu</label>
                    <input type="text" name="inhabitant_number">

                    <label>Địa chỉ</label>
                    <input type="text" name="address"><br><br>

                    <label for="note">Ghi chú :</label><br>
                    <textarea rows="4" cols="50" name="note" id="note"></textarea><br><br>

                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </section>
        <!-- /.content -->
        @endsection('content')