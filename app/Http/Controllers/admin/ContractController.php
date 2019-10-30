<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Customer;
use App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function index()
    { 
        // $contract = Contract::paginate(2);
        // , array('model' => $contract)
        $contracts = DB::table('hopdong')
                        ->join('duan','hopdong.idduan','=','duan.idduan')
                        ->join('canho','hopdong.idcanho','=','canho.idcanho')
                        ->join('khachhang','hopdong.idkhachhang','=','khachhang.idkhachhang')
                        ->select('hopdong.*','duan.tenduan','canho.tencanho','khachhang.idkhachhang','khachhang.hoten')
                        ->get();
        return view('admin.contract.index',['contract_array'=>$contracts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('duan')->distinct()->get();
        $customers = DB::table('khachhang')->distinct()->orderByRaw('created_at DESC')->get();
        return view('admin.contract.create',compact('projects','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            //|regex:/^[a-zA-Z]+$
            'project_name' => 'required',
            'tencanho' => [
                'required',
                //tìm căn hộ trong bảng canho đồng thời validate tình trạng là còn trống hay đã đc bán
                Rule::exists('canho')->where(function ($query) {
                    $query->where('tinhtrang', 0);
                }),
            ],
            'san' => 'required',
            'contract_code' => 'required',
            'contract_worth' => 'required|numeric',
            'contract_date' => 'required',
            // 'day' => 'required|integer|min:1|max:31',
            // 'month' => 'required|integer|min:1|max:12',
            // 'year' => 'required|integer',
            //'pay_date' => 'required',
            'extra_date' => 'numeric',
            //validate customer infor before insert to db
            'name' => 'required|max:50',
            'noicap' => 'required|max:50',
            'identity_card' => 'required|numeric|digits_between:9,10|unique:khachhang,chungminhthu',
            'identity_date' => 'required',
            'phone_number' => 'required|numeric|digits_between:9,10|unique:khachhang,sodienthoai',
            'inhabitant_number' => 'required',
            'address' => 'required'
        ],
        [
            'project_name.required' => 'Tên dự án còn trống',
            //
            'tencanho.required' => 'Tên căn hộ còn trống',
            'tencanho.exists' => 'Căn hộ không có sẵn',
            // 'flat_name.unique' => 'Căn hộ đã có chủ',
            //
            'san.required' => 'Sàn giao dịch còn trống',
            //
            'contract_code.required' => 'Số hợp đồng còn trống',
            //
            'contract_worth.required' => 'Giá trị hợp đồng còn trống',
            'contract_worth.numeric' => 'Giá trị hợp đồng phải là số',
            //
            'contract_date.required' => 'Ngày tạo hợp đồng còn trống',
            // 'day.required' => 'Ngày làm hợp đồng còn trống',
            // 'day.integer' => 'Ngày làm hợp đồng không hợp lệ',
            // 'day.min' => 'Ngày làm hợp đồng không hợp lệ',
            // 'day.max' => 'Ngày làm hợp đồng không hợp lệ',

            // 'month.required' => 'Tháng làm hợp đồng còn trống',
            // 'month.integer' => 'Tháng làm hợp đồng không hợp lệ',
            // 'month.min' => 'Tháng làm hợp đồng không hợp lệ',
            // 'month.max' => 'Tháng làm hợp đồng không hợp lệ',

            // 'year.required' => 'Năm làm hợp đồng còn trống',
            // 'year.integer' => 'Năm làm hợp đồng không hợp lệ',

            'extra_date.numeric' => 'Ngày gia hạn phải là số',

            //customer information start
            'name.required' => 'Tên khách hàng còn trống',
            // 'name.regex' => 'Tên khách hàng chứa ký tự không hợp lệ',
            'name.max' => 'Tên khách hàng vượt quá số ký tự cho phép',
            //
            'noicap.required' => 'nơi cấp còn trống',
            'noicap.max' => 'nơi cấp vượt quá số ký tự cho phép',
            //
            'identity_card.required' => 'Số chứng minh còn trống',
            'identity_card.digits_between' => 'Độ dài số chứng minh thư không hợp lệ',
            'identity_card.unique' => 'Số chứng minh thư đã tồn tại',
            //
            'identity_date.required' => 'Ngày cấp chứng minh còn trống',
            //
            'phone_number.required' => 'Số điện thoại còn trống',
            'phone_number.numeric' => 'Số điện thoại không chứa ký tự là chữ cái',
            'phone_number.digits_between' => 'Độ dài số điện thoại không hợp lệ',
            'phone_number.unique' => 'Số điện thoại đã tồn tại',
            //
            'inhabitant_number.required' => 'Hộ khẩu không được trống',
            //
            'address.required' => 'Địa chỉ không được trống'
        ]); 
            //kiểm tra ngày tháng năm 
            //nếu hợp lệ thì gộp thành dạng Y-m-d và cho vào db
            // $day = $request->get('day');
            // $month = $request->get('month');
            // $year = $request->get('year');
            // $date;
            // $iden_day = $request->get('identity_day');
            // $iden_month = $request->get('identity_month');
            // $iden_year = $request->get('identity_year');
            // $iden_date;
            
            $validate_date = checkdate($month, $day, $year);
            if($validate_date){
                $date = $year . "-" . $month . "-" . $day;
            }else{
                //date sai thì in lỗi
                $error = "thời gian ký hợp đồng không hợp lệ!";
                $date = null;
                session()->flash('date_error','Ngày tháng năm tạo hợp đồng không hợp lệ');
            }
            //kiểm tra ngày tháng năm cấp chứng minh thư
            // $validate_iden_date = checkdate($iden_month, $iden_day, $iden_year);
            // if($validate_iden_date){
            //     $iden_date = $iden_year . "-" . $iden_month . "-" . $iden_day;
            // }else{
            //     $error = "thời gian cấp chứng minh thư không hợp lệ!";
            //     $iden_date = null;
            //     session()->flash('date_error','Thời gian cấp chứng minh thư không hợp lệ');
            // }
            //tạo customer trước
            $flat_name = $request->get('tencanho');
            $flat_id = DB::table('canho')->where('tencanho', $flat_name)->value('idcanho');
            $customer = Customer::create();

            $customer->idcanho = $flat_id;
            $customer->hoten = $request->get('name');
            $customer->chungminhthu = $request->get('identity_card');
            $customer->ngaycap = $request->get('identity_date');
            $customer->noicap = $request->get('noicap');
            $customer->sodienthoai = $request->get('phone_number');
            $customer->hokhau = $request->get('inhabitant_number');
            $customer->diachi = $request->get('address');
            $customer->save();

            //tìm id khách hàng theo số cmnd để lấy id
            $customer_infor = $request->get('identity_card');
            $customer_id = DB::table('khachhang')->where('chungminhthu', $customer_infor)->value('idkhachhang');
            $contract = Contract::create();

            $contract->mahopdong= $request->get('contract_code');
            $contract->idduan= $request->get('project_name');
            $contract->idcanho= $flat_id;
            $contract->idkhachhang= $customer_id;
            $contract->san= $request->get('san');
            $contract->giatri = $request->get('contract_worth');
            $contract->ngayky = $date;
            $contract->tiendo = $request->get('contract_kind');
            $contract->pay_date = $request->get('ngaythanhtoan');
            $contract->extra_date = $request->get('han');

            $contract->save();
            
            session()->flash('create_notif','Thêm hợp đồng thành công!');
            return redirect('/admin/contract');
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
        $projects = DB::table('duan')->distinct()->get();
        // $customers_list = DB::table('khachhang')->distinct()->get();

        $contract = Contract::find($id);
        //tìm khách hàng và căn hộ của hợp đồng
        $idkhachhang = $contract->idkhachhang;
        $idcanho = $contract->idcanho;
        //tìm tên khách hàng theo id trong hợp đồng
        $customer = DB::table('khachhang')->where('idkhachhang', $idkhachhang)->first();
        //tìm căn hộ theo id trong hợp đồng
        $flat = DB::table('canho')->where('idcanho',"=",$idcanho)->first();

        return view('admin.contract.edit',compact("contract","customer","flat","projects"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // |unique:hopdong,mahopdong |unique:hopdong,ten_canho |before_or_equal:date
        $request->validate([
            'contract_code' => 'required',
            'project_name' => 'required',
            'flat_name' => 'required',
            'customer_id' => 'required|exists:hopdong,ID_khachhang',
            'contract_worth' => 'required| min:0',
            'contract_date' => 'required|date'
        ],
        [
            'contract_code.required' => 'Mã hợp đồng còn trống',
            'contract_code.unique' => 'Mã hợp đồng đã tồn tại',
            //
            'project_name.required' => 'Tên dự án còn trống',
            //
            'flat_name.required' => 'Tên căn hộ còn trống',
            'flat_name.unique' => 'Căn hộ không còn trống',
            //
            'customer_id.required' => 'Khách hàng còn trống',
            //
            'contract_worth.required' => 'Giá trị hợp đồng còn trống',
            'contract_worth.min' => 'Giá trị hợp đồng còn là số âm',
            //
            'contract_date.required' => 'Ngày ký còn trống',
            'contract_date.date' => 'Ngày ký sai format',
            // 'contract_date.before_or_equal' => 'Ngày ký không vượt quá thời gian hiện tại',
            //
            'exists' => 'ID khách hàng chưa tồn tại',
            
            // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
            
        ]);
            $contract = Contract::find($id);
            
            $contract->mahopdong= $request->get('contract_code');
            // $contract->idcanho= $request->get('flat_id');
            $contract->giatri = $request->get('contract_worth');
            $contract->ngayky = $request->get('contract_date');
            $contract->ghichu = $request->get('note');

            $contract->save();
            session()->flash('update_notif','Chỉnh sửa hợp đồng thành công!');
            return redirect('/admin/contract');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();

        session()->flash('delete_notif','Xóa hợp đồng thành công!');
        return redirect('/admin/contract');
    }
}
