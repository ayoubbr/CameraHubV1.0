<div class="client-orders-container">
    <div class="page-header">
        <h1 class="page-title">Client Orders</h1>
        <div class="client-info">
            <h2 class="client-name">{{ $client->name }}</h2>
            <p class="client-details">ID: {{ $client->id }} | Email: {{ $client->email }}</p>
        </div>
    </div>

    <div class="orders-filter">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search orders...">
            <button class="search-btn">Search</button>
        </div>
        <div class="filter-options">
            <select class="filter-select">
                <option value="">Filter by Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <select class="filter-select">
                <option value="">Sort By</option>
                <option value="date_desc">Date (Newest First)</option>
                <option value="date_asc">Date (Oldest First)</option>
                <option value="total_desc">Amount (Highest First)</option>
                <option value="total_asc">Amount (Lowest First)</option>
            </select>
        </div>
    </div>

    <div class="orders-list-container">
        @if($orders->count() > 0)
            <table class="orders-table">
                <thead>
                    <tr>
                        <th class="order-header">Order ID</th>
                        <th class="order-header">Date</th>
                        <th class="order-header">Items</th>
                        <th class="order-header">Total</th>
                        <th class="order-header">Status</th>
                        <th class="order-header">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="order-row">
                            <td class="order-cell">#{{ $order->id }}</td>
                            <td class="order-cell">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="order-cell">{{ $order->items_count }}</td>
                            <td class="order-cell order-total">${{ number_format($order->total, 2) }}</td>
                            <td class="order-cell">
                                <span class="order-status order-status-{{ strtolower($order->status) }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="order-cell action-cell">
                                {{-- <a href="{{ route('admin.orders.show', $order->id) }}" class="action-btn view-btn">View</a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="action-btn edit-btn">Edit</a>
                                <button type="button" class="action-btn delete-btn" 
                                    data-order-id="{{ $order->id }}" 
                                    data-toggle="modal" 
                                    data-target="#deleteOrderModal">
                                    Delete
                                </button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-container">
                {{-- {{ $orders->links() }} --}}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">📋</div>
                <h3 class="empty-state-title">No Orders Found</h3>
                <p class="empty-state-message">This client hasn't placed any orders yet.</p>
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOrderModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this order? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteOrderForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Setup delete order modal functionality
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteOrderForm = document.getElementById('deleteOrderForm');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                deleteOrderForm.action = `/admin/orders/${orderId}`;
            });
        });
    });
</script>