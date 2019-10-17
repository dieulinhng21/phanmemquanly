<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'username' =>'required|username',
            'password' => 'required|digits:6'
        ];
        $messages = [
            'username.required' => 'Tên đăng nhập là trường bắt buộc',
            'username.username' => 'Tên đăng nhập không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.digits' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $username = $request->input('username');
            $password = $request->input('password');
     
            if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                // Kiểm tra đúng username và mật khẩu sẽ chuyển trang
                return redirect('admin/project');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
                return redirect('login');
            }
        }
    }
} 
