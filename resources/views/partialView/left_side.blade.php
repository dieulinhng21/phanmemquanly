<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('layouts/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="">
                <a href="{{url('/admin/index')}}">
                    </i> <span>Trang chủ </span>
                    <span class="pull-right-container">
                        <!--<i class="fa fa-angle-left pull-right"></i>-->
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/project') }}">
<!--                    <i class="fa fa-files-o"></i>-->
                    <span>Quản lý dự án</span>
                    <span class="pull-right-container">
                        <!--<span class="label label-primary pull-right">4</span>-->
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/apartment') }}">
                    <span>Quản lý chung cư</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
             <li class="">
                <a href="{{ url('/admin/flat') }}">
                    <span>Quản lý căn hộ</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            
             <li class="">
                <a href="{{ url('/admin/contract') }}">
                    <span>Quản lý hợp đồng</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            
             <li class="">
                <a href="{{ url('/admin/customer') }}">
                    <span>Quản lý khách hàng</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ url('/admin/manager') }}">
                    <!--<i class="fa fa-th"></i>--> 
                    <span>Quản lý người quản lý</span>
                    <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">new</small>-->
                    </span>
                </a>
            </li>

            <!-- <li class="">
                <a href="{{ url('/admin/maketing') }}">
                    <span>Marketing</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li> -->

            <!-- <li class="">
                <a href="{{ url('/admin/location') }}">
                    <span>Địa điểm</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>