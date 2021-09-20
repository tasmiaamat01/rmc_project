<?php

namespace App\Http\Controllers\Master;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies=Currency::get();
        return view('main.admin.master.currencylist',compact('currencies'));
    }

    public function create()
    {
        return view('main.admin.master.currencycreate');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Currency::create($request->all());
        return redirect(route('currency-create-route'))->with('messages','successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $currency = Currency::find($id);
        return view('main.admin.master.currencyedit',compact('currency'));
    }

    public function update(Request $request,$id)
    {
        $currency=Currency::findOrFail($id);
        $currency->update($request->all());
        return redirect(route('currency-list'))->withSuccess('messages');
    }

}
