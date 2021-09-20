<?php

namespace App\Http\Controllers\Accounts;

use App\Group;
use App\Http\Controllers\Controller;
use App\Ledger;
use App\SubGroup;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function index()
    {
        $ledgers = Ledger::with(['group','subgroup'])->get();
        // dd($ledgers->toArray());

        return view('main.admin.accounts.ledgerlist',compact('ledgers'));
    }

    public function create()
    {
        $groups=Group::get();
        $subgroups=SubGroup::get();
        $codes='LEG-NO-' . Ledger::get()->max('id');
        return view('main.admin.accounts.ledgercreate',compact('groups','subgroups','codes'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Ledger::create($request->all());
        return redirect(route('ledger-create-route'));
    }
    public function edit($id)
    {
        $groups = Group::get();
        $subgroups = SubGroup::get();
        $ledger=Ledger::find($id);
        $codes='LEG-NO-' . Ledger::get();
        return view('main.admin.accounts.ledgeredit',compact('groups','subgroups','codes','ledger'));
    }

    public function update(Request $request,$id)
    {
        $ledger = Ledger::findOrFail($id);
        $ledger->update($request->all());
        return redirect(route('ledger-list'));
    }
    public function destroy($id)
    {
        $ledger = Ledger::findOrFail($id);
        $ledger->delete();
        // dd($group);
        return redirect(route('ledger-list'))->with('messages','successfully');
    }

}
