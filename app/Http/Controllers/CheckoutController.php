<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Cart is empty!');
        }

        $subtotal = $cartItems->sum(fn($item) => $item->product->current_price * $item->quantity);
        $shipping = 10;
        $total = $subtotal + $shipping;

        $couponCode = session('cart_coupon');
        return view('checkout.index', compact('cartItems', 'subtotal', 'shipping', 'total', 'couponCode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'phone'   => 'required|string',
            'address' => 'required|string',
            'city'    => 'required|string',
            'state'   => 'required|string',
            'zip'     => 'required|string|max:20',
            'coupon'  => 'nullable|string|max:50',
        ]);

        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();

        if ($cartItems->contains(fn ($item) => !$item->product || !$item->product->is_active || $item->quantity > $item->product->stock)) {
            throw ValidationException::withMessages(['cart' => 'One or more items are no longer available in the requested quantity.']);
        }
        $subtotal = $cartItems->sum(fn($item) => $item->product->current_price * $item->quantity);
        $coupon = ($request->filled('coupon') || session('cart_coupon')) ? Coupon::where('code', strtoupper(trim($request->input('coupon', session('cart_coupon')))))->first() : null;
        if ($coupon && !$coupon->validFor($subtotal)) throw ValidationException::withMessages(['coupon' => 'This coupon is invalid, expired, or does not meet the minimum order.']);
        $discount = $coupon ? $coupon->discountFor($subtotal) : 0;
        $shipping = 10;
        $total = max(0, $subtotal - $discount + $shipping);

        $order = DB::transaction(function () use ($request, $cartItems, $subtotal, $shipping, $total, $discount, $coupon) {
        $order = Order::create([
            'user_id'  => auth()->id(),
            'number' => 'MS-' . now()->format('ymd') . '-' . strtoupper(str()->random(6)),
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'city'     => $request->city,
            'state'    => $request->state,
            'zip'      => $request->zip,
            'subtotal' => $subtotal,
            'coupon_code' => $coupon?->code,
            'discount' => $discount,
            'shipping' => $shipping,
            'total'    => $total,
        ]);

        foreach ($cartItems as $item) {
            $product = $item->product->fresh();
            if ($item->quantity > $product->stock) throw ValidationException::withMessages(['cart' => $product->name . ' has insufficient stock.']);
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $product->current_price,
                'original_price' => $product->price,
            ]);
            $product->decrement('stock', $item->quantity);
        }
        if ($coupon) $coupon->increment('uses');

        CartItem::where('user_id', auth()->id())->delete();
        session()->forget('cart_coupon');
        return $order;
        });

        return redirect('/orders/'.$order->id)->with('success', 'Order placed successfully!');
    }
}
