<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('customers.create', compact('companies'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);

        //short way
       Customer::create($data);

//     //Long way
//     $customer = new Customer();
//     $customer->name = request('name');
//     $customer->email = request('email');
//     $customer->active = request('active');
//     $customer->save();

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        //$customer = Customer::where('id', $customer)->firstOrFail(); #It's not even needed because of route model binding

        return view('customers.show', compact('customer'));
    }
}
