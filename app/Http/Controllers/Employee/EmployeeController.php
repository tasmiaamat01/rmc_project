<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Employee;
use App\Department;
use App\Designation;
use App\Branch;
use DB;

class EmployeeController extends Controller
{
    public function employee_index()
    {
        $data = DB::table('employees')
        ->join('departments','departments.id','=','employees.dept_id')
        ->join('designations','designations.id','=','employees.desg_id')
        ->join('branches','branches.id','=','employees.wbrid')
        ->where('status','!=','007')
        ->select('employees.*','departments.dept_name','designations.desg_name','branches.name as br_name')
        ->orderBy('employees.created_at','desc')
        ->get();
        return view('main.admin.payroll.employee_list',compact('data'));
    }

    public function create_page()
    {
        $department=Department::orderBy('dept_name','asc')->get();
        $designation=Designation::orderBy('desg_name','asc')->get();
        $branch=Branch::orderBy('name','asc')->get();
        return view('main.admin.payroll.employee_create',compact('designation','department','branch'));
    }

    public function employee_store(Request $request)
    {
        $request->validate([
            'dept_id'   => 'required|string|numeric',
            'desg_id'   => 'required|string|numeric',
            'name'   => 'required|string',
            'fname'   => 'required|string',
            'mobile'   => 'required|string|max:11',
            'email' => 'unique:employees|email|required',
            'mname'   => 'required|string',
            'phone'   => 'required|string|max:11',
            'nidno'   => 'required|string|max:17',
            'dob'   => 'required|string',
            'join_date'   => 'required|string',
            'salary'   => 'required|string|numeric',
            'status'   => 'required|string',
            'wbrid'   => 'required',
            'item'   => 'required|mimes:jpeg,jpg,png,svg,jpeg,JPEG,PNG,JPG',
            'address'   => 'required|string|required|max:300',
            'paddress'   => 'required|string|required|max:300'
        ]);
        $data = new Employee();
        $input = $request->all();
        $image=$request->file('item');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='Upload/Employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $input['item']=$image_url;
            $input['created_by']='';
            $data->fill($input)->save();
        return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
        }
        else{
        return Redirect::back()->withErrors(['Data Did not Added Successfully...!!!']);
        }
    }

    public function edit_page($id)
    {
        $data = DB::table('employees')
        ->join('departments','departments.id','=','employees.dept_id')
        ->join('designations','designations.id','=','employees.desg_id')
        ->join('branches','branches.id','=','employees.wbrid')
        ->where('employees.id',$id)
        ->select('employees.*','departments.dept_name','designations.desg_name','branches.name as br_name')
        ->first();
        $department=Department::orderBy('dept_name','asc')->get();
        $designation=Designation::orderBy('desg_name','asc')->get();
        $branch=Branch::orderBy('name','asc')->get();
        return view('main.admin.payroll.employee_edit',compact('data','designation','department','branch'));
    }

    public function update_store(Request $request,$id)
    {
        $data = Employee::findOrFail($id);
        $input = $request->all();
        $image=$request->file('item');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='Upload/Employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $input['item']=$image_url;
            $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
        }
        else{
        $data = Employee::findOrFail($id);
        $input = $request->all();
        $input['item']=$data->item;
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
        }
    }

    public function Employee_destroy($id)
    {
        $data=Employee::findOrfail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    }
}
