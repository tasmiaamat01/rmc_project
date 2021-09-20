<?php

namespace App\Http\Controllers\Client;

use App\C_Group;
use App\Http\Controllers\Controller;
use App\Product;
use App\Supplier;
use App\Zone;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();
        return view('main.admin.client_setup.supplier_list',compact('suppliers'));
    }
    public function create()
    {
        $zones = Zone::get();
        $groups = C_Group::get();
        return view('main.admin.client_setup.supplier_create',compact('zones','groups'));
    }

    public function store(Request $request)
    {
        // dd($request->toArray());
        Supplier::create($request->all());
        return redirect(route('supplier-list'))->with('messages','successfully');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $zones = Zone::get();
        $groups = C_Group::get();
        return view('main.admin.client_setup.supplier_edit',compact('supplier','zones','groups'));
    }
    public function update(Request $request,$id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect(route('supplier-list'));
    }
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        // dd($group);
        return redirect(route('supplier-list'))->with('messages','successfully');
    }
}
