<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\apartment;
use App\Http\Requests;

use Illuminate\Http\Request;
//BaseController
class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apartment = apartment::paginate(2);
        // return view("admin.apartment.index", array('model' => $apartment));
        $apartments = DB::table('toachungcu')
                        ->join('duan','toachungcu.idduan','=','duan.idduan')
                        ->select('toachungcu.*','duan.idduan','duan.tenduan')
                        ->get();
        return view('admin.apartment.index',['apartment_array'=>$apartments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('duan')->distinct()->get();
        return view("admin.apartment.create",['projects'=>$projects]);
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
            'apartment_name' => 'required|max:255',
            'trade_begin' => 'required|integer|min:1',
            'trade_end' => 'required|integer|min:0',
            'people_begin' => 'required|integer|min:0',
            'people_end' => 'required|integer|min:0',
        ],
        [
            'project_name' => 'Tên dự án còn trống',
            //
            'apartment_name.required' => 'Tên tòa chung cư còn trống',
            'apartment_name.max' => 'Tên  vượt quá số ký tự cho phép',
            //
            'trade_begin.required' => 'Tầng bắt đầu thương mại còn trống',
            'trade_begin.integer' => 'Tầng bắt đầu thương mại phải là số nguyên',
            'trade_begin.min'=> 'Tầng bắt đầu thương mại phải bắt đầu từ 1',
            'trade_end.required' => 'Tầng kết thúc thương mại còn trống',
            'trade_end.integer' => 'Tầng kết thúc thương mại phải là số nguyên',
            'trade_end.min' => 'Tầng kết thúc thương mại phải là số dương',
            //
            'people_begin.required' => 'Tầng bắt đầu dân cư còn trống',
            'people_begin.integer' => 'Tầng bắt đầu dân cư phải là số nguyên',
            'people_begin.min' => 'Tầng bắt đầu dân cư phải là số dương',
            'people_end.required' => 'Tầng kết thúc dân cư còn trống',
            'people_end.integer' => 'Tầng kết thúc dân cư phải là số nguyên',
            'people_end.min' => 'Tầng kết thúc dân cư phải là số dương'
        ]);
            $apartment = Apartment::create();
            $trade = $request->get('trade_begin')." - ".$request->get('trade_end');
            $people = $request->get('people_begin')." - ".$request->get('people_end');
            $apartment->idduan = $request->get('project_name');
            $apartment->tentoa = $request->get('apartment_name');
            $apartment->tangthuongmai = $trade;
            $apartment->tangdancu = $people;

            $apartment->save();
            session()->flash('create_notif','Tạo tòa chung cư thành công!');
            return redirect('/admin/apartment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        return view("admin.apartment.show", compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $projects =DB::table('duan')->get();
        return view("admin.apartment.edit", compact('apartment','projects'));
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
            'apartment_name' => 'required|max:255',
            'people_floor' => 'required',
            'trade_floor' => 'required',
            'status' => 'required'
        ],
        [
            'apartment_name.required' => 'Tên tòa chung cư còn trống',
            'apartment_name.max' => 'Tên tòa chung cư vượt quá số ký tự chp phép',
            'trade_floor.required' => 'Tầng thương mại còn trống',
            'people_floor.required' => 'Tầng chung cư còn trống'
        ]);
            $apartment = Apartment::find($id);
            
            $apartment->idduan= $request->get('project_name');
            $apartment->tentoa= $request->get('apartment_name');
            $apartment->tangthuongmai= $request->get('trade_floor');
            $apartment->tangdancu= $request->get('people_floor');
            $apartment->tinhtrang = $request->get('status');       

            $apartment->save();
            session()->flash('update_notif','Cập nhật tòa chung cư thành công!');
            return redirect('/admin/apartment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        session()->flash('delete_notif','Đã xóa tòa chung cư!');

        return redirect('/admin/apartment');
        // ->with([
        //     'flash_message' => 'Deleted',
        //     'flash_message_important' => false
        // ]);
    }
}
