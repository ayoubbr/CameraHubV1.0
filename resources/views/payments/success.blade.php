<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Payment Success Page Styling */
        .payment-success-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            color: #4CAF50;
            font-size: 64px;
            margin-bottom: 20px;
        }

        .success-title {
            font-size: 28px;
            font-weight: 700;
            color: #333333;
            margin-bottom: 25px;
        }

        .order-details {
            background-color: #f9f9f9;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: left;
        }

        .order-details p {
            margin: 10px 0;
            font-size: 16px;
            color: #555555;
            line-height: 1.5;
        }

        .order-details strong {
            font-weight: 600;
            color: #333333;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3e9142;
        }

        .btn-secondary {
            background-color: #ffffff;
            color: #4CAF50;
            border: 2px solid #4CAF50;
        }

        .btn-secondary:hover {
            background-color: #f0f8f0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .payment-success-container {
                margin: 20px;
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="payment-success-container">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i> <!-- Requires Font Awesome -->
        </div>
        
        <h1 class="success-title">Payment Successful!</h1>
        
        <div class="order-details">
            <p><strong>Order Number:</strong> {{ $order->id }}</p>
            <p><strong>Total Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
            <p><strong>Payment Date:</strong> {{ $payment->created_at->format('M d, Y H:i') }}</p>
        </div>
        
        <div class="action-buttons">
            <a href="/orders/{{ $order->id }}" class="btn btn-primary">View Order Details</a>
            <a href="{{route('products.all')}}" class="btn btn-secondary">Continue Shopping</a>
        </div>
    </div>
    {{-- @include('components.footer') --}}
</body>

</html>
