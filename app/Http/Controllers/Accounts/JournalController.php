<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\JournalVoucher;
use App\JournalVoucherDetail;
use App\Ledger;
use App\Project;
use App\SubGroup;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        return view('main.admin.accounts.jour_list');
    }
    public function create()
    {
        $projects = Project::get();
        $sub_groups = SubGroup::get();
        $ledgers = Ledger::get();
        return view('main.admin.accounts.jour_create',compact('projects','sub_groups','ledgers'));
    }
    public function store(Request $request)
    {
        if($request->ajax())
        {
        // dd($request->all());
        $data = $request->except('_token', 'debit_sub_group_id', 'debit_ledger_id', 'debit_amount', 'credit_ledger_id', 'credit_sub_group_id','cheque_no','cheque_date','ref');
        $result = JournalVoucher::create($data);
        // dd($request->debit_sub_group_id);

        foreach($request->debit_sub_group_id as $key => $value):
            $details[] = [
                'journal_voucher_id' => $result->id,
                'debit_ledger_id' => $request->debit_ledger_id[$key],
                'debit_sub_group_id' => $request->debit_sub_group_id[$key],
                'debit_amount' => $request->debit_amount[$key],
                'credit_ledger_id' => $request->credit_ledger_id[$key],
                'credit_sub_group_id' => $request->credit_sub_group_id[$key],
                'cheque_no' => $request->cheque_no[$key],
                'cheque_date' => $request->cheque_date[$key],
                'ref' => $request->ref[$key],
            ];
        endforeach;



        // dd($request->all(),$details);
        JournalVoucherDetail::insert($details);
        return response()->json([
            'success'  => 'Data Added successfully.'
        ]);
        }   
           
    }
}
