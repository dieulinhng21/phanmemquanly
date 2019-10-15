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
            'contract_number' => 'required|exists:hopdong,sohopdong',
            'contract_worth' => 'required|numeric',
            'contract_date' => 'required|date',
        ],
        [
            'project_name.required' => 'Tên dự án không được trống',
            'flat_name.required' => 'Tên căn hộ không được trống',
            'flat_name.unique' => 'Căn hộ đã có chủ',
            'contract_number.unique' => 'Số hợp đồng này đã tồn tại',
            'contract_number.required' => 'Số hợp đồng không được trống',
            'contract_worth.required' => 'Giá trị hợp đồng không được trống',
            'contract_worth.numeric' => 'Giá trị hợp đồng phải là số',
            'contract_date.required' => 'Ngày ký không được trống',
            'exists' => 'ID khách hàng chưa tồn tại',
            'date' => 'Ngày ký sai format'
        ]);
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
                    $contract->ten_canho= $request->get('flat_name');
                    $contract->ID_khachhang= $request->get('customer_id');
                    $contract->giatri = $request->get('contract_worth');
                    $contract->ngayky = $request->get('contract_date');
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
        $contract = Contract::find($id);
        return view('admin.contract.show')->with('contract',$contract);
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
        return view('admin.contract.edit',compact('contract'));
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
        $request->validate([
            'contract_code' => 'required|unique:hopdong,mahopdong',
            'project_name' => 'required',
            'flat_name' => 'required|unique:hopdong,ten_canho',
            'customer_id' => 'required|exists:hopdong,ID_khachhang',
            'contract_worth' => 'required| min:0',
            'contract_date' => 'required|date',
            'note' => 'required'
        ],
        [
            'contract_code.required' => 'Mã hợp đồng không được trống',
            'project_name.required' => 'Tên dự án không được trống',
            'flat_name.required' => 'Tên căn hộ không được trống',
            'customer_id.required' => 'ID khách hàng không được trống',
            'contract_worth.required' => 'Giá trị hợp đồng không được trống',
            'contract_date.required' => 'Ngày ký không được trống',
            'note.required' => 'Ghi chú không được trống',
            'contract_code.unique' => 'Mã hợp đồng đã tồn tại',
            'flat_name.unique' => 'Căn hộ không còn trống',
            'exists' => 'ID khách hàng chưa tồn tại',
            'date' => 'Ngày ký sai format',
            // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
            'min' => ':attribute must be bigger than 0'
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
