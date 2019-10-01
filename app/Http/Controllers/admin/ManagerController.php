<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Http\Requests;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = manager::paginate(2);
        return view("admin.manager.index", array('model' => $manager));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.manager.create");
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
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'email|required',
            'address' => 'required'
        ],
        [
            'required' => ':attribute cannot be empty!',
            'email' => ':attribute must be an email address',
            'max:255' => ':attribute must be shorter than 255 character'
        ]);
            $manager = Manager::create();
            $manager->hoten= $request->get('name');
            $manager->vaitro= $request->get('role');
            $manager->sodienthoai = $request->get('phone_number');
            $manager->email = $request->get('email');
            $manager->diachi = $request->get('address');

            $manager->save();
            
            
            return redirect('/admin/manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = Manager::find($id);
        return view('admin.manager.show')->with('manager',$manager);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = manager::find($id);
        return view("admin.manager.edit", compact('manager'));
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
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'email|required',
            'address' => 'required'
        ],
        [
            'required' => ':attribute cannot be empty!',
            'email' => ':attribute must be an email address',
            'max:255' => ':attribute must be shorter than 255 character'
        ]);
            $manager = Manager::find($id);

            $manager->hoten= $request->get('name');
            $manager->vaitro= $request->get('role');
            $manager->sodienthoai = $request->get('phone_number');
            $manager->email = $request->get('email');
            $manager->diachi = $request->get('address');

            $manager->save();
            
            
            return redirect('/admin/manager')->with('success!','Contract updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = Manager::find($id);
        $manager->delete();

        return redirect('/admin/manager')->with([
            'flash_message' => 'Deleted',
            'flash_message_important' => false
        ]);
    }
}
