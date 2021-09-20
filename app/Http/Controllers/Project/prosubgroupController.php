<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Datatables;
use DB;
use App\Prosubgroup;
use App\Progroup;
use Redirect;


class prosubgroupController extends Controller
{
    public function create_prosubgroup()
    {
        $group = Progroup::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_subgroup_create',compact('group'));
    }
    public function list_prosubgroup()
    {
        $datas= DB::table('prosubgroups')
        ->join('progroups','progroups.id','=','prosubgroups.pgid')
        ->select('progroups.name as pg_name','prosubgroups.*')
        ->get();
        // dd($datas);
    	return view('main.admin.manage_project.project_subgroup_list',compact('datas'));
    }

    public function store_prosubgroup(Request $request)
    {	
        $request->validate([
            'pgid' => 'unique:prosubgroups|required',
            'name' => 'unique:prosubgroups|required'
        ]);

        $data = new Prosubgroup();
        $input = $request->all();
        $data->fill($input)->save();
    	$datas = Prosubgroup::orderBy('created_at','desc')->get();
    	return Redirect()->route('prosubgroup-list-create');
    }
    public function prosubgroup_edit($id)
    {   
        $subgroup = Prosubgroup::find($id);
        $group = Progroup::orderBy('created_at','desc')->get();
    	return view('main.admin.manage_project.project_subgroup_edit',compact('group','subgroup'));
    }

    public function update_prosubgroup(Request $request,$id)
    {
        // dd('hi');
    	$request->validate([
            'pgid' => 'required',
            'name' => 'required'
        ]);

        $data = Prosubgroup::findOrFail($id);
        $input = $request->all();
        $data->update($input);

        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function prosubgroups_destroy($id)
    {
        $data = Prosubgroup::findOrFail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    } 
}
