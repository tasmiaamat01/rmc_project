<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\LeaveType;
use App\LeaveApplication;
use App\Employee;
use DB;

class LeaveController extends Controller
{
    // Leave Type Managements..................................................................
    public function leavetype_index()
    {
        $data = LeaveType::orderBy('created_at','desc')->get();
        return view('main.admin.payroll.leave_list',compact('data'));
    }

    public function leavetype_create()
    {
        return view('main.admin.payroll.leave_create');
    }

    public function leavetype_store(Request $request)
    {
        $request->validate([
            'leave_name' => 'unique:leave_types|required',
            'leave_days' => 'required|numeric',
            'status' => 'required',
            'description'   => 'required|string|required|max:300'
        ]);

        $data = new LeaveType();
        $input = $request->all();
        $input['created_by']='';
        $data->fill($input)->save();
        return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
    }

    public function leavetype_edit($id)
    {
        $data = LeaveType::where('id',$id)->first();
        return view('main.admin.payroll.leave_edit',compact('data'));
    }

    public function leavetype_update(Request $request,$id)
    {

        $data = LeaveType::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function leavetype_destroy($id)
    {
        $data=LeaveType::findOrfail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    }


    // Leave Application Managements..................................................................
    public function leaveapp_index()
    {
        $data = DB::table('leave_applications')
        ->join('employees','employees.id','=','leave_applications.emp_id')
        ->join('leave_types','leave_types.id','=','leave_applications.l_id')
        ->select('leave_applications.*','leave_types.leave_name','employees.name')
        ->orderBy('created_at','desc')
        ->get();
        
        return view('main.admin.payroll.leaveapp_list',compact('data'));
    }

    public function leaveapp_create()
    {
        $leave = LeaveType::orderBy('created_at','desc')->get(); 
        $employee = Employee::orderBy('created_at','desc')->get();
        return view('main.admin.payroll.leaveapp_create',compact('leave','employee'));
    }

    public function leaveapp_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'emp_id' => 'required|numeric',
            'l_id' => 'required|numeric',
            'apply_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|numeric',
            'reason' => 'required|max:100',
            'note'   => 'required|string|required|max:300'
        ]);
        $data=DB::table('leave_applications')->insert([
            'emp_id' => $request->emp_id,
            'l_id' => $request->l_id,
            'apply_date' => $request->apply_date,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days' => $request->days,
            'status' => $request->status,
            'reason' => $request->reason,
            'note'   => $request->note,
            'created_by' =>'',
        ]);
        return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
    }

    public function leaveapp_edit($id)
    {
        $data = DB::table('leave_applications')
        ->join('employees','employees.id','=','leave_applications.emp_id')
        ->join('leave_types','leave_types.id','=','leave_applications.l_id')
        ->select('leave_applications.*','leave_types.leave_name','employees.name as emp_name','employees.id as emp_id','leave_types.id as l_id')
        ->orderBy('created_at','desc')
        ->first();
        $leave = LeaveType::orderBy('created_at','desc')->get(); 
        $employee = Employee::orderBy('created_at','desc')->get();
        return view('main.admin.payroll.leaveapp_edit',compact('data','leave','employee'));
    }

    public function leaveapp_update(Request $request,$id)
    {

        $data = LeaveApplication::findOrFail($id);
        $input = $request->all();
        $input['created_by']='';
        $data->update($input);
        return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
    }

    public function leaveapp_destroy($id)
    {
        $data=LeaveApplication::findOrfail($id);
        $data->delete();
        return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
    }

    public function payslip_index()
    {
        return view('main.admin.payroll.payslip_list');
    }
}
