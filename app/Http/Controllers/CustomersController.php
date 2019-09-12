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
}
