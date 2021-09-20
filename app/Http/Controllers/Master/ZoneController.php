<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneRequest;
use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones=Zone::get();
        return view('main.admin.master.Zonelist',compact('zones'));
    }

    public function create()
    {
        return view('main.admin.master.zonecreate');
    }

    public function store(ZoneRequest $request)
    {
        // dd($request->all());
        Zone::create($request->all());
        return redirect(route('zone-create-route'))->with('messages','successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $zone = Zone::find($id);
        return view('main.admin.master.zoneedit',compact('zone'));
    }

    public function update(Request $request,$id)
    {
        $zone=Zone::findOrFail($id);
        $zone->update($request->all());
        return redirect(route('zone-list'));
        // ->withSuccess('messages');
    }


    public function destroy($id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();
        // dd($zone);
        return redirect(route('zone-list'))->with('messages','successfully');
    }
}
