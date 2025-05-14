@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    @if(session('cart'))
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Pay with Stripe</button>
        </form>
    @else
        <p>Your cart is empty. Please add items to your cart.</p>
    @endif
</div>
@endsection
