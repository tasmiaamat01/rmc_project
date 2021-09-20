<?php

namespace App\Http\Controllers\Master;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return view('main.admin.master.countrylist',compact('countries'));
    }

    public function create()
    {
        return view('main.admin.master.countrycreate');
    }

    public function store(CountryRequest $request)
    {
        // dd($request->all());
        Country::create($request->all());
        return redirect(route('country-create-route'))->with('messages','successfully');
    }

    public function edit($id)
    {
        $country  = Country::find($id);
        return view('main.admin.master.countryedit',compact('country'));
    }

    public function update(CountryRequest $request,$id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());
        return redirect(route('country-list'))->with('messages','successfully');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete($id);
        return redirect(route('country-list'))->with('messages','successfully');
    }
}
