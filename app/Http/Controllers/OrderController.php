<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Payout;

class OrderController extends Controller
{
    public function all()
    {
        $client = auth()->user();
        $orders = Order::all();
        return view('orders.index', compact('client', 'orders'));
    }

    public function store(Request $request)
    {

        $cart = session()->get('cart', []);


        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        try {
            DB::beginTransaction();

            $address = Address::create([
                'country' => $request->country,
                'region' => $request->region,
                'city' => $request->city,
                'street' => $request->street,
                'neighborhood' => $request->neighborhood,
                'zip' => $request->zip,
                'client_id' => auth()->id(),
            ]);

            $order = Order::create([
                'client_id' => auth()->id(),
                'address_id' => $address->id,
                'status' => 'pending'
            ]);


            foreach ($cart as $productId => $item) {
                $product = Product::findOrFail($productId);


                if ($item['quantity'] > $product->stock) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "Insufficient stock for {$product->name}");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'priceInTime' => $item['price']
                ]);

                $product->decrement('stock', $item['quantity']);
            }
            session()->forget('cart');

            DB::commit();

            return redirect()->route('payment.process', $order->id)
                ->with('message', 'Order placed successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }
    // public function paiement($orderId) {
    //     dd($orderId);
    // }

    public function show($orderId)
    {
        $order = Order::with('orderItems.product', 'address', 'user')
            ->findOrFail($orderId);
        $payment = Payment::where('order_id', $orderId)->first();

        return view('orders.show', compact('order', 'payment'));
    }

    public function index()
    {
        $orders = Order::where('client_id', auth()->id())
            ->with('orderItems')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }



    public function updateStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($orderId);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('message', 'Order status updated successfully');
    }
}
