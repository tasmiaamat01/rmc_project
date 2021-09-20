<?php

namespace App\Http\Controllers\Inventory;
use App\Product_delivery;
use App\Sale;
use App\Sales_detail;
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
use App\BranchStock;
use App\WarehouseStock;
use Redirect;
use Auth;
use DB;

class ProDeliveryController extends Controller
{
    public function index()
    {
        $delivery = Product_delivery::orderBy('created_at','desc')->get();
        return view('main.admin.inventory.delivery_list',compact('delivery'));
    }
    public function create()
    {
        $sale = Sale::orderBy('created_at','desc')->get();
        $delivery = NULL;
        return view('main.admin.inventory.delivery_create',compact('sale','delivery'));
    }

    public function delivery_store(Request $request)
    {
        $order = Sale::where('sales_invoice',$request->sales_invoice)->first();
        $sales_invoice = $request->sales_invoice;
        $order_no = $order->id;
        $challan_no = $request->challan_no;
        $deli_date = $request->deli_date;
        $note = $request->note;
        $created_by = Auth::User()->name;
        $product = Sales_detail::where('sale_track',$request->sales_invoice)->get();
        $delivery = 1;
        return view('main.admin.inventory.delivery_create',compact('product','delivery','sales_invoice','order_no','challan_no','note','deli_date','sales_invoice'));
    }

    public function stock_store(Request $request)
    {
        $array = [];
        foreach($request->sales_invoice as $i => $invoice):
                $products = Product::where('id', $request->item_id[$i])->first();
                $stock = $products->min_stock;
                $min_stock = $stock - $request->deli_qty[$i];
            $array[] = [
                'sales_invoice' => $invoice,
                'order_no' => $request->order_no,
                'challan_no' => $request->challan_no,
                'deli_date' => $request->deli_date,
                'note' => $request->note,
                'item_id' => $request->item_id[$i],
                'item_name' => $request->item_name[$i],
                'sales_qty' => $request->sales_qty[$i],
                'deli_qty' => $request->deli_qty[$i],
                'rest_qty' => $request->rest_qty[$i],
                'created_by' => Auth::User()->name,
                'now_qty' => $min_stock,
            ]; $stock = Sale::where('sales_invoice',$request->sales_invoice)->first();
                $first = filter_var($stock->product_store, FILTER_SANITIZE_NUMBER_INT);
                $storestock = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                // dd($storestock);
                if($stock->product_store = 'BR')
                {
                    $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->first();
                    $branch_min_stock = $branch_stock->quantity - $request->deli_qty[$i];
                    $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->update([
                        'quantity' => $branch_min_stock ,
                        'sold_qty' => $request->sales_qty[$i],
                        'deli_qty' => $request->deli_qty[$i],
                        'return_qty' => $request->sales_qty[$i] - $request->deli_qty[$i],
                    ]);
                }
                else{
                    $warehouse_stock = WarehouseStock::where('product_id',$request->item_id[$i])->first();
                    $warehouse_min_stock = $warehouse_stock->quantity - $request->rcv_qty[$i];
                    $warehouse_stock_update = WarehouseStock::where('product_id',$request->item_id[$i])
                    ->update([
                        'quantity' => $warehouse_min_stock ,
                        'sold_qty' => $request->sales_qty[$i],
                        'deli_qty' => $request->deli_qty[$i],
                        'return_qty' => $request->sales_qty[$i] - $request->deli_qty[$i],
                    ]);
                }
                $product = Product::where('id',$request->item_id)->update(['min_stock' => $min_stock]);
        endforeach;
        Product_delivery::insert($array);
        return Redirect::route('prodelivery-list')->withErrors(['Products Added Successfully...!!!']);

    }

    public function show($id)
    {
        $delivery = Product_delivery::findOrfail($id);
        // dd($delivery->toArray());
        return view('main.admin.inventory.delivery_view',compact('delivery'));
    }
    public function destroy($id)
    {
        $delivery = Product_delivery::findOrfail($id);
        $delivery->delete();
        return redirect(route('prodelivery-list'));
    }
}
