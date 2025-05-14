@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>

    <!-- Success message when item is added to cart -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display cart items -->
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>${{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Cart Total and Checkout Button -->
        <div class="d-flex justify-content-between">
            <h4>Total: ${{ number_format(array_sum(array_column(session('cart'), 'price')), 2) }}</h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
