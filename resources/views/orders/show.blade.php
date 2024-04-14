@extends('layouts.user')

@section('title', "Order Details")

@section('contents')
<div class="container mx-auto mt-4">
    <h2 class="text-2xl font-bold text-gray-800">Order Details for Order #{{ $order->id }}</h2>
    <div class="mt-4 bg-white shadow-md rounded-lg p-4">
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment }}</p>
    </div>

    <div class="mt-4 grid grid-cols-4 gap-4">
        @foreach($order->orderDetails as $detail)
        <div class="bg-white shadow-md rounded-lg p-4">
            <strong class="font-bold text-gray-800">{{ $detail->product->name ?? 'Product Deleted' }}</strong>
            - ${{ $detail->price }}
            <p>Quantity- {{ $detail->quantity }}</p>
            @if($detail->product)
            <div class="text-sm text-gray-700 mt-2">
                <p>Description: {{ $detail->product->description }}</p>
                @if($detail->product->image)
                <img src="{{$detail->product->image }}" alt="Product Image" class="w-24 h-auto mt-2">
                @endif
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <div class="text-right font-bold text-xl mt-4">
        Total: ${{ $order->orderDetails->sum(function($detail) { return $detail->price * $detail->quantity; }) }}
    </div>
</div>
@endsection