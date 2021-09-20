<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Protype;
use Redirect;


class protypeController extends Controller
{
    public function create_project_type()
    {
    	return view('main.admin.manage_project.project_type_create');
    }
    public function list_project_type()
    {
    	$datas = Protype::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_type_list',compact('datas'));
    }

    public function store_project_type(Request $request){
    	
        $request->validate([
            'name' => 'unique:protypes|required'
        ]);

        $data = new Protype();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Protype::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_type_list ',compact('datas'));
    }
    public function project_type_edit($id)
    {
    	$data = Protype::findOrFail($id);
    	return view('main.admin.manage_project.project_type_edit',compact('data'));
    }

    public function update_project_type(Request $request,$id)
    {
    	$request->validate([
            'name' => 'required'
        ]);

        $data = Protype::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function project_type_destroy($id)
    {
        $data = Protype::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
