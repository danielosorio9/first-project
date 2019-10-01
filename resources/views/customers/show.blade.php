@extends('layouts.app')

@section('title', 'Details for ' . $customer->name)

@section('content')
    <h1>Details for {{ $customer->name }}</h1>
    <div class="row">
            <div class="col-6">
                <p><a href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a></p>
            </div>
            <div class="col-6" align="left">
                <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{ $customer->name }}</p>
            <p><strong>Email</strong> {{ $customer->email }}</p>
            <p><strong>Company</strong> {{ $customer->company->name }}</p>
            <p><strong>Status</strong> {{ $customer->active }}</p>
        </div>
    </div>

    @if($customer->image)
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
@endsection
