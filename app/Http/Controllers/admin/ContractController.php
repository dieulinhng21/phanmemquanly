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
                        ->join('duan','hopdong.ID_duan','=','duan.idduan')
                        ->join('canho','hopdong.ID_canho','=','canho.idcanho')
                        ->join('khachhang','hopdong.ID_khachhang','=','khachhang.idkhachhang')
                        ->select('hopdong.*','duan.tenduan','canho.can','khachhang.hoten')
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
        return view("admin.contract.create");
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
            'contract_code' => 'required|unique:hopdong,mahopdong',
            'project_name' => 'required',
            'flat_name' => 'required',
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
            'exists' => 'ID khách hàng chưa tồn tại',
            'date' => 'Ngày ký sai format',
            // 'after:today' => 'This date can not be made',
            // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
            'min' => ':attribute must be bigger than 0'
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
                    $contract->ID_canho= $request->get('flat_name');
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
            'contract_code' => 'required|max:255|unique:hopdong,mahopdong'.$contract->idhopdong,
            // 'flat_id'=> 'required|numeric',
            'contract_worth' => 'required|numeric',
            'contract_date' => 'required',
            'note' => 'required|max:500'
        ],
        [
            'required' => 'The :attribute cannot be empty!',
            'unique' => ':attribute is already taken',
            'numeric' => ':attribute must be a number',
            'max:500' => ':attribute be no more than 500 characters',
            'max:255' => ':attribute be smaller than 2 billions'
        ]);
            $contract = Contract::find($id);
            
            $contract->mahopdong= $request->get('contract_code');
            // $contract->idcanho= $request->get('flat_id');
            $contract->giatri = $request->get('contract_worth');
            $contract->ngayky = $request->get('contract_date');
            $contract->ghichu = $request->get('note');

            $contract->save();
            
            return redirect('/admin/contract')->with('success!','Contract updated!');
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
