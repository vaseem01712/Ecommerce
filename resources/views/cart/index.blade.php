@extends('layouts.app')

@section('title', 'Your cart | MyStore')

@section('content')
<section class="store-page-hero store-page-hero--compact"><div class="container"><p class="signature-label">MyStore / Your selection</p><h1>Your <em>cart.</em></h1><p>Every good choice, gathered in one place.</p></div></section>
<section class="cart-page"><div class="container">
@if($cartItems->isEmpty())
    <div class="store-empty"><p class="signature-label">Your cart is empty</p><h2>Make room for<br><em>something good.</em></h2><p>Explore the MyStore edit and discover a piece that belongs in your everyday.</p><a class="signature-button" href="{{ route('products.index') }}">Explore products <span>→</span></a></div>
@else
    <form action="{{ route('cart.coupon') }}" method="POST" class="cart-coupon-form">@csrf<label for="cart-coupon">Coupon code</label><div><input id="cart-coupon" name="coupon" placeholder="SAVE10" value="{{ session('cart_coupon') }}"><button type="submit">Apply</button></div></form>
    <div class="cart-page__grid"><div class="cart-list">@foreach($cartItems as $item)<article class="cart-item"><img src="{{ $item->product->image ?: 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=300&q=85' }}" alt="{{ $item->product->name }}"><div class="cart-item__main"><p>{{ $item->product->category?->name ?? 'MyStore edit' }}</p><h2>{{ $item->product->name }}</h2><strong>₹{{ number_format($item->product->sale_price ?: $item->product->price, 2) }}</strong></div><div class="cart-item__actions"><form action="{{ route('cart.update', $item->id) }}" method="POST">@csrf @method('PATCH')<label>Quantity <input name="quantity" type="number" min="1" value="{{ $item->quantity }}" onchange="this.form.submit()"></label></form><form action="{{ route('cart.remove', $item->id) }}" method="POST">@csrf @method('DELETE')<button type="submit">Remove</button></form></div></article>@endforeach</div><aside class="cart-summary"><p class="signature-label">Order summary</p><h2>Ready when<br>you <em>are.</em></h2><div><p><span>Subtotal</span><strong>₹{{ number_format($total, 2) }}</strong></p>@if($discount > 0)<p><span>Discount ({{ $coupon->code }})</span><strong>-₹{{ number_format($discount, 2) }}</strong></p>@endif<p><span>Delivery</span><span>Calculated at checkout</span></p><p class="cart-summary__total"><span>Total</span><strong>₹{{ number_format($grandTotal, 2) }}</strong></p></div><a href="{{ route('checkout.index') }}" class="product-detail__add">Secure checkout <span>→</span></a><small>Taxes and delivery are calculated at checkout.</small></aside></div>
@endif
</div></section>
<x-store-discovery-sections />
@endsection

