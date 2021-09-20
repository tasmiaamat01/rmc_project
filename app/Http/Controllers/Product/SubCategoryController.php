<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategorys = SubCategory::with('category')->get();
        // dd($subcategorys->toArray());
        return view('main.admin.productsetup.product_subcategory_list',compact('subcategorys'));
    }

    public function create()
    {
        $categorys = Category::get();
        return view('main.admin.productsetup.product_subcategory_create',compact('categorys'));
    }
    public function store(Request $request)
    {
        // dd($request->toArray());
        SubCategory::create($request->all());
        return redirect(route('subcategory-create-route'));
    }
    public function edit($id)
    {
        $categorys = Category::get();
        $subcategory = SubCategory::find($id);
        // dd($subcategory->toArray());
        return view('main.admin.productsetup.product_subcategory_edit',compact('subcategory','categorys'));
    }
    public function update(Request $request,$id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());
        return redirect(route('subcategory-list'));
    }
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect(route('subcategory-list'));
    }


}
