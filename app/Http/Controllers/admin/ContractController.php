<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Http\Requests;

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
        $contracts = DB::table('hopdong')
                        ->join('duan','hopdong.idduan','=','duan.idduan')
                        ->join('canho','hopdong.idcanho','=','canho.idcanho')
                        ->join('khachhang','hopdong.idkhachhang','=','khachhang.idkhachhang')
                        ->select('hopdong.*','duan.tenduan','canho.tencanho','khachhang.chungminhthu','khachhang.hoten')
                        ->get();
        return view('admin.contract.create',['contract_array'=>$contracts]);
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
            'project_name' => 'required',
            'flat_name' => 'required|unique:hopdong,ten_canho',
            'contract_number' => 'required|unique:hopdong,sohopdong',
            'contract_worth' => 'required|numeric',
            'day' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric',
        ],
        [
            'project_name.required' => 'Tên dự án còn trống',
            //
            'flat_name.required' => 'Tên căn hộ còn trống',
            'flat_name.unique' => 'Căn hộ đã có chủ',
            //
            'contract_number.required' => 'Số hợp đồng còn trống',
            'contract_number.unique' => 'Số hợp đồng này đã tồn tại',
            //
            'contract_worth.required' => 'Giá trị hợp đồng còn trống',
            'contract_worth.numeric' => 'Giá trị hợp đồng phải là số',
            //
            'day.required' => 'Ngày sinh còn trống',
            'day.numeric' => 'Ngày sinh phải là số',
            'day.min' => 'Ngày sinh không hợp lệ',
            'day.max' => 'Ngày sinh không hợp lệ',

            'month.required' => 'Tháng sinh còn trống',
            'month.numeric' => 'Tháng sinh phải là số',
            'month.min' => 'Tháng sinh không hợp lệ',
            'month.max' => 'Tháng sinh không hợp lệ',

            'year.required' => 'Năm sinh còn trống',
            'year.numeric' => 'Năm sinh phải là số',
        ]);
            $day = $request->get('day');
            $month = $request->get('month');
            $year = $request->get('year');
            $dob;
            //kiểm tra ngày tháng năm
            //nếu hợp lệ thì gộp thành dạng Y-m-d và cho vào db
            //else in lỗi thông báo
            $validate_date = checkdate($month, $day, $year);
            if($validate_date){
                $dob = $year . "-" . $month . "-" . $day;
            }else{
                $error = "Ngày tháng năm sinh không hợp lệ!";
                $dob = null;
                session()->flash('date_error','Ngày tháng năm sinh không hợp lệ');
            }
            //lấy tên căn hộ mà ng dùng nhập vào
            $flat_name = $request->get('flat_name');
            //tìm tên căn hộ đấy trong bảng canho
            if($root_flat_name = DB::table('canho')->where('can','=',$flat_name)->get()){
                //nếu tìm thấy và căn hộ vẫn trống(tình trạng = 0)
                if($state = DB::table('canho')->where('tinhtrang','=','1')){
                    //tạo hợp đồng,lưu vào trong db, quay trở về trang view hợp đồng + mess thông báo
                    $contract = Contract::create();
            
                    $contract->mahopdong= $request->get('contract_code');
                    $contract->ID_duan= $request->get('project_name');
                    $contract->tencanho= $request->get('flat_name');
                    $contract->ID_khachhang= $request->get('customer_id');
                    $contract->giatri = $request->get('contract_worth');
                    $contract->ngayky = $request->$dob;
                    $contract->ghichu = $request->get('note');

                    $contract->save();
                    return redirect('/admin/contract')->with('msg', 'Tạo hợp đồng thành công');
                //nếu tìm thấy căn hộ nh căn hộ đã có chủ (tình trạng = 1)
                }else{
                    //ở lại trang tạo + mess báo thất bại
                    return redirect('/admin/contract/create')->withErrors('msg', 'Căn hộ đã có chủ');
                }
            //Nếu k tìm thấy tên căn hộ trong bảng canho
            }else{
                return redirect('/admin/contract/create')->withErrors('msg', 'Căn hộ không tồn tại');
            }
            
            
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
        $contract = Contract::find($id);
        //tìm khách hàng và căn hộ của hợp đồng
        $idkhachhang = $contract->idkhachhang;
        $idcanho = $contract->idcanho;
        //tìm tên khách hàng theo id trong hợp đồng
        $customer = DB::table('khachhang')->where('idkhachhang', $idkhachhang)->first();
        //tìm căn hộ theo id trong hợp đồng
        $flat = DB::table('canho')->where('idcanho',$idcanho)->first();

        return view('admin.contract.edit',compact("contract","customer","flat"));
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
        // |unique:hopdong,mahopdong |unique:hopdong,ten_canho
        $request->validate([
            'contract_code' => 'required',
            'project_name' => 'required',
            'flat_name' => 'required',
            'customer_id' => 'required|exists:hopdong,ID_khachhang',
            'contract_worth' => 'required| min:0',
            'contract_date' => 'required|date|before_or_equal:date',
            'note' => 'required'
        ],
        [
            'contract_code.required' => 'Mã hợp đồng không được trống',
            'contract_code.unique' => 'Mã hợp đồng đã tồn tại',
            //
            'project_name.required' => 'Tên dự án không được trống',
            //
            'flat_name.required' => 'Tên căn hộ không được trống',
            'flat_name.unique' => 'Căn hộ không còn trống',
            //
            'customer_id.required' => 'ID khách hàng không được trống',
            //
            'contract_worth.required' => 'Giá trị hợp đồng không được trống',
            'contract_worth.min' => 'Giá trị hợp đồng không được là số âm',
            //
            'contract_date.required' => 'Ngày ký không được trống',
            'contract_date.date' => 'Ngày ký sai format',
            'contract_date.before_or_equal' => 'Ngày ký không vượt quá thời gian hiện tại',
            //
            'note.required' => 'Ghi chú không được trống',
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
            
            return redirect('/admin/contract')->with('success!','Cập nhật hợp đồng thành công!');
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

        return redirect('/admin/contract')->with([
            'flash_message' => 'Deleted',
            'flash_message_important' => false
        ]);
    }
}
