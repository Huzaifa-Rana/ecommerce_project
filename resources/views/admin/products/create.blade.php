@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Product</h2>
    
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

    <!-- Product creation form -->
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        @include('admin.products.form') <!-- Include shared form partial -->
    </form>
</div>
@endsection
