<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\Sales_cart;
use App\Sales_detail;
use App\Bank;
use App\Mobileaccount;
use App\Warehouse;
use App\Branch;
use App\Project;
use App\Sale;
use App\Sales_payment;
use Redirect;
use Auth;
use DB;

class salesController extends Controller
{
    public function sales_index()
    {
        $sale = DB::table('sales')
        ->join('projects','projects.id','=','sales.project_id')
        ->select('sales.*','projects.name as project_name')
        ->orderBy('created_at','desc')->get();
        // dd($purchase);
        return view('main.admin.sales.sales_list',compact('sale'));
    }

    public function sales_create()
    {
        $supplier = Supplier::orderBy('created_at','desc')->get();
        $product = Product::orderBy('created_at','desc')->get();
        $sales_cart = Sales_cart::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->first();
        return view('main.admin.sales.sales_create',compact('supplier','product','sales_cart'));
    }

    public function add_to_sales_cart(Request $request)
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
        $data = DB::table('sales_carts')->insert($input);
        return Redirect::back()->withErrors(['Product Choosed To Sales Cart Successfully...!!!']);
    }

    public function update_to_sales_cart(Request $request)
    {
        $input['item_id'] = $request->item_id;
        // $input['id'] = $request->id;
        $product = Sales_cart::where('id',$request->id)->first();
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
        $data = DB::table('sales_carts')->where('id', $request->id)->where('cookie_id',$input['cookie_id'])->update($input);
        if(Auth::User()->name == $product->created_by && $input['cookie_id'] == $product->cookie_id)
        {
            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $inv = Sales_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
            if($inv){
                $sale = Sales_detail::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
                $sale_t = $sale->sale_track;
            }
            else{
                $sale_t = 'SALE-VNO-' . Sales_detail::get()->max('id');
            }

            $sale_track = $sale_t;
            $input['sale_track'] = $sale_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            // dd($input);
            $insert = DB::table('sales_details')->insert($input);
        }
        else{

            $supplier = Supplier::where('id',$request->supplier_id)->first();
            $sale_track = 'PRCS-VNO-' . Sales_detail::get()->max('id');
            $input['sale_track'] = $sale_track;
            $input['company_name'] = $product->company_name;
            $input['supplier_id'] = $request->supplier_id;
            $input['supplier_name'] = $supplier->name;
            $input['color'] = $product->color;
            $insert = DB::table('sales_details')->insert($input);
        }
        return Redirect::route('view_sales_cart_list')->withErrors(['Products Added To Sales Cart Successfully...!!!']);
    }

    public function view_sales_cart()
    {
        $inv = Sales_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Sales_cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();

        //add this variable and condition
        $sales_cart = [];
        if($inv):
        $sales_cart = Sales_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('sale_track', $inv->sale_track)->get();
        endif;
        return view('main.admin.sales.cart_details',compact('sales_cart'));
    }
    public function sales_checkout_page()
    {
        $inv = Sales_detail::orderBy('created_at','desc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->first();
        $clear = Sales_cart::where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->delete();
        $sales_cart = Sales_detail::orderBy('created_at','asc')->where('cookie_id',request()->cookie('laravel_session'))->where('created_by',Auth::User()->name)->where('sale_track', $inv->sale_track)->get();
        $invoice = $inv->sale_track;
        $bank = Bank::orderBy('created_at','desc')->get();
        $mob_acc = Mobileaccount::orderBy('created_at','desc')->get();
        $branch = Branch::orderBy('created_at','desc')->get();
        $w_house = Warehouse::orderBy('created_at','desc')->get();
        $project = Project::orderBy('created_at','desc')->get();
        return view('main.admin.sales.sales_checkout',compact('sales_cart','invoice','bank','mob_acc','branch','w_house','project'));
    }

    public function sales_store(Request $request)
    {
        $input['sales_invoice'] = $request->sales_invoice;
        $input['payable'] = $request->payable;
        $input['paid'] = $request->paid;
        $input['balance'] = $request->balance;
        $input['sales_date'] = $request->sales_date;
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
        $order = Sale::insertGetId($input);
        $inputs['sales_invoice'] = $request->sales_invoice;
        $inputs['order_no'] = $order;
        $inputs['payable'] = $request->payable;
        $inputs['paid'] = $request->paid;
        $inputs['due'] = $request->due;
        $inputs['balance'] = $request->balance;
        $inputs['sales_date'] = $request->sales_date;
        $inputs['bank_id'] = $request->bank_id;
        $inputs['cheque_no'] = $request->cheque_no;
        $inputs['cheque_date'] = $request->cheque_date;
        $inputs['caname'] = $request->caname;
        $inputs['chbid'] = $request->chbid;
        $inputs['w_bid'] = $request->w_bid;
        $inputs['mobid'] = $request->mobid;
        $inputs['trxid'] = $request->trxid;
        $inputs['created_by'] = $request->created_by;
        $payment = Sales_payment::insert($inputs);

        return Redirect::route('sales-list-page')->withErrors(['Sales Added Successfully...!!!']);
    }

    public function show($id)
    {
        $sales = Sales_detail::findOrfail($id);
        // dd($purchase->toArray());
        return view('main.admin.sales.sales_view',compact('sales'));
    }
    public function delete_sales_cart($id)
    {
        $sales_cart = Sales_detail::findOrFail($id);
        $sales_cart->delete();
        // dd($brand);
        return redirect(route('view_sales_cart_list'));
    }
    public function edit_sales_cart($id)
    {
        $supplier = Supplier::orderBy('created_at','desc')->get();
        $product = Product::orderBy('created_at','desc')->get();
        $sales_cart = Sales_detail::where('id',$id)->first();
        // dd($cart);
        return view('main.admin.sales.cart_edit',compact('sales_cart','supplier','product'));
    }
}
