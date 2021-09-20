<?php

namespace App\Http\Controllers\Accounts;

use App\Group;
use App\Http\Controllers\Controller;
use App\SubGroup;
use Illuminate\Http\Request;

class SubGroupController extends Controller
{
    public function index()
    {
        $subgroups = SubGroup::with(['group'])->get();
        // dd($subgroups->toArray());
        return view('main.admin.accounts.subgrouplist',compact('subgroups'));
    }

    public function create()
    {
        $groups = Group::get();
        $subgroup = SubGroup::get();
        // dd($groups->toArray());
        return view('main.admin.accounts.subgroupcreate',compact('groups','subgroup'));
    }

    public function store(Request $request)
    {
           // dd($request->all());
           SubGroup::create($request->all());
           return redirect(route('subgroup-create-route'));
    }
    public function edit($id)
    {
        $groups = Group::get();
        $subgroup = SubGroup::find($id);
        return view('main.admin.accounts.subgroupedit',compact('groups','subgroup'));
    }

    public function update(Request $request,$id)
    {
        $subgroup = SubGroup::findOrFail($id);
        $subgroup->update($request->all());
        return redirect(route('subgroup-list'));
    }
    public function destroy($id)
    {
        $subgroup = SubGroup::findOrFail($id);
        $subgroup->delete();
        // dd($group);
        return redirect(route('subgroup-list'))->with('messages','successfully');
    }

}
