<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function processPayment(Request $request, $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);

            $total = $order->orderItems->sum(function ($item) {
                return $item->quantity * $item->priceInTime;
            });

            // dd($total);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'unit_amount' => $total * 100,
                            'product_data' => [
                                'name' => "Order #" . $order->id,
                            ],
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['orderId' => $order->id]),
                'cancel_url' => route('payment.cancel', ['orderId' => $order->id]),
            ]);


            Payment::create([
                'order_id' => $order->id,
                'amount' => $total,
                'currency' => 'usd',
                'payment_status' => 'pending',
            ]);

            return redirect($session->url);
        } catch (Exception $e) {
            Log::error('Stripe Payment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment processing failed: ' . $e->getMessage());
        }
    }

    public function paymentSuccess($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $payment = Payment::where('order_id', $orderId)->first();

            if ($payment) {
                $payment->update([
                    'payment_status' => 'succeeded',
                    'payment_details' => 'Payment completed successfully'
                ]);

                $order->update(['status' => 'paid']);
                $cart_count = 0;
                return view('payments.success', compact('order', 'payment', 'cart_count'));
            }

            return redirect()->route('home')->with('error', 'Payment record not found');
        } catch (\Exception $e) {
            Log::error('Payment Success Error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'An error occurred during payment processing');
        }
    }

    public function paymentCancel($orderId)
    {
        $order = Order::findOrFail($orderId);
        $payment = Payment::where('order_id', $orderId)->first();

        if ($payment) {
            $payment->update([
                'payment_status' => 'cancelled',
                'payment_details' => 'Payment was cancelled by user'
            ]);
        }

        return view('payments.cancel', compact('order'));
    }

    public function show() {}
}
