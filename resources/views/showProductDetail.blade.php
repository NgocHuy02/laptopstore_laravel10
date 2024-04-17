@extends('layouts.user')

@section('title', 'Product Details')

@section('contents')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Product Details</h1>
    <hr class="mb-6" />

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img src="{{ $product->image }}" alt="Product Image" class="w-full h-48 object-cover md:w-48">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $product->name }}</div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black">{{ $product->description }}</p>
                <p class="mt-2 text-gray-500">{{ $product->price}}$</p>

                <div class="mt-4">
                    <a href="javascript:void(0)" onclick="document.getElementById('add-to-cart-form-{{ $product->id }}').submit(); addToCartSuccess();" class="btn btn-success">Add To Cart</a>
                    <form id="add-to-cart-form-{{ $product->id }}" action="{{ route('addToCart', $product->id) }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                    <a href="{{ url()->previous() }}" class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded ml-2">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addToCartSuccess() {
        alert('Product added to cart successfully!');
    }
</script>
@endsection