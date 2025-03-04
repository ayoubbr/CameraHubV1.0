<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $client = auth()->user();
        $orders = Order::all();
        return view('orders.index', compact('client', 'orders'));
    }
}
