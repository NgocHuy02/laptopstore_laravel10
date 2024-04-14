@extends('layouts.app')

@section('title', 'Product Manager')

@section('contents')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Product Manager</h1>
        <a href="{{ route('admin/products/create') }}" class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-md text-sm dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Add Product
        </a>
    </div>
    <hr class="my-4" />

    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-lg font-semibold">{{ \Illuminate\Support\Str::limit($product->name, 20) }}</h5>
                    <p class="text-sm text-gray-600 overflow-ellipsis overflow-hidden h-10">{{ $product->description }}</p>
                    <p class="text-sm text-gray-800">${{ number_format($product->price, 2) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('admin/products/showProductAdmin', $product->id) }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Details</a>
                        <a href="{{ route('admin/products/edit', $product->id) }}" class="text-sm bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('admin/products/destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection