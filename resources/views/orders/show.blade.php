<h1>Order details</h1>
{{-- @section('content') --}}
    {{-- <div class="order-details-container">
        <div class="order-header">
            <h1 class="order-title">Order #{{ $order->id }}</h1>
            <span class="order-status status-paid">Paid</span>
        </div>

        <div class="order-meta">
            <div class="meta-item">
                <div class="meta-label">Order Date</div>
                <div class="meta-value">{{ $order->created_at->format('M d, Y') }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Payment Method</div>
                <div class="meta-value">{{ $payment->payment_method }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Payment ID</div>
                <div class="meta-value">{{ $payment->id }}</div>
            </div>
            <div class="meta-item">
                <div class="meta-label">Email</div>
                <div class="meta-value">{{ $order->email }}</div>
            </div>
        </div>

        <div class="address-details">
            <div class="address-title">Shipping Address</div>
            <div class="address-content">
                {{ $order->shipping_name }}<br>
                {{ $order->shipping_address }}<br>
                {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}<br>
                {{ $order->shipping_country }}
            </div>
        </div>

        <h2 class="section-title">Order Items</h2>
        <div class="order-items">
            <table class="item-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($order->orderItems as $item)
                        <tr>
                            <td data-label="Product">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    @if ($item->product->image)
                                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}"
                                            class="item-image">
                                    @endif
                                    <span class="item-name">{{ $item->product->name }}</span>
                                </div>
                            </td>
                            <td data-label="Price">${{ number_format($item->price, 2) }}</td>
                            <td data-label="Quantity">{{ $item->quantity }}</td>
                            <td data-label="Total" class="item-price">
                                ${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach --}}
                {{-- </tbody>
            </table>
        </div>

        <div class="order-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span>${{ number_format($order->subtotal, 2) }}</span>
            </div>
            <div class="summary-row">
                <span>Shipping</span>
                <span>${{ number_format($order->shipping_cost, 2) }}</span>
            </div>
            @if ($order->tax > 0)
                <div class="summary-row">
                    <span>Tax</span>
                    <span>${{ number_format($order->tax, 2) }}</span>
                </div>
            @endif
            <div class="summary-row total">
                <span>Total</span>
                <span>${{ number_format($order->total, 2) }}</span>
            </div>
        </div>

        <div class="order-actions">
            <a href="/orders" class="btn btn-secondary">Back to Orders</a>
            <a href="/shop" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div> --}} 
{{-- @endsection --}}
