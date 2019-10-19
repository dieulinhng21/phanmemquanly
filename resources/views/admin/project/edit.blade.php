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
        Sửa dự án
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AdminAZ</a></li>
        <li><a href="{{ url ('admin/project') }}">Bảng dự án</a></li>
        <li class="active">Sửa dự án</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <form role="form" method="POST" action="{{ route('project.update', $project->idduan) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
                <label>Tên dự án</label>
                <!-- <input name="project_name" value="{{$project->tenduan}}"> -->
                <select name="project_name">
                    <option value="AZ Lâm Viên">AZ Lâm Viên</option>
                    <option value="AZ Five Stars">AZ Five Stars</option>
                    <option value="AZ SKY Tower">AZ SKY Tower</option>
                    <option value="AZ Vân Canh Tower">AZ Vân Canh Tower</option>
                    <option value="AZ Starry Night">AZ Starry Night</option>
                </select>
            
                <label>Công ty trực thuộc</label>
                <input name="company" type="text" value="{{$project->congtytructhuoc}}">
            
                <label>Vị trí</label>
                <input name="location" type="text" value="{{$project->vitri}}"><br><br>
        
                <label>Số tòa nhà</label>
                <input name="apartment_number" type="number" value="{{$project->sotoanha}}">
            
                <label>Trị giá</label>
                <input name="project_worth" type="number" value="{{$project->trigia}}">
            
                <label>Tình trạng</label>
                @if($project->tinhtrang == 1)
                    <select name="status">
                        <option value="1" selected>Đã hoàn thành</option>
                        <option value="0">Chưa hoàn thành</option>
                    </select><br><br>
                
                @elseif($project->tinhtrang == 0)
                    <select name="status">
                        <option value="1">Đã hoàn thành</option>
                        <option value="0" selected>Chưa hoàn thành</option>
                    </select><br><br>
                
                @endif
                <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</section>
@endsection('content')