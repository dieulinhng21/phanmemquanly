<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\apartment;
use App\Http\Requests;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartment = apartment::paginate(2);
        return view("admin.apartment.index", array('model' => $apartment));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.apartment.create");
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
            'project_name' => 'required|max:255',
            'apartment_name' => 'required|max:255',
            'total_room' => 'required|numeric',
            'status' => 'required'
        ],
        [
            'required' => 'Input cannot be empty!',
            'numeric' => 'Input must be number',
            'max:255' => 'Input must not be more than 255 character'
        ]);
            // $name = $request->get('name');
            $apartment = Apartment::create();
            
            $apartment->idduan= $request->get('project_name');
            $apartment->ten= $request->get('apartment_name');
            $apartment->tongsophong = $request->get('total_room');
            $apartment->tinhtrang = $request->get('status');

            $apartment->save();
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
        return view('admin.apartment.show')->with('apartment',$apartment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = apartment::find($id);
        return view("admin.apartment.edit", compact('apartment'));
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
            'project_name' => 'required|max:255',
            'apartment_name' => 'required|max:255',
            'total_room' => 'required|numeric',
            'status' => 'required'
        ],
        [
            'required' => 'Input cannot be empty!',
            'numeric' => 'Input must be number',
            'max:255' => 'Input must not be more than 255 character'
        ]);
            
            $apartment->idduan= $request->get('project_name');
            $apartment->ten= $request->get('apartment_name');
            $apartment->tongsophong = $request->get('total_room');
            $apartment->tinhtrang = $request->get('status');       

            $apartment->save();
            return redirect('/admin/apartment')->with('success!','Apartment updated!');
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

        return redirect('/admin/apartment')->with([
            'flash_message' => 'Deleted',
            'flash_message_important' => false
        ]);
    }
}
