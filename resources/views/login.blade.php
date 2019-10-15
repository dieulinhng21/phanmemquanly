<!DOCTYPE html>

<html>
    
    @include('partialView.head')   

  <div class="login-box-body">
  <div class="container">
  <div class="row">    
  <div class="col-sm-4"> </div>
    <div class="col-sm-4"> 
    <p class="login-box-msg" span style="font-size: 25px" >Welcome to AZ Land</p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Tên đăng nhập">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
      </div>
</div>
</div>
</div>
</div>
<div class="col-sm">
</div>
    </form>
    <footer id="footer">
      <div class="text-center padder">
        <p>
          <small> Phần mềm quản lý công ty bất động sản</small>
        </p>
      </div>
    </footer>
        <!-- jQuery 3 -->
        <script src="{{asset('layouts/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('layouts/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
    $.widget.bridge('uibutton', $.ui.button);</script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('layouts/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- Morris.js charts -->
        <script src="{{asset('layouts/bower_components/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('layouts/bower_components/morris.js/morris.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('layouts/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        <script src="{{asset('layouts/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('layouts/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('layouts/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('layouts/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('layouts/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- datepicker -->
        <script src="{{asset('layouts/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('layouts/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <!-- Slimscroll -->
        <script src="{{asset('layouts/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('layouts/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('layouts/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('layouts/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('layouts/dist/js/demo.js')}}"></script>
        
        @yield('page_script')
        
    
    </body>
