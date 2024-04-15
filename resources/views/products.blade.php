@extends('layouts.user')

@section('title', 'Products')

@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            <strong>PRODUCTS US</strong>
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="container py-6">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <!-- Display image from a Google link or similar -->
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; width: 100%; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 200, '...') }}</p>
                        <p class="text-muted">${{ number_format($product->price, 2) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('showProductDetail', $product->id) }}" class="btn btn-primary">View Product</a>
                            <a href="javascript:void(0)" onclick="document.getElementById('add-to-cart-form-{{ $product->id }}').submit();" class="btn btn-success">Add To Cart</a>
                            <form id="add-to-cart-form-{{ $product->id }}" action="{{ route('addToCart', $product->id) }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>


@endsection