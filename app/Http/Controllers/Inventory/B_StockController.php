<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\Cart;
use App\Purchase_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Purchase;
use App\Payment;
use App\Product_receipt;
use Redirect;
use Auth;
use DB;

class B_StockController extends Controller
{
    public function index()
    {
        $stock = DB::table('branch_stocks')
        ->join('products','products.id','=','branch_stocks.product_id')
        ->join('branches','branches.id','=','branch_stocks.branch_id')
        ->select('*','branches.name as branch_name','products.name as product_name','products.code','products.avater')
        ->get();
        return view('main.admin.inventory.branch_stock',compact('stock'));
    }
}
