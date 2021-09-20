<?php

namespace App\Http\Controllers\Master;

use App\Manufacture;
use App\Http\Requests\ManufactureRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function index()
    {
        $manufactures = Manufacture::get();
        return view('main.admin.master.manufacturerlist',compact('manufactures'));
    }

    public function create()
    {
        return view('main.admin.master.manufacturercreate');
    }

    public function store(ManufactureRequest $request)
    {
        // dd($request->toArray());
        Manufacture::create($request->all());
        return redirect(route('manufacture-create-route'))->with('messages','successful');
    }

    public function edit($id)
    {
        $manufacture = Manufacture::find($id);
        return view('main.admin.master.manufactureredit',compact('manufacture'));
    }

    public function update(ManufactureRequest $request,$id)
    {
        $manufacture=Manufacture::findOrFail($id);
        // dd($manufacture);
        $manufacture->update($request->all());
        return redirect(route('manufacture-list'))->withSuccess('messages');
    }

    public function destroy($id)
    {
        // dd($id);
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->delete();
        return redirect(route('manufacture-list'))->with('messages','successfully');
    }
}
