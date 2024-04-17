@extends('layouts.user')

@section('title', 'Cart')

@section('contents')
<div class="container mt-4">
    <h2>Cart</h2>
    @if(session('cart'))
    <form id="place-order-form" action="{{ route('placeOrder') }}" method="POST">
        @csrf
        <div class="row">
            @foreach(session('cart') as $id => $details)
            <div class="col-md-4 mb-3">
                <div class="card" data-id="{{ $id }}">
                    <img src="{{ $details['image'] }}" class="card-img-top" alt="{{ $details['name'] }}" style="height: 100px; width: auto; display: block; margin: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{ substr($details['name'], 0, 50) }}{{ strlen($details['name']) > 50 ? '...' : '' }}</h5>
                        <p class="card-text">${{ $details['price'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary decrease-quantity">-</button>
                                <input type="text" class="form-control text-center quantity" value="{{ $details['quantity'] }}" style="width: 50px;">
                                <button type="button" class="btn btn-sm btn-outline-secondary increase-quantity">+</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-danger remove-from-cart">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total</h5>
                        <p class="card-text"><strong>Total:</strong> <span id="total-price">$0.00</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="091-234-5678" >
                </div>
                <div class="form-group">
                    <label for="payment" class="form-label">Payment Method</label>
                    <select class="form-control" id="payment" name="payment">
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-right">Place Order</button>
            </div>
        </div>
    </form>
    @else
    <div class="alert alert-warning">Your cart is empty</div>
    @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    function updateTotal() {
        var total = 0;
        $('.card').each(function() {
            var price = parseFloat($(this).find('.card-text').text().substring(1));
            var quantity = parseInt($(this).find('.quantity').val());
            if (!isNaN(price) && !isNaN(quantity)) {
                total += price * quantity;
            }
        });
        $('#total-price').text('$' + total.toFixed(2));
    }

    // Initial total update
    updateTotal();

    // Function to handle quantity update
    function handleQuantityUpdate(quantityInput, increment) {
        var card = quantityInput.closest('.card');
        var id = card.data('id');
        var quantity = parseInt(quantityInput.val());
        var newQuantity = quantity + increment;

        if (newQuantity > 0) {
            quantityInput.val(newQuantity);
            updateTotal();
            // AJAX call to update the session cart
            $.ajax({
                url: '{{ route("updateCart") }}',
                method: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: newQuantity
                },
                success: function(response) {
                    console.log('Cart updated successfully');
                },
                error: function(err) {
                    console.log('Error updating cart', err);
                }
            });
        }
    }

    $('.increase-quantity').click(function() {
        handleQuantityUpdate($(this).closest('.btn-group').find('.quantity'), 1);
    });

    $('.decrease-quantity').click(function() {
        handleQuantityUpdate($(this).closest('.btn-group').find('.quantity'), -1);
    });

    $('.remove-from-cart').click(function() {
        var card = $(this).closest('.card');
        var id = card.data('id');
        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route("removeFromCart") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                success: function(response) {
                    card.remove();
                    updateTotal();
                }
            });
        }
    });
});
</script>

@endsection
