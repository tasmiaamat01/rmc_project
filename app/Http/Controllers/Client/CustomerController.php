<?php

namespace App\Http\Controllers\Client;

use App\Customer;
use App\District;
use App\Group;
use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with(['group','district','zone'])->get();
        return view('main.admin.client_setup.customer_list',compact('customers'));
    }
    public function create()
    {
        $groups = Group::get();
        $districts = District::get();
        $zones = Zone::get();
        return redirect(route('customer-list'))->with('messages','successfully');
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
        return redirect(route('customer-create-route'));
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        $groups = Group::get();
        $districts = District::get();
        $zones = Zone::get();
        return view('main.admin.client_setup.customer_edit',compact('groups','districts','zones','customer'));
    }

    public function update(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect(route('customer-list'));
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        // dd($group);
        return redirect(route('customer-list'))->with('messages','successfully');
    }
}
