@extends('layouts.app')

@section('title', 'Product Details')

@section('contents')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Product Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Detailed information about the product.
            </p>
        </div>
        <div>
            <dl class="sm:divide-y sm:divide-gray-200">
                <!-- Product Identification Group -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Product Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $product->name }}
                        </dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            Description
                        </dt>
                        <dd class="text-sm text-gray-900">
                            {{ $product->description }}
                        </dd>
                    </div>
                </div>
                <!-- Financial and Status Group -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Price
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            ${{ number_format($product->price, 2) }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ ucfirst($product->status) }}
                        </dd>
                    </div>
                </div>
                <!-- Visual Representation Group -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 sm:col-span-3">
                        Image
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-3">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="max-w-xs rounded-lg shadow-sm">
                    </dd>
                </div>
                <!-- Category and Brand Group -->
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Category
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $category ? $category->name : 'No Category Assigned' }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Brand
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $brand ? $brand->name : 'No Brand Assigned' }}
                        </dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin/products') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Back to Products
        </a>
    </div>
</div>
@endsection
