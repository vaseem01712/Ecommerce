<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::where('id', $id)
                     ->where('user_id', auth()->id())
                     ->with('items.product')
                     ->firstOrFail();
        return view('orders.show', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
                      ->latest()
                      ->get();
        return view('orders.index', compact('orders'));
    }
}