<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::get();
        // dd($category->toArray());
        return view('main.admin.productsetup.product_category_list',compact('categorys'));
    }

    public function create()
    {
        return view('main.admin.productsetup.product_category_create');
    }
    public function store(Request $request)
    {
        // dd($request->toArray());
        Category::create($request->all());
        return redirect(route('category-create-route'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('main.admin.productsetup.product_category_edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect(route('category-list'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('category-list'));
    }
}
