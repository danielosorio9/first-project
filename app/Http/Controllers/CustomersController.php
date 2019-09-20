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
        //This empty model resolvers issue of Ep. 17 when a customer is not set
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        //short way
       Customer::create($this->validateRequest());

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

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('/customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
