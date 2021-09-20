<?php

namespace App\Http\Controllers\Purchase;

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
use Redirect;
use Auth;
use DB;

class PurchaseController extends Controller
{
    public function purchase_index()
    {
        $purchase = DB::table('purchases')
        ->join('projects','projects.id','=','purchases.project_id')
        ->select('purchases.*','projects.name as project_name')
        ->orderBy('created_at','desc')->get();
        // dd($purchase);
        return view('main.admin.purchase.purchase_list',compact('purchase'));
    }

    public function purchase_create()
    {
        $supplier = Supplier::orderBy('created_at','desc')->get();
        $product = Product::orderBy('created_at','desc')->get();
        $cart = Cart::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->first();
        return view('main.admin.purchase.purchase_create',compact('supplier','product','cart'));
    }

    public function add_to_cart(Request $request)
    {
        $input['item_id'] = $request->item_id;
        $product = Product::where('id',$request->item_id)->first();
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $product->name;
        $input['cost'] = $product->cost;
        $input['quantity'] = $request->quantity;
        $input['price'] = $product->price;
        $input['company_name'] = $request->company_name;
        $input['supplier_id'] = $request->supplier_id;
        $input['color'] = $request->color;
        $input['created_by'] = Auth::User()->name;
        $data = DB::table('carts')->insert($input);
        return Redirect::back()->withErrors(['Product Choosed To Cart Successfully...!!!']);
    }

    public function update_to_cart(Request $request)
    {
        $input['item_id'] = $request->item_id;
        // $input['id'] = $request->id;
        $product = Cart::where('id',$request->id)->first();
        $input['cookie_id'] = request()->cookie('laravel_session');
        $input['item_name'] = $product->item_name;
        $input['cost'] = $product->cost;
        $input['quantity'] = $request->quantity;
        $input['price'] = $request->price;
        $input['total'] = $request->total;
        $input['discount'] = $request->discount;
        $input['discount_amount'] = $request->discount_amount;
        $input['vat'] = $request->vat;
        $input['vat_amount'] = $request->vat_amount;
        $input['tax'] = $request->tax;
        $input['tax_amount'] = $request->tax_amount;
        $input['ait'] = $request->ait;
        $input['ait_amount'] = $request->ait_amount;
        $input['other_amount'] = $request->other_amount;
        $input['speed_money_amount'] = $request->speed_money_amount;
        $input['freight_amount'] = $request->freight_amount;
        $input['fraction_discount_amount'] = $request->fraction_discount_amount;
        $input['grand_total'] = $request->grand_total;
        $input['created_by'] = Auth::User()->name;
        $data = DB::table('carts')->where('id', $request->id)->where('cookie_id',$input['cookie_id'])->update($input);
        if(Auth::User()->name == $product->created_by && $input['cookie_id'] == $product->cookie_id)
        {
            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $inv = Purchase_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
            if($inv){
                $purchase = Purchase_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
                $purchase_t = $purchase->purchase_track;
            }
            else{
                $purchase_t = 'PRCS-VNO-' . Purchase_detail::get()->max('id');
            }

            $purchase_track = $purchase_t;
            $input['purchase_track'] = $purchase_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            // dd($input);
            $insert = DB::table('purchase_details')->insert($input);
        }
        else{

            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $purchase_track = 'PRCS-VNO-' . Purchase_detail::get()->max('id');
            $input['purchase_track'] = $purchase_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            $insert = DB::table('purchase_details')->insert($input);
        }
        return Redirect::route('view_cart_list')->withErrors(['Products Added To Cart Successfully...!!!']);
    }

    public function view_cart()
    {
        $inv = Purchase_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();

        //add this variable and condition
        $cart = [];
        if($inv):
        $cart = Purchase_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('purchase_track', $inv->purchase_track)->get();
        endif;
        return view('main.admin.purchase.cart_details',compact('cart'));
    }
    public function checkout_page()
    {
        $inv = Purchase_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();
        $cart = Purchase_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('purchase_track', $inv->purchase_track)->get();
        $invoice = $inv->purchase_track;
        $bank = Bank::orderBy('created_at','desc')->get();
        $mob_acc = Mobileaccount::orderBy('created_at','desc')->get();
        $branch = Branch::orderBy('created_at','desc')->get();
        $w_house = Warehouse::orderBy('created_at','desc')->get();
        $project = Project::orderBy('created_at','desc')->get();
        return view('main.admin.purchase.purchase_checkout',compact('cart','invoice','bank','mob_acc','branch','w_house','project'));
    }

    public function purchase_store(Request $request)
    {
        $input['pur_invoice'] = $request->pur_invoice;
        $input['payable'] = $request->payable;
        $input['paid'] = $request->paid;
        $input['balance'] = $request->balance;
        $input['purchase_date'] = $request->purchase_date;
        $input['next_date'] = $request->next_date;
        $input['product_store'] = $request->product_store;
        $input['ref'] = $request->ref;
        $input['created_by'] = $request->created_by;
        $input['project_id'] = $request->project_id;
        $input['note'] = $request->note;
        $input['lc_no'] = $request->lc_no;
        $input['pi_no'] = $request->pi_no;
        $input['lc_value'] = $request->lc_value;
        $input['lc_date'] = $request->lc_date;
        $input['pi_date'] = $request->pi_date;
        $input['lc_bank'] = $request->lc_bank;
        $order = Purchase::insertGetId($input);
        $inputs['pur_invoice'] = $request->pur_invoice;
        $inputs['payable'] = $request->payable;
        $inputs['paid'] = $request->paid;
        $inputs['balance'] = $request->balance;
        $inputs['purchase_date'] = $request->purchase_date;
        $inputs['created_by'] = $request->created_by;
        // dd($inputs);
        $inputs['caname'] = $request->caname;
        $inputs['chbid'] = $request->chbid;
        $inputs['w_bid'] = $request->w_bid;
        $inputs['mobid'] = $request->mobid;
        $inputs['trxid'] = $request->trxid;
        $inputs['cheque_date'] = $request->cheque_date;
        $inputs['cheque_no'] = $request->cheque_no;
        $inputs['bank_id'] = $request->bank_id;
        $inputs['order_no'] = $order;
        $inputs['due'] = $request->due;
        $payment = Payment::insert($inputs);

        return Redirect::route('purchase-list-page')->withErrors(['Purchase Added Successfully...!!!']);
    }

    public function show($id)
    {
        $results = Purchase::findOrFail($id);
        $list=Purchase::get();
        $details = Purchase_detail::where('purchase_track', '=', $results->pur_invoice)->get();
        // dd($results->toArray());
        return view('main.admin.purchase.purchase_view',compact('results','details','list'));
    }
    public function delete_cart($id)
    {
        $cart = Purchase_detail::findOrFail($id);
        $cart->delete();
        // dd($brand);
        return redirect(route('view_cart_list'));
    }
    public function edit_cart($id)
    {
        $supplier = Supplier::orderBy('created_at','desc')->get();
        $product = Product::orderBy('created_at','desc')->get();
        $cart = Purchase_detail::where('id',$id)->first();
        // dd($cart);
        return view('main.admin.purchase.cart_edit',compact('cart','supplier','product'));
    }
}
