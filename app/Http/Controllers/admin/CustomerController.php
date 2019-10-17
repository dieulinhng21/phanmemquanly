<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Http\Requests;

use Illuminate\Http\Request;


    class CustomerController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            // $customer = Customer::paginate(2);
            // return view("admin.customer.index", array('model' => $customer));
            $customers = DB::table('khachhang')
                        ->join('canho','khachhang.idcanho','=','canho.idcanho')
                        ->select('khachhang.*','canho.tencanho','canho.idcanho')
                        ->distinct()
                        ->get();
            return view('admin.customer.index',['customer_array'=>$customers]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //chỉ lấy các căn hộ còn trống
            $flats = DB::table('canho')->where('tinhtrang','0')->get();
            return view("admin.customer.create",['flats'=>$flats]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|max:50',
                'flat' => 'required',
                'identity_card' => 'required|numeric|digits_between:9,10|unique:khachhang,chungminhthu',
                'dob' => 'required|date_format:Y-m-d',
                'email' => 'required|email|unique:khachhang,email',
                'phone_number' => 'required|numeric|digits_between:9,10|unique:khachhang,sodienthoai',
                'inhabitant_number' => 'required',
                'address' => 'required|max:50'
                //ghi chú có thể để trống 
            ],
            [
                'name.required' => 'Tên khách hàng còn trống',
                'name.max' => 'Tên khách hàng vượt quá số ký tự cho phép',
                //
                'flat.required' => 'Căn hộ còn trống',
                //
                'identity_card.required' => 'Chứng minh thư còn trống',
                'identity_card.numeric' => 'Chứng minh thư không hợp lệ',
                'identity_card.unique' => 'Số chứng minh thư đã tồn tại',
                'identity_card.digits_between' => 'Số chứng minh thư không hợp lệ',//số chứng minh thư p dài từ 9-10 ký tự
                //
                'dob.required' => 'Ngày tháng năm sinh còn trống',
                'dob.date_format' => 'Ngày tháng năm sinh không hợp lệ',
                //
                'email.required' => 'Email còn trống',
                'email.email' => 'Địa chỉ email không hợp lệ',
                'email.unique' => 'Địa chỉ email đã tồn tại',
                //
                'phone_number.required' => 'Số điện thoại còn trống',
                'phone_number.numeric' => 'Số điện thoại không hợp lệ',
                'phone_number.digits_between' => 'Số điện thoại không hợp lệ',
                //
                'inhabitant_number.required' => 'Hộ khẩu còn trống',
                //
                'address.required' => 'Địa chỉ còn trống',
                'address.max' => 'Địa chỉ không hợp lệ',
                //
                // 'after:today' => 'This date can not be made',
                // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
            ]);
                $customer = Customer::create();
                
                $customer->hoten= $request->get('name');
                $customer->idcanho= $request->get('flat');
                $customer->ngaysinh= $request->get('dob');
                $customer->chungminhthu = $request->get('identity_card');
                $customer->email = $request->get('email');
                $customer->sodienthoai = $request->get('phone_number');
                $customer->hokhau = $request->get('inhabitant_number');
                $customer->diachi = $request->get('address');
                $customer->ghichu = $request->get('note');

                $customer->save();
                
                session()->flash('create_notif','Thêm khách hàng thành công!');
                return redirect('/admin/customer');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $customer = Customer::find($id);
            return view("admin.customer.edit", compact('customer'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        // |unique:khachhang,sodienthoai
        // |unique:khachhang,chungminhthu
        // |unique:khachhang,email
        {
            $request->validate([
                'name' => 'required|max:50',
                'dob' => 'required|date_format:Y-m-d',
                'identity_card' => 'required|numeric|digits_between:9,10',
                'email' => 'required|email',
                'phone_number' => 'required|numeric|digits_between:9,10',
                'inhabitant_number' => 'required',
                'address' => 'required',
                'note' => 'required'
            ],
            [
                'name.required' => 'Tên khách hàng còn trống',
                'name.max' => 'Tên khách hàng vượt quá số ký tự cho phép',
                //
                'dob.required' => 'Năm sinh còn trống',
                'dob.date_format' => 'Ngày tháng năm sinh không hợp lệ',
                //
                'identity_card.required' => 'Số chứng minh còn trống',
                'identity_card.digits_between' => 'Độ dài số chứng minh thư không hợp lệ',// chứng minh thư p dài từ 9-10 ký tự
                // 'identity_card.unique' => 'Số chứng minh thư đã tồn tại',
                //
                'email.required' => 'Email còn trống',
                'email.email' => 'Địa chỉ email không hợp lệ',
                // 'email.unique' => 'Địa chỉ email đã tồn tại',
                //
                'phone_number.required' => 'Số điện thoại còn trống',
                'phone_number.numeric' => 'Số điện thoại không chứa ký tự là chữ cái',
                'phone_number.digits_between' => 'Số điện thoại không hợp lệ',
                // 'phone_number.unique' => 'Số điện thoại đã tồn tại',
                //
                'inhabitant_number.required' => 'Hộ khẩu không được trống',
                //
                'address.required' => 'Địa chỉ không được trống',
                //
                'note.required' => 'Ghi chú không được trống'
            ]);
                $customer = Customer::find($id);
                
                $customer->hoten= $request->get('name');
                $customer->ngaysinh= $request->get('dob');
                $customer->chungminhthu = $request->get('identity_card');
                $customer->email = $request->get('email');
                $customer->sodienthoai = $request->get('phone_number');
                $customer->hokhau = $request->get('inhabitant_number');
                $customer->diachi = $request->get('address');
                $customer->ghichu = $request->get('note');

                $customer->save();
                
                session()->flash('update_notif','Cập nhật khách hàng thành công!');
                return redirect('/admin/customer');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $customer = Customer::find($id);
            $customer->delete();

            return redirect('/admin/customer');
        }
    }