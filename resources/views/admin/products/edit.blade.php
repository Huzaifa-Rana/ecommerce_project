@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product: {{ $product->name }}</h2>
    
    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product edit form -->
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.products.form') <!-- Include shared form partial -->
    </form>
</div>
@endsection
