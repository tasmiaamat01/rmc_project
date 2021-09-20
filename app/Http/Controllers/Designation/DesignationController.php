<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Designation;

class DesignationController extends Controller
{
    public function designation_index()
    {
        $data = Designation::orderBy('created_at','desc')->get();
        return view('main.admin.payroll.designation_list',compact('data'));
    }

    public function create_page()
    {
        return view('main.admin.payroll.designation_create');
    }

    public function dept_store(Request $request)
    {
        $request->validate([
            'desg_name' => 'unique:designations|required',
            'description'   => 'required|string|required|max:300'
        ]);

        $data = new Designation();
        $input = $request->all();
        $input['created_by']='';
        $data->fill($input)->save();
        return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
    }

    public function edit_page($id)
    {
        $data = Designation::where('id',$id)->first();
        return view('main.admin.payroll.designation_edit',compact('data'));
    }

    public function update_store(Request $request,$id)
    {
        $request->validate([
            'desg_name' => 'unique:designations|required',
            'description'   => 'required|string|required|max:300'
        ]);

        $data = Designation::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function designation_destroy($id)
    {
        $data=Designation::findOrfail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    }
}
