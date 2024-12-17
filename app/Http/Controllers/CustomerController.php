<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile',
            'code' => 'required|unique:customers,code',
        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->mobile = $request->input('mobile');
        $customer->code = $request->input('code');
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function show($id)
    {
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'code' => 'required',
        ]);
        $customer->name = $request->input('name');
        $customer->mobile = $request->input('mobile');
        $customer->code = $request->input('code');
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
