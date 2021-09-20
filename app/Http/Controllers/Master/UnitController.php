<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::get();
        // dd($units->toArray());
        return view('main.admin.master.unitlist',compact('units'));
    }

    public function create()
    {
        return view('main.admin.master.unitcreate');
    }

    public function store(UnitRequest $request)
    {
        // dd($request->all());
        Unit::create($request->all());
        return redirect(route('unit-create-route'))->with('messages','successfully');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('main.admin.master.unitedit',compact('unit'));
    }

    public function update(UnitRequest $request,$id)
    {
        $unit=Unit::findOrFail($id);
        $unit->update($request->all());
        return redirect(route('unit-list'))->withSuccess('messages');
    }
    public function destroy($id)
    {
        // dd($id);
        $unit= Unit::findOrFail($id);

        $unit->delete();
        return redirect(route('unit-list'))->with('messages','successfully');
    }
}
