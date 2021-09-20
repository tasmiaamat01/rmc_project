<?php

namespace App\Http\Controllers\Client;

use App\C_Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $cgroups = C_Group::get();
        return view('main.admin.client_setup.group_list',compact('cgroups'));
    }

    public function create()
    {
        return view('main.admin.client_setup.group_create');
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        C_Group::create($request->all());
        return redirect(route('group-create-route'));
    }

    public function edit($id)
    {
        $cgroup = C_Group::find($id);
        return view('main.admin.client_setup.group_edit',compact('cgroup'));
    }

    public function update(Request $request,$id)
    {
        $cgroup = C_Group::findOrFail($id);
        $cgroup->update($request->all());
        return redirect(route('group-list'));
    }
    public function destroy($id)
    {
        $group = C_Group::findOrFail($id);
        $group->delete();
        // dd($group);
        return redirect(route('group-list'))->with('messages','successfully');
    }
}
