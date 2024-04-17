@extends('layouts.user')

@section('title', 'Cart')

@section('contents')
<div class="container mt-4">
    <h2>Cart</h2>
    @if(session('cart'))
    <form id="place-order-form" action="{{ route('placeOrder') }}" method="POST" >
        @csrf
        <ul class="list-group" id="cart-items">
            @foreach(session('cart') as $id => $details)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $id }}">
                <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive" />
                <strong>{{ $details['name'] }}</strong> ${{ $details['price'] }}
                <div>
                    <input type="number" name="items[{{ $id }}][quantity]" value="{{ $details['quantity'] }}" min="1" class="update-cart form-control" style="width: 60px;">
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Remove</button>
            </li>
            @endforeach
            <li class="list-group-item">
                <strong>Total:</strong> ${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart'))) }}
            </li>
        </ul>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">Payment Method</label>
            <select class="form-control" id="payment" name="payment">
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
    @else
    <div class="alert alert-warning">Your cart is empty</div>
    @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#place-order-form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    alert("Order placed successfully!");
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    alert("Failed to place order. Please try again later.");
                }
            });
        });
        $('.update-cart').on('change', function() {
            var ele = $(this);
            $.ajax({
                url: '{{ route("updateCart") }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("li").attr("data-id"),
                    quantity: ele.val(),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $('.remove-from-cart').click(function() {
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route("removeFromCart") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
