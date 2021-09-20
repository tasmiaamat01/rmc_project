<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mobileaccount;
use Datatables;
use Redirect;

class mobileaccountController extends Controller
{
    public function create_mobileaccount()
    {
    	return view('main.admin.bank.mobileaccount_create');
    }
    
    public function list_maccount()
    {
    	$datas = Mobileaccount::orderBy('created_at','desc')->get();
    	return view('main.admin.bank.mobileaccount_list',compact('datas'));
    }

    public function store_mobileaccount(Request $request){
    	
        $request->validate([
            'mname' => 'required',
            'mobile' => 'required'
        ]);

        $data = new Mobileaccount();
        $input = $request->all();
        $data->fill($input)->save();
    	
    	return Redirect()->route('create-mobileaccount-list');
    }
    public function mobileaccount_edit($id)
    {
    	$data = Mobileaccount::findOrFail($id);
    	return view('main.admin.bank.mobileaccount_edit',compact('data'));
    }

    public function update_mobileaccount(Request $request,$id)
    {
    	$request->validate([
            'mname' => 'required',
            'mobile' => 'required'
        ]);

        $data = Mobileaccount::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function mobileaccount_destroy($id)
    {
        $data = Mobileaccount::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
