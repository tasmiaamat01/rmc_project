<?php

namespace App\Http\Controllers\Accounts;

use App\AccountClass;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        // $array = array(
        //         array(
        //         'id' => 1,
        //         'name' => 'Assets'
        //     ),
        //     array(
        //         'id' => 2,
        //         'name' => 'Liabilities'
        //     ),
        //     array(
        //         'id' => 3,
        //         'name' => 'Owner\'s Equity'
        //     ),
        //     array(
        //         'id' => 4,
        //         'name' => 'Expenses'
        //     ),
        //     array(
        //         'id' => 5,
        //         'name' => 'Revenue'
        //     )
        // );
        // dd($array);
        $groups=Group::with(['class'])->get();
        // ->map(function($itme) use($array){
        //     $key = array_search($itme->clsid, array_column($array, 'id'));
        //     $itme->class_name = $array[$key]['name'];
        //     return $itme;
        // });
        // dd($groups->toArray());
        return view('main.admin.accounts.grouplist',compact('groups'));
    }

    public function create()
    {
        $class = AccountClass::get();
        // dd($account_classes->toArray());
        return view('main.admin.accounts.groupcreate',compact('class'));
    }

    public function store(Request $request)
    {
           // dd($request->all());
           Group::create($request->all());
           return redirect(route('acc-group-create-route'));
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $account_classes = AccountClass::get();
        return view('main.admin.accounts.groupedit',compact('group','account_classes'));
    }

    public function update(Request $request,$id)
    {
        $group = Group::findOrFail($id);
        $group->update($request->all());
        return redirect(route('acc-group-list'));
    }
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        // dd($group);
        return redirect(route('acc-group-list'))->with('messages','successfully');
    }
}
