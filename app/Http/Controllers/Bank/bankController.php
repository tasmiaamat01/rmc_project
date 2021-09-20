<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Bank;
use Redirect;


class bankController extends Controller
{    
    public function create_bank()
    {
    	return view('main.admin.bank.bank_create');
    }
    public function list_bank()
    {
    	$datas = Bank::orderBy('created_at','desc')->get();
    	return view('main.admin.bank.bank_list',compact('datas'));
    }

    public function store_bank(Request $request){
    	
        $request->validate([
            'sort' => 'unique:banks|required',
            'name' => 'unique:banks|required'
        ]);

        $data = new Bank();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Bank::orderBy('created_at','desc')->get();
    	return view('main.admin.bank.bank_list ',compact('datas'));
    }
    public function bank_edit($id)
    {
    	$data = Bank::findOrFail($id);
    	return view('main.admin.bank.bank_edit',compact('data'));
    }

    public function update_bank(Request $request,$id)
    {
    	$request->validate([
            'sort' => 'unique:banks|required',
            'name' => 'unique:banks|required'
        ]);

        $data = Bank::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function bank_destroy($id)
    {
        $data = Bank::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
