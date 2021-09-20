<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Role;
use App\Employee;
use App\Branch;
use App\User;
use DB;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_index()
    {
        $user=User::where('status','!=','007')->orderBy('created_at','desc')->get();
        return view('main.admin.user_role.user_list',compact('user'));
    }

    public function user_create()
    {
        $employee = DB::table('employees')
        ->join('departments','departments.id','=','employees.dept_id')
        ->join('designations','designations.id','=','employees.desg_id')
        ->join('branches','branches.id','=','employees.wbrid')
        ->select('employees.*','departments.dept_name','designations.desg_name','branches.name as br_name')
        ->orderBy('employees.created_at','desc')
        ->get();
        $branch = Branch::orderBy('created_at','desc')->get();
        return view('main.admin.user_role.user_create',compact('employee','branch'));
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'emp_id'   => 'required|string|numeric',
            'bname'   => 'required|string',
            'email' => 'unique:users|email|required',
            'password'   => 'required|string|max:20',
            'brand_id'   => 'required|string|max:11',
            'status' => 'required',
        ]);
        $employee=Employee::where('id',$request->emp_id)->first();
        $data=DB::table('users')->insert([
            'emp_id' => $request->emp_id,
            'name' => $employee->name,
            'bname'   => $request->bname,
            'email' => $request->email,
            'password'   => Hash::make($request->password),
            'brand_id'   => $request->brand_id,
            'status' => $request->brand_id
        ]);
        if($data){
            return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
        }
        else{
            return Redirect::back()->withErrors(['Data Can not be Successfully...!!!']);
        }
    }
}

