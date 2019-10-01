<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'admin'], function() {
Route::resource('admin/contract', 'ContractController');
Route::resource('admin/apartment','ApartmentController');
Route::resource('admin/flat','FlatController');
Route::resource('admin/location','LocationController');
Route::resource('admin/manager','ManagerController');
Route::resource('admin/marketting','MarkettingController');
Route::resource('admin/project','ProjectController');
Route::resource('admin/customer','CustomerController');
<<<<<<< HEAD

});

Route::get("login",function(){
	if(Session::has("logined"))
		return Redirect::to('edit-profile');
	//Nếu tồn tại session đăng nhập sẽ trả về edit-profile
	return View::make("login");
});
Route::post("login",function(){
	if(User::check_login(Input::get("user_input"),md5(sha1(Input::get("password")))))
	{
		//Đăng nhập thành công
		Session::put("logined","true");
		//Tạo session login
		return Redirect::to("edit-profile");
	}
	else return View::make("login")->with("error_message","Tên đăng nhập hoặc mật khẩu không đúng");
	//Thông báo lõi
});
Route::get("logout",function(){
	Session::forget("logined");
	//Xóa session đăng nhập
	return Redirect::to("login");
=======
>>>>>>> aa32dae65aad012456625b8cddb93b053df41aeb
});