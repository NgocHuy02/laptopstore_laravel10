@extends('layouts.app')

@section('title', 'Show Category')

@section('contents')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Category Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Detailed information about the category.
            </p>
        </div>
        <div>
            <dl class="sm:divide-y sm:divide-gray-200">
                <!-- Category Information Group -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 sm:col-span-1">
                        Category Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                        {{ $category->name }}
                    </dd>
                </div>
                <!-- Visual Representation Group -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 sm:col-span-1">
                        Category Description
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                        {{ $category->description }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin/categories') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Back to categories
        </a>
    </div>
</div>
@endsection