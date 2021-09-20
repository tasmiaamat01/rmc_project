<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bank;
use App\Bankaccount;
use App\Currency;
use App\Mobileaccount;
use App\Receivevoucher;
use App\Receivedetail;
use App\Cash;
use App\Project;
use App\Protype;
use App\Purchase_detail;
use App\Supplier;
use Redirect;
use Auth;
use DB;
use Validator;

class ReceiveVoucharController extends Controller
{
   

    public function index()
    {
        $results = Receivevoucher::with(['project'])->get();
        // dd($results->toArray());
        return view('main.admin.accounts.rev_voucher_list',compact('results'));
    }

    public function create()
    {
        $other_creadits = Currency::get();//for payment Source
        $pay_track = 'RCV-VNO-' . Receivevoucher::get()->max('id');
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

        return view('main.admin.accounts.rev_voucher_create',compact('other_creadits','projects','suppliers','types','bankAccount','mobile','pay_track'));
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
           
            $insert=DB::table('receive_vouchers')->insert([
                'voucher_no' =>  $request->voucher_no,
                'project_id' =>  $request->project_id,
                'amount' =>  $request->total,
                'date' =>  $request->date,
                'note' =>  $request->note,
                'uid' => $user_id
            ]);

            $insert_cash=DB::table('cashs')->insert([
                'inv_no' =>  $request->voucher_no,
                'status' =>  'RCV',
                'amount' =>  $request->total,
                'credit' =>  $request->total,
                'uid' => $user_id
            ]);
        
        
            $rules = array(
            'receive_to.*'  => 'required',
            'receive_from.*'  => 'required',
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
            $receive_to = $request->receive_to;
            $receive_from = $request->receive_from;
            $type_id = $request->type_id;
            $amount = $request->amount;
            $ref = $request->ref;
            $cheque_no = $request->cheque_no;
            $cheque_date = $request->cheque_date;


            for($count = 0; $count < count($receive_to); $count++)
            {
            $data = array(
                'receive_to' => $receive_to[$count],
                'receive_from'  => $receive_from[$count],
                'voucher_no' =>$voucher_no,
                'cheque_no' => $cheque_no[$count],
                'cheque_date'  => $cheque_date[$count],
                'amount'  => $amount[$count],
                'ref'  => $ref[$count],
                'type_id' => $type_id[$count],
                
               
            );
            $insert_data[] = $data; 
            }

            Receivedetail::insert($insert_data);
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
        
            DB::table('receive_vouchers')->where('voucher_no', $id)->delete();
            DB::table('cashs')->where('inv_no', $id)->delete();
            DB::table('receive_details')->where('voucher_no', $id)->delete();
        return redirect(route('receivevoucher-list'))->with('messages','successfully');
    }

    public function view($id)
    {
        $data = DB::table('receive_vouchers')->where('voucher_no', $id)->first();
        
        $details = DB::table('receive_details')
        ->join('suppliers','suppliers.id','=','receive_details.receive_from')
        ->select('receive_details.*','suppliers.name as supplier_name')
        ->where('voucher_no', $id)->get();
        $list = DB::table('receive_vouchers')->get();
        return view('main.admin.accounts.rev_voucher_view',compact('data','list','details'));
    }

}
