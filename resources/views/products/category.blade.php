@extends('layouts.app')

@section('title', $category->name . ' | MyStore')

@section('content')
<section class="store-page-hero store-page-hero--category">
    <div class="container">
        <p class="signature-label">Collection / {{ $category->name }}</p>
        <h1>{{ $category->name }} <em>edit.</em></h1>
        <p>{{ $category->description ?: 'A considered edit from the MyStore collection.' }}</p>
    </div>
</section>

<section class="store-catalogue">
    <div class="container">
        <div class="store-catalogue__top"><p>{{ $products->total() }} {{ \Illuminate\Support\Str::plural('piece', $products->total()) }} in this collection</p><a href="{{ route('collections') }}" class="signature-arrow-link">All collections <span>→</span></a></div>
        @if($products->count())
            <div class="signature-product-grid signature-product-grid--catalogue">
                @foreach($products as $product)
                    <article class="signature-product"><a class="signature-product__image" href="{{ route('products.show', $product->slug) }}"><img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=900&q=85' }}" alt="{{ $product->name }}" loading="lazy">@if($product->sale_price)<span class="signature-sale">Sale</span>@endif<span class="signature-product__quick">View piece ↗</span></a><div class="signature-product__details"><p>{{ $category->name }}</p><div><h3>{{ $product->name }}</h3><strong>₹{{ number_format($product->sale_price ?: $product->price, 2) }}</strong></div>@auth<form action="{{ route('cart.add', $product) }}" method="POST">@csrf<button class="product-add-button" type="submit" {{ $product->stock < 1 ? 'disabled' : '' }}>{{ $product->stock < 1 ? 'Sold out' : 'Add to cart' }} <span>+</span></button></form>@else<a href="{{ route('login') }}" class="product-add-button">Add to cart <span>+</span></a>@endauth</div></article>
                @endforeach
            </div>
            <div class="store-pagination">{{ $products->links() }}</div>
        @else
            <div class="store-empty"><p class="signature-label">No pieces right now</p><h2>This edit is<br><em>being refreshed.</em></h2><p>Explore another collection or return soon for new arrivals.</p><a class="signature-button" href="{{ route('collections') }}">View collections <span>→</span></a></div>
        @endif
    </div>
</section>
@endsection
