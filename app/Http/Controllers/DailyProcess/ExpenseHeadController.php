<?php

namespace App\Http\Controllers\DailyProcess;

use App\Expensehead;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseHeadRequest;
use Illuminate\Http\Request;

class ExpenseHeadController extends Controller
{
    public function index()
    {
        $expenses = Expensehead::get();
        return view('main.admin.dailyprocess.expenses_head_list',compact('expenses'));
    }
    public function create()
    {
        return view('main.admin.dailyprocess.expenses_head_create');
    }
    public function store(ExpenseHeadRequest $request)
    {
        // dd($request->toArray());
        Expensehead::create($request->all());
        return redirect(route('expense-head-create-route'))->with('messages','successfully');
    }
    public function edit($id)
    {
        $expense = Expensehead::find($id);
        return view('main.admin.dailyprocess.expenses_head_edit',compact('expense'));
    }
    public function update(ExpenseHeadRequest $request,$id)
    {
        $expense = Expensehead::findOrFail($id);
        $expense->update($request->all());
        return redirect(route('expense-head-list'));
    }

    public function destroy($id)
    {
        $expense = Expensehead::findOrFail($id);
        $expense->delete();
        // dd($group);
        return redirect(route('expense-head-list'))->with('messages','successfully');
    }
}
