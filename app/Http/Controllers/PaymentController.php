<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function checkout($orderId)
    {
        $order = Order::where('id', $orderId)
                     ->where('user_id', auth()->id())
                     ->firstOrFail();

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Order #' . $order->id,
                    ],
                    'unit_amount' => $order->total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/payment/success/' . $order->id),
            'cancel_url'  => url('/payment/cancel/' . $order->id),
        ]);

        return redirect($session->url);
    }

    public function success($orderId)
    {
        $order = Order::where('id', $orderId)
                     ->where('user_id', auth()->id())
                     ->firstOrFail();

        $order->update([
            'payment_status' => 'paid',
            'status' => 'processing',
        ]);

        return view('payment.success', compact('order'));
    }

    public function cancel($orderId)
    {
        $order = Order::where('id', $orderId)
                     ->where('user_id', auth()->id())
                     ->firstOrFail();

        return view('payment.cancel', compact('order'));
    }
}