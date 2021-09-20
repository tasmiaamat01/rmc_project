<?php

namespace App\Http\Controllers\Accounts;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Mobileaccount;
use App\PaymentVaucher;
use App\Paymentdetail;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Validator;

class PaymentVoucharController extends Controller
{
    public function index()
    {
        $results = PaymentVaucher::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.accounts.pay_voucher_list',compact('results'));
    }

    public function create()
    {
        $other_creadits = Currency::get();//for payment Source
        $pay_track = 'PAY-VNO-' . PaymentVaucher::get()->max('id');
        $mobile = Mobileaccount::orderBy('created_at','desc')->get();
        $bankAccount = Bankaccount::with(['bank'])->get()->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->acc_title.' '. $item->acc_no . ' ('. data_get($item, 'bank.name') .')',
            ];
        });
        // dd($bankAccount->toArray());
        $projects = Project::get();
        $suppliers = Supplier::with('invoices')->whereHas('invoices', function($q){
            return $q->where('status', 0);
        })->get();
        // dd($suppliers->toArray());
        $types = Protype::get();

        return view('main.admin.accounts.pay_voucher_create',compact('other_creadits','projects','suppliers','types','bankAccount','mobile','pay_track'));
    }
    public function store(Request $request)
    {
      
        if($request->ajax())
        {
        
            $request->validate([
                'voucher_no'=> 'required',
                'project_id' => 'required',
                'total' => 'required',
                'date' => 'required'
            ]);
            $user_id=Auth::User()->id;
           
            $insert=DB::table('payment_vauchers')->insert([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'amount' =>  $request->total,
                'date' =>  $request->date,
                'note' =>  $request->note,
                'uid' => $user_id
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->voucher_no,
                'status' =>  'PAY',
                'amount' =>  $request->total,
                'credit' =>  $request->total,
                'uid' => $user_id
            ]);
        
        
            $rules = array(
            'payment_source.*'  => 'required',
            'payment_to.*'  => 'required',
            'type_id.*'  => 'required',
            'amount.*'  => 'required',
            'ref.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
            }
            $voucher_no = $request->voucher_no;
            $payment_source = $request->payment_source;
            $payment_to = $request->payment_to;
            $type_id = $request->type_id;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($payment_source); $count++)
            {
            $data = array(
                'payment_source' => $payment_source[$count],
                'payment_to'  => $payment_to[$count],
                'voucher_no' =>$voucher_no,
                'cheque_no' => $cheque_no[$count],
                'cheque_date'  => $cheque_date[$count],
                'amount'  => $amount[$count],
                'ref'  => $ref[$count],
                'type_id' => $type_id[$count],
                
               
            );
            $insert_data[] = $data; 
            }

            Paymentdetail::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
            }
    }
    public function getSupplierInvoice($supplier_id)
    {
       $result= Supplier::with(['invoices'=>function($q){
            $q->where('status', 0);
       }])->whereHas('invoices', function($q){
            return $q->where('status', 0);
        })->findOrFail($supplier_id);
        // dd($result->toArray());
        // $result = $result->invoice
        $payable_amount= $result->invoices->sum('grand_total');
        // dd($payable_amount);
        return response()->json(compact('result','payable_amount'));
    }
    public function destroy($id)
    {
        
            DB::table('payment_vauchers')->where('voucher_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('payment_details')->where('voucher_no', $id)->delete();
        return redirect(route('paymentvouchar-list'))->with('messages','successfully');
    }

    public function view($id)
    {
        $data = DB::table('payment_vauchers')->where('voucher_no', $id)->first();
        
        $details = DB::table('payment_details')
        ->join('suppliers','suppliers.id','=','payment_details.payment_to')
        ->select('payment_details.*','suppliers.name as supplier_name')
        ->where('voucher_no', $id)->get();
        $list = DB::table('payment_vauchers')->get();
        return view('main.admin.accounts.pay_voucher_view',compact('data','list','details'));
    }




}
