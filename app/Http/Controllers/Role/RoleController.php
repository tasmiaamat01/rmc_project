<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Carbon\Carbon;
use App\Role;
use App\User;
use DB;

class RoleController extends Controller
{
    public function role_index()
    {
        $user = User::orderBy('created_at','desc')->where('status','!=','007')->get();
        return view('main.admin.user_role.role_list',compact('user'));
    }
    public function role_create()
    {
        $user = User::orderBy('created_at','desc')->where('status','!=','007')->get();
        return view('main.admin.user_role.role_create',compact('user'));
    }
    public function role_store(Request $request)
    {
        $input['id'] = $request->id;
        $input['status'] = $request->status;
        $input['roles'] = $request->manage_project.', '.$request->daily_process.', '.$request->purchase.', '.
                $request->material_use.', '.$request->inventory.', '.$request->product.', '.$request->master.', '.
                $request->account.', '.$request->financial.', '.$request->payrol.', '.$request->bank.', '.$request->user_role.', '.$request->report;
        $data = DB::table('users')->where('id', $request->id)->update($input);

        if($data){
            return Redirect::back()->withErrors(['Data Added Successfully...!!!']);
        }
        else{
            return Redirect::back()->withErrors(['Data Can not be Added Successfully...!!!']);
        }
    }

    public function role_edit($id)
    {
        $user = User::orderBy('created_at','desc')->where('id',$id)->first();
        return view('main.admin.user_role.role_edit',compact('user'));
    }

    public function role_update(Request $request,$id)
    {
        $input['status'] = $request->status;
        $input['roles'] = $request->manage_project.', '.$request->daily_process.', '.$request->purchase.', '.
                $request->material_use.', '.$request->inventory.', '.$request->product.', '.$request->master.', '.
                $request->account.', '.$request->financial.', '.$request->payrol.', '.$request->bank.', '.$request->user_role.', '.$request->report;
        $data = DB::table('users')->where('id', $request->id)->update($input);

        if($data){
            return Redirect::back()->withErrors(['Data Updated Successfully...!!!']);
        }
        else{
            return Redirect::back()->withErrors(['Data Can not be Updated Successfully...!!!']);
        }
    }

    public function role_destroy($id)
    {
        $input['status'] = "";
        $input['roles'] = "";
        $data = DB::table('users')->where('id', $request->id)->update($input);

        if($data){
            return Redirect::back()->withErrors(['Data Deleted Successfully...!!!']);
        }
        else{
            return Redirect::back()->withErrors(['Data Can not be Deleted Successfully...!!!']);
        }
    }
}
