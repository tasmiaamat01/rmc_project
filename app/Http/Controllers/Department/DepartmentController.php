<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Department;

class DepartmentController extends Controller
{
    public function department_index()
    {
        $data = Department::orderBy('created_at','desc')->get();
        return view('main.admin.payroll.department_list',compact('data'));
    }

    public function create_page()
    {
        return view('main.admin.payroll.department_create');
    }

    public function dept_store(Request $request)
    {
        $request->validate([
            'dept_name' => 'unique:departments|required',
            'description'   => 'required|string|required|max:300'
        ]);

        $data = new Department();
        $input = $request->all();
        $input['created_by']='';
        $data->fill($input)->save();
        return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
    }

    public function edit_page($id)
    {
        $data = Department::where('id',$id)->first();
        return view('main.admin.payroll.department_edit',compact('data'));
    }

    public function update_store(Request $request,$id)
    {
        $request->validate([
            'dept_name' => 'unique:departments|required',
            'description'   => 'required|string|required|max:300'
        ]);

        $data = Department::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function department_destroy($id)
    {
        $data=Department::findOrfail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    }
}
