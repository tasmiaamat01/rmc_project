<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Procontructor;
use Redirect;

class procontuctorController extends Controller
{
    public function create_project_contructor()
    {
    	return view('main.admin.manage_project.project_contructor_create');
    }
    public function list_project_contructor()
    {
    	$datas = Procontructor::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_contructor_list',compact('datas'));
    }

    public function store_project_contructor(Request $request){
    	
        $request->validate([
            'code' => 'unique:procontructors|required',
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required'
        ]);

        $data = new Procontructor();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Procontructor::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_contructor_list ',compact('datas'));
    }
    public function project_contructor_edit($id)
    {
    	$data = Procontructor::findOrFail($id);
    	return view('main.admin.manage_project.project_contructor_edit',compact('data'));
    }

    public function update_project_contructor(Request $request,$id)
    {
    	$request->validate([
            'name' => 'required',
            'code' => 'required',
            'mobile' => 'required',
            'address' => 'required'
        ]);

        $data = Procontructor::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function project_contructor_destroy($id)
    {
        $data = Procontructor::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
