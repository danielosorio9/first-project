<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('internals.customers', [
            'customers' => $customers,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3'
        ]);

        //Long form
        $customer = new Customer();
        $customer->name = request('name');
        $customer->save();

        return back();
    }
}
