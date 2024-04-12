@extends('layouts.user')
 
@section('title', 'Product Brand')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Brand</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
                {{ $product->name }}
            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Image</label>
            <div class="mt-2">
                {{ $product->image }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection