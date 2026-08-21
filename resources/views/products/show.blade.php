@extends('layouts.app')

@section('title', $product->name . ' | MyStore')

@section('content')
<section class="product-detail">
    <div class="container">
        <div class="product-detail__breadcrumb">
            <a href="{{ route('products.index') }}">Shop</a>
            <span>/</span>
            <a href="{{ route('products.category', $product->category?->slug) }}">{{ $product->category?->name ?? 'Collection' }}</a>
            <span>/</span>
            {{ $product->name }}
        </div>

        @php($gallery = $product->gallery ?: ['https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=1400&q=90'])

        <div class="product-detail__grid">
            <div class="product-detail__media product-gallery" data-product-gallery>
                <span class="product-detail__tag">{{ $product->category?->name ?? 'MyStore edit' }}</span>
                <img class="product-gallery__main" data-gallery-main src="{{ $gallery[0] }}" alt="{{ $product->name }}">

                @if(count($gallery) > 1)
                    <div class="product-gallery__thumbs">
                        @foreach($gallery as $index => $image)
                            <button type="button" class="{{ $index === 0 ? 'is-active' : '' }}" data-gallery-thumb data-image="{{ $image }}" aria-label="View image {{ $index + 1 }}">
                                <img src="{{ $image }}" alt="{{ $product->name }} image {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="product-detail__info">
                <p class="signature-label">The considered edit</p>
                <h1>{{ $product->name }}</h1>

                <div class="product-detail__meta">
                    <div class="product-detail__price">
                        ₹{{ number_format($product->sale_price ?: $product->price, 2) }}
                        @if($product->sale_price)
                            <del>₹{{ number_format($product->price, 2) }}</del>
                        @endif
                    </div>
                    @if($product->discount_badge)
                        <span class="product-detail__badge">{{ $product->discount_badge }}</span>
                    @endif
                </div>

                <p class="product-detail__description">{{ $product->description }}</p>

                <div class="product-detail__stock">
                    <span class="{{ $product->stock > 0 ? 'is-available' : '' }}"></span>
                    {{ $product->stock > 0 ? 'In stock and ready to dispatch' : 'Currently unavailable' }}
                </div>

                @auth
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button class="product-detail__add" {{ $product->stock < 1 ? 'disabled' : '' }}>
                            {{ $product->stock > 0 ? 'Add to cart' : 'Sold out' }}
                            <span>→</span>
                        </button>
                    </form>
                @else
                    <a class="product-detail__add" href="{{ route('login') }}">
                        Sign in to add to cart
                        <span>→</span>
                    </a>
                @endauth

                <div class="product-detail__assurance">
                    <span>Secure payment</span>
                    <span>Easy returns</span>
                    <span>Carefully packed</span>
                </div>

                <div class="product-detail__highlights">
                    <article>
                        <strong>4.9</strong>
                        <span>Average rating</span>
                    </article>
                    <article>
                        <strong>48h</strong>
                        <span>Dispatch time</span>
                    </article>
                    <article>
                        <strong>2 yrs</strong>
                        <span>Warranty cover</span>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-detail__promise">
    <div class="container">
        <p class="signature-label">Made for real life</p>
        <h2>Objects chosen for their<br><em>lasting presence.</em></h2>
    </div>
</section>

<section class="product-detail__specs">
    <div class="container product-detail__specs-grid">
        <div>
            <p class="signature-label">Material story</p>
            <h3>Designed to feel as good as it looks.</h3>
        </div>
        <div>
            <ul>
                <li>Solid construction with premium-grade finishes</li>
                <li>Low-maintenance, durable materials selected for daily living</li>
                <li>Thoughtful design details that bring warmth and balance to modern interiors</li>
            </ul>
        </div>
    </div>
</section>

<x-store-discovery-sections />
@endsection
