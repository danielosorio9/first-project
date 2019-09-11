<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = [
            'John Doe',
            'Jane Doe',
            'Bob the Builder',
            'Another name',
        ];

        return view('internals.customers', [
            'customers' => $customers,
        ]);
    }
}
