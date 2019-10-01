<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
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
            $customer = Customer::paginate(2);
            return view("admin.customer.index", array('model' => $customer));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view("admin.customer.create");
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
                'dob' => 'required|max:255',
                'identity_card' => 'required|numeric',
                'email' => 'required|email',
                'phone_number' => 'required|max:255',
                'inhabitant_number' => 'required',
                'address' => 'required|max:255',
                'note' => 'required|max:255'
            ],
            [
                'required' => ':attribute cannot be empty!',
                'numeric' => ':attribute must be number',
                'max:255' => ':attribute must be shorter than 255 characters'
            ]);
                $customer = Customer::create();
                
                $customer->hoten= $request->get('name');
                $customer->namsinh= $request->get('dob');
                $customer->chungminhthu = $request->get('identity_card');
                $customer->email = $request->get('email');
                $customer->sodienthoai = $request->get('phone_number');
                $customer->hokhau = $request->get('inhabitant_number');
                $customer->diachi = $request->get('address');
                $customer->ghichu = $request->get('note');

                $customer->save();
                
                
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
            $customer = Customer::find($id);
            return view('admin.customer.show')->with('customer',$customer);
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
        {
            $request->validate([
                'name' => 'required|max:255',
                'dob' => 'required|max:255',
                'identity_card' => 'required|numeric',
                'email' => 'required|email',
                'phone_number' => 'required|max:255',
                'inhabitant_number' => 'required',
                'address' => 'required|max:255',
                'note' => 'required|max:255'
            ],
            [
                'required' => ':attribute cannot be empty!',
                'numeric' => ':attribute must be number',
                'max:255' => ':attribute must be shorter than 255 characters'
            ]);
                $customer = Customer::find($id);
                
                $customer->hoten= $request->get('name');
                $customer->namsinh= $request->get('dob');
                $customer->chungminhthu = $request->get('identity_card');
                $customer->email = $request->get('email');
                $customer->sodienthoai = $request->get('phone_number');
                $customer->hokhau = $request->get('inhabitant_number');
                $customer->diachi = $request->get('address');
                $customer->ghichu = $request->get('note');

                $customer->save();
                
                
                return redirect('/admin/customer')->with('success!','Customer updated!');
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

            return redirect('/admin/customer')->with([
                'flash_message' => 'Deleted',
                'flash_message_important' => false
            ]);
        }
    }