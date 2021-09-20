<?php

namespace App\Http\Controllers\Product;

use App\Brand;
use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Manufacture;
use App\Product;
use App\SubCategory;
use App\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category','subcategory','brand','manufacture','unit'])->get();
        // dd($products->toArray());
        return view('main.admin.productsetup.product_list',compact('products'));
    }

    public function create()
    {
        $categorys = Category::get();
        $subcategorys = SubCategory::get();
        $brands = Brand::get();
        $manufactures = Manufacture::get();
        $units = Unit::get();
        $countrys = Country::get();
        // dd($manufactures->toArray());
        return view('main.admin.productsetup.product_create',
        compact('categorys','subcategorys','brands','manufactures','units','countrys'));
    }
    public function store(Request $request)
    {
        // dd($request->toArray());
        Product::create($request->all());
        return redirect(route('product-create-route'));
    }
    public function edit($id)
    {
        $categorys = Category::get();
        $subcategorys = SubCategory::get();
        $brands = Brand::get();
        $manufactures = Manufacture::get();
        $units = Unit::get();
        $countrys = Country::get();
        $product = Product::find($id);
        // dd($Product->toArray());
        return view('main.admin.productsetup.product_edit',
        compact('categorys','subcategorys','brands','manufactures','units','countrys','product'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect(route('product-list'));
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('product-list'));
    }
}
