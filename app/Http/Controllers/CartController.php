<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
                            ->with('product')
                            ->get();
        $total = $cartItems->sum(fn($item) => $item->product->current_price * $item->quantity);

        $discount = 0;
        $coupon = null;
        if (session('cart_coupon')) {
            $coupon = Coupon::where('code', session('cart_coupon'))->first();
            if ($coupon && $coupon->validFor($total)) {
                $discount = $coupon->discountFor($total);
            } else {
                session()->forget('cart_coupon');
                $coupon = null;
            }
        }
        $grandTotal = $total - $discount;

        return view('cart.index', compact('cartItems', 'total', 'discount', 'coupon', 'grandTotal'));
    }
    public function add(Request $request, Product $product)
    {
        $cartItem = CartItem::where('user_id', auth()->id())
                           ->where('product_id', $product->id)
                           ->first();
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        CartItem::where('id', $id)
               ->where('user_id', auth()->id())
               ->update(['quantity' => $request->quantity]);
        return back()->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        CartItem::where('id', $id)
               ->where('user_id', auth()->id())
               ->delete();
        return back()->with('success', 'Item removed!');
    }

    public function coupon(Request $request)
    {
        $request->validate(['coupon' => 'required|string|max:50']);
        $coupon = Coupon::where('code', strtoupper(trim($request->coupon)))->first();
        $subtotal = CartItem::where('user_id', auth()->id())->with('product')->get()->sum(fn ($item) => $item->product->current_price * $item->quantity);
        if (!$coupon || !$coupon->validFor($subtotal)) return back()->with('error', 'Coupon is invalid or not available for this cart.');
        session(['cart_coupon' => $coupon->code]);
        return back()->with('success', 'Coupon ' . $coupon->code . ' applied. It will be calculated at checkout.');
    }
}
