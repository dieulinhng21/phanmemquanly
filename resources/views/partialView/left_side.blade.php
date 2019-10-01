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
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{url('/admin/index')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
                    <!--<i class="fa fa-th"></i>--> 
                    <span>Quản lý chung cư</span>
                    <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">new</small>-->
                    </span>
                </a>
            </li>
             <li class="">
                <a href="{{ url('/admin/flat') }}">
                    <!--<i class="fa fa-th"></i>--> 
                    <span>Quản lý căn hộ</span>
                    <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">new</small>-->
                    </span>
                </a>
            </li>
            
             <li class="">
                <a href="{{ url('/admin/contract') }}">
                    <!--<i class="fa fa-th"></i>--> 
                    <span>Quản lý hợp đồng</span>
                    <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">new</small>-->
                    </span>
                </a>
            </li>
            
             <li class="">
                <a href="{{ url('/admin/customer') }}">
                    <!--<i class="fa fa-th"></i>--> 
                    <span>Thông tin khách hàng</span>
                    <span class="pull-right-container">
                        <!--<small class="label pull-right bg-green">new</small>-->
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/location') }}">
                    <!--<i class="fa fa-pie-chart"></i>-->
                    <span>Địa điểm</span>
                    <span class="pull-right-container">
                        <!--<i class="fa fa-angle-left pull-right"></i>-->
                    </span>
                </a>
<!--                <ul class="treeview-menu">
                    <li><a href="{{asset('layouts/pages/charts/chartjs.html')}}"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="{{asset('layouts/pages/charts/morris.html')}}"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="{{asset('layouts/pages/charts/flot.html')}}"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="{{asset('layouts/pages/charts/inline.html')}}"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>-->
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>