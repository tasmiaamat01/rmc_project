<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Bankaccount;
use Redirect;
use App\Bank;

class bankaccountController extends Controller
{
    public function create_bankaccount()
    {
        $datas=Bank::orderBy('created_at')->get();
    	return view('main.admin.bank.bankaccount_create',compact('datas'));
    }
    public function list_bankaccount ()
    {
    	$datas = Bankaccount::orderBy('created_at','desc')->get();
    	return view('main.admin.bank.bankaccount_list',compact('datas'));
    }

    public function store_bankaccount(Request $request){
    	
        $request->validate([
            'bid' => 'unique:bankaccounts|required',
            'acc_no' => 'required',
            'acc_title' => 'required',
            'bbrname' => 'required',
            'bbrcode' => 'required',
            'bbrlocation' => 'required',
            'uid' => 'required'
        ]);

        $data = new Bankaccount();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Bankaccount::orderBy('created_at','desc')->get();
    	return view('main.admin.bank.bankaccount_list ',compact('datas'));
    }
    public function bankaccount_edit($id)
    {
    	$data = Bankaccount::findOrFail($id);
    	return view('main.admin.bank.bankaccount_edit',compact('data'));
    }

    public function update_bankaccount(Request $request,$id)
    {
    	$request->validate([
            'bid' => 'unique:bankaccounts|required',
            'acc_no' => 'required',
            'acc_title' => 'required',
            'bbrname' => 'required',
            'bbrcode' => 'required',
            'bbrlocation' => 'required',
            'uid' => 'required'
        ]);

        $data = Bankaccount::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function bankaccount_destroy($id)
    {
        $data = Bankaccount::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
