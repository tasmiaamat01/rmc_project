<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Project;
use App\Progroup;
use App\Prosubgroup;
use App\Protype;
use App\Procontructor;
use App\Customer;
use Redirect;

class projectController extends Controller
{
    public function create_project()
    {
    	$group=Progroup::get();
        $subgroup=Prosubgroup::get();
        $type=Protype::get();
        $contructor=Procontructor::get();
        $customer=Customer::get();
        return view('main.admin.manage_project.project_create',compact('group','subgroup','type','contructor','customer'));
    }
    public function list_project()
    {
        $project = Project::with(['group','subgroup','type','contructor','customer'])->get();
        return view('main.admin.manage_project.project_list',compact('project'));
    	
    }

    public function store_project(Request $request){
    	
        $request->validate([
            
            'project_id' => 'required',
            'cperson' => 'required',
            'address' => 'required'
        ]);

        $data = new Project();
        $input = $request->all();
        $data->fill($input)->save();
    	return Redirect::back()->withErrors(['Data Create Successfully...!!!']);
    }
    public function project_edit($id)
    {
        $group=Progroup::get();
        $subgroup=Prosubgroup::get();
        $type=Protype::get();
        $contructor=Procontructor::get();
        $customer=Customer::get();
    	$project = Project::findOrFail($id);
    	return view('main.admin.manage_project.project_edit',compact('project','group','subgroup','type','contructor','customer'));
    }

    public function update_project(Request $request,$id)
    {
    	$request->validate([
            'project_id' => 'required',
            'cperson' => 'required',
            'address' => 'required'
        ]);

        $data = Project::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function project_destroy($id)
    {
        $data = Project::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
