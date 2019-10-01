<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Http\Requests;

use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function index()
    { 
        $contract = Contract::paginate(2);
        return view("admin.contract.index", array('model' => $contract));
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
            'contract_code' => 'required|max:255',
            'flat_id' => 'required|max:255',
            'contract_worth' => 'required|max:255',
            'contract_date' => 'required',
            'note' => 'required'
        ],
        [
            'required' => ':attribute cannot be empty!',
            'max:255' => ':attribute must be smaller than 2 billions'
        ]);
            $contract = Contract::create();
            
            $contract->mahopdong= $request->get('contract_code');
            $contract->idcanho= $request->get('flat_id');
            $contract->giatri = $request->get('contract_worth');
            $contract->ngayky = $request->get('contract_date');
            $contract->ghichu = $request->get('note');

            $contract->save();
            
            
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
            'contract_code' => 'required',
            // 'flat_id'=> 'required|numeric',
            'contract_worth' => 'required|numeric',
            'contract_date' => 'required',
            'note' => 'required|max:500'
        ],
        [
            'required' => 'The :attribute cannot be empty!',
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
