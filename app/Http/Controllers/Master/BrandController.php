<?php

namespace App\Http\Controllers\Master;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::get();
        // dd($brands->toArray());
        return view('main.admin.master.brandlist',compact('brands'));
    }

    public function create()
    {
        return view('main.admin.master.brandcreate');
    }

    public function store(BrandRequest $request)
    {
        // dd($request->all());
        Brand::create($request->all());
        return redirect(route('brand-create-route'))->with('messages','successfully');
    }
    public function edit($id)
    {
        // dd($id);
        $brand = Brand::find($id);
        return view('main.admin.master.brandedit',compact('brand'));
    }

    public function update(BrandRequest $request,$id)
    {
        $brand=Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect(route('brand-list'))->withSuccess('messages');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        // dd($brand);
        return redirect(route('brand-list'))->with('messages','successfully');
    }
}
