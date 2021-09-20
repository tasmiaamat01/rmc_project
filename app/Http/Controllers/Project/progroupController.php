<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Progroup;
use Redirect;

class progroupController extends Controller
{
    public function create_progroup()
    {
    	return view('main.admin.manage_project.project_group_create');
    }
    public function list_progroup()
    {
    	$datas = Progroup::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_group_list',compact('datas'));
    }

    public function store_progroup(Request $request)
    {	
        $request->validate([
            'code' => 'unique:progroups|required',
            'name' => 'unique:progroups|required'
        ]);

        $data = new Progroup();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Progroup::orderBy('created_at','desc')->get();
    	return Redirect()->route('progroup-list-create');
    }
    public function progroup_edit($id)
    {
    	$data = Progroup::findOrFail($id);
    	return view('main.admin.manage_project.project_group_edit',compact('data'));
    }

    public function update_progroup(Request $request,$id)
    {
    	$request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $data = Progroup::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function progroups_destroy($id)
    {
        $data = Progroup::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
