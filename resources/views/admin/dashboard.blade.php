@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3">
                <h4>Total Products</h4>
                <p>{{ $totalProducts }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Total Orders</h4>
                <p>{{ $totalOrders }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h4>Total Revenue</h4>
                <p>${{ number_format($totalRevenue, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Orders Per Customer</h4>
        </div>
        <div class="card-body">
            @if($customers->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Order Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->orders_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No customers with orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
