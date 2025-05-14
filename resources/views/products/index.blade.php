@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Shop Products</h2>

    <!-- Display success messages (if any) -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    {{ $products->links() }}
</div>
@endsection
