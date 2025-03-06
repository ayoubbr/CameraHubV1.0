{{-- @extends('layouts.app')

@section('content') --}}
<div class="payment-container">
    <div class="payment-cancel-card">
        <div class="cancel-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <h2>Payment Cancelled</h2>
        <p>You have cancelled the payment for Order #{{ $order->id }}</p>
        <div class="actions">
            <a href="{{ route('cart') }}" class="btn btn-primary">Return to Cart</a>
            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary">View Order Details</a>
        </div>
    </div>
</div>
{{-- @endsection --}}