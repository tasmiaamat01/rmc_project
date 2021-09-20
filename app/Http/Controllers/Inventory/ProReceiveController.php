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
use App\BranchStock;
use App\WarehouseStock;
use Redirect;
use Auth;
use DB;

class ProReceiveController extends Controller
{
    public function index()
    {
        $receipt = Product_receipt::orderBy('created_at','desc')->get();
        return view('main.admin.inventory.receive_list',compact('receipt'));
    }
    public function create()
    {
        $purchase = Purchase::orderBy('created_at','desc')->get();
        $receipt = NULL;
        return view('main.admin.inventory.receive_create',compact('purchase','receipt'));
    }

    public function receipt_store(Request $request)
    {
        $order = Purchase::where('pur_invoice',$request->pur_invoice)->first();
        $pur_invoice = $request->pur_invoice;
        $order_no = $order->id;
        $challan_no = $request->challan_no;
        $rcv_date = $request->rcv_date;
        $note = $request->note;
        $created_by = Auth::User()->name;
        $product = Purchase_detail::where('purchase_track',$request->pur_invoice)->get();
        $receipt = 1;
        return view('main.admin.inventory.receive_create',compact('product','receipt','pur_invoice','order_no','challan_no','note','rcv_date','pur_invoice'));
    }

    public function stock_store(Request $request)
    {
        $array = [];
        foreach($request->pur_invoice as $i => $invoice):
                $products = Product::where('id', $request->item_id[$i])->first();
                $stock = $products->min_stock;
                $min_stock = $stock + $request->rcv_qty[$i];
            $array[] = [
                'pur_invoice' => $invoice,
                'order_no' => $request->order_no,
                'challan_no' => $request->challan_no,
                'rcv_date' => $request->rcv_date,
                'note' => $request->note,
                'item_id' => $request->item_id[$i],
                'item_name' => $request->item_name[$i],
                'purchase_qty' => $request->purchase_qty[$i],
                'rcv_qty' => $request->rcv_qty[$i],
                'rest_qty' => $request->rest_qty[$i],
                'created_by' => Auth::User()->name,
                'now_qty' => $min_stock,
            ];
                $stock = Purchase::where('pur_invoice',$request->pur_invoice)->first();
                $first = filter_var($stock->product_store, FILTER_SANITIZE_NUMBER_INT);

                $storestock = preg_replace("/[^[:alnum:][:space:]]/u", '', $first);
                if($stock->product_store == 'BR')
                {
                    $branch_stock = BranchStock::where('product_id',$request->item_id[$i])->first();
                    if($branch_stock)
                    {
                        $branch_min_stock = $branch_stock->quantity + $request->rcv_qty[$i];
                        $branch_stock_update = BranchStock::where('product_id',$request->item_id[$i])->update([
                            'quantity' => $branch_min_stock ,
                            'purchase_qty' => $request->purchase_qty[$i] + $branch_stock->purchase_qty ,
                            'recv_qty' => $request->rcv_qty[$i] + $branch_stock->recv_qty,
                            'rest_qty' => $request->rest_qty[$i] + $branch_stock->rest_qty,
                        ]);
                    }
                    else{
                        $branch_stock = BranchStock::insert([
                            'branch_id' => $storestock ,
                            'product_id' => $request->item_id[$i] ,
                            'invoice' => $invoice ,
                            'quantity' => $request->rcv_qty[$i] ,
                            'purchase_qty' => $request->purchase_qty[$i] ,
                            'recv_qty' => $request->rcv_qty[$i] ,
                            'rest_qty' => $request->rest_qty[$i] ,
                            'created_by' => Auth::User()->name,
                        ]);
                    }
                }
                else{
                    $warehouse_stock = WarehouseStock::where('product_id',$request->item_id[$i])->first();
                    if($warehouse_stock)
                    {
                        $wharehouse_min_stock = $warehouse_stock->quantity + $request->rcv_qty[$i];
                        $warehouse_stock_update = WarehouseStock::where('product_id',$request->item_id[$i])->update([
                            'quantity' => $wharehouse_min_stock ,
                            'purchase_qty' => $request->purchase_qty[$i] + $warehouse_stock->purchase_qty ,
                            'recv_qty' => $request->rcv_qty[$i] + $warehouse_stock->recv_qty,
                            'rest_qty' => $request->rest_qty[$i] + $warehouse_stock->rest_qty,
                        ]);
                    }
                    else{

                        $warehouse_stock_update = WarehouseStock::insert([
                            'warehouses_id' => $storestock ,
                            'product_id' => $request->item_id[$i] ,
                            'invoice' => $invoice ,
                            'quantity' => $request->rcv_qty[$i] ,
                            'purchase_qty' => $request->purchase_qty[$i] ,
                            'recv_qty' => $request->rcv_qty[$i] ,
                            'rest_qty' => $request->rest_qty[$i] ,
                            'created_by' => Auth::User()->name,
                        ]);
                    }
                }
                $product = Product::where('id',$request->item_id)->update(['min_stock' => $min_stock]);
        endforeach;
        Product_receipt::insert($array);
        return Redirect::route('proreceive-list')->withErrors(['Products Added Successfully...!!!']);

    }


    public function show($id)
    {
        $receipt = Product_receipt::findOrfail($id);
        return view('main.admin.inventory.receive_view',compact('receipt'));
    }
    public function destroy($id)
    {
        $receipt = Product_receipt::findOrfail($id);
        $receipt->delete();
        return redirect(route('proreceive-list'));
    }
}
