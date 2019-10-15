<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Http\Requests;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = project::paginate(5);
        return view("admin.project.index", array('model' => $project));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.project.create");
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
            'company' => 'required',
            'location' => 'required',
            'price' => 'required|numeric| min:0',
            'apartment_number' => 'required|numeric',
            'status' => 'required'
        ],
        [
            'project_name.required' => 'Tên dự án còn trống',
            'company.required' => 'Công ty trực thuộc còn trống',
            'location.required' => 'Vị trí còn trống',
            'price.required' => 'Giá trị còn trống',
            'price.numeric' => 'Giá trị phải là số',
            'apartment_number.required' => 'Số căn hộ còn trống',
            'apartment_number.numeric' => 'Số căn hộ phải là số',
            'status.required' => 'Tình trạng còn trống'
            // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
        ]);
            $project = project::create();  
                        
            $project->tenduan= $request->get('project_name');
            $project->congtytructhuoc = $request->get('company');
            $project->vitri = $request->get('location');
            $project->trigia= $request->get('price');
            $project->sotoanha = $request->get('apartment_number');
            $project->tinhtrang = $request->get('status');
            
            $project->save();
            session()->flash('create_notif','Tạo dự án thành công!');
            return redirect('/admin/project');
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
        $project_list = DB::table('duan')->get();
        $project = project::find($id);
        return view("admin.project.edit", compact('project','project_list'));
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
            'project_name' => 'required',
            'company' => 'required',
            'location' => 'required',
            'project_worth' => 'required|numeric| min:0',
            'apartment_number' => 'required|numeric',
            'status' => 'required'
        ],
        [
            'project_name.required' => 'Tên dự án còn trống',
            'company.required' => 'Công ty trực thuộc còn trống',
            'location.required' => 'Vị trí còn trống',
            'price.required' => 'Giá trị còn trống',
            'price.numeric' => 'Giá trị phải là số',
            'apartment_number.required' => 'Số căn hộ còn trống',
            'apartment_number.numeric' => 'Số căn hộ phải là số',
            'status.required' => 'Tình trạng còn trống'
            // 'date_format:Y-m-d' => 'Ngày tháng theo định dạng năm-tháng-ngày',
        ]);          
            $project = Project::find($id);

            $project->tenduan= $request->get('project_name');
            $project->congtytructhuoc = $request->get('company');
            $project->vitri = $request->get('location');
            $project->trigia= $request->get('project_worth');
            $project->sotoanha = $request->get('apartment_number');
            $project->tinhtrang = $request->get('status');
            //luu input
            $project->save();
            session()->flash('update_notif','Cập nhật dự án thành công!');
            return redirect('/admin/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //xoa 
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        session()->flash('delete_notif','Đã xóa căn hộ');
        return redirect('/admin/project');
    }
}
