@extends('layouts.app')

@section('title', ($search ? 'Search: ' . $search : ($selectedCategory?->name ?? 'Shop')) . ' | MyStore')

@section('content')
<section class="store-page-hero">
    <div class="container">
        <p class="signature-label">MyStore / {{ $search ? 'Search results' : ($selectedCategory ? $selectedCategory->name . ' collection' : 'The complete edit') }}</p>
        <h1>
            @if($search)
                Found for <em>you.</em>
            @else
                {{ $selectedCategory ? $selectedCategory->name : 'Shop the' }} <em>edit.</em>
            @endif
        </h1>
        <p>{{ $search ? 'Showing considered pieces that match “' . $search . '”.' : 'Discover a carefully selected collection of useful, beautiful things for everyday living.' }}</p>
    </div>
</section>

<section class="store-catalogue">
    <div class="container">
        <div class="store-catalogue__top"><p>{{ $products->total() }} {{ \Illuminate\Support\Str::plural('piece', $products->total()) }} {{ $search ? 'found' : 'in the collection' }}</p><a href="{{ route('collections') }}" class="signature-arrow-link">Browse collections <span>→</span></a></div>
        <div class="catalogue-layout">
            <aside class="catalogue-filter" data-filter-panel>
                <div class="catalogue-filter__head"><span>Refine your edit</span><button type="button" data-filter-close aria-label="Close filters">×</button></div>
                <form action="{{ route('products.index') }}" method="GET">
                    @if($search)<input type="hidden" name="q" value="{{ $search }}">@endif
                    <label class="catalogue-filter__label">Collection<select name="category"><option value="">All collections</option>@foreach($categories as $filterCategory)<option value="{{ $filterCategory->id }}" @selected((int) $category === $filterCategory->id)>{{ $filterCategory->name }}</option>@endforeach</select></label>
                    <fieldset><legend>Price range</legend><div class="catalogue-price-inputs"><label>From<input type="number" name="min_price" min="0" placeholder="₹ 0" value="{{ $minPrice }}"></label><label>To<input type="number" name="max_price" min="0" placeholder="Any" value="{{ $maxPrice }}"></label></div></fieldset>
                    <label class="catalogue-filter__label">Sort by<select name="sort"><option value="newest" @selected($sort === 'newest')>Newest arrivals</option><option value="price_asc" @selected($sort === 'price_asc')>Price: low to high</option><option value="price_desc" @selected($sort === 'price_desc')>Price: high to low</option><option value="name" @selected($sort === 'name')>Name: A–Z</option></select></label>
                    <div class="catalogue-filter__actions"><a href="{{ route('products.index') }}">Clear</a><button type="submit">Apply filters <span>→</span></button></div>
                </form>
            </aside>
            <div class="catalogue-products"><div class="catalogue-mobile-bar"><button type="button" data-filter-open>Filters <span>☷</span></button><span>{{ $products->total() }} pieces</span></div>
        @if($products->count())
            <div class="signature-product-grid signature-product-grid--catalogue">
                @foreach($products as $product)
                    <article class="signature-product">
                        <a class="signature-product__image" href="{{ route('products.show', $product->slug) }}"><img src="{{ $product->image ?: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=85' }}" alt="{{ $product->name }}" loading="lazy">@if($product->discount_badge)<span class="signature-sale">{{ $product->discount_badge }}</span>@endif<span class="signature-product__quick">View piece ↗</span></a>
                        <div class="signature-product__details"><p>{{ $product->category?->name ?? 'The MyStore edit' }}</p><div><h3>{{ $product->name }}</h3><strong>₹{{ number_format($product->sale_price ?: $product->price, 2) }}</strong></div>@auth<form action="{{ route('cart.add', $product) }}" method="POST">@csrf<button class="product-add-button" type="submit" {{ $product->stock < 1 ? 'disabled' : '' }}>{{ $product->stock < 1 ? 'Sold out' : 'Add to cart' }} <span>+</span></button></form>@else<a href="{{ route('login') }}" class="product-add-button">Add to cart <span>+</span></a>@endauth</div>
                    </article>
                @endforeach
            </div>
            <div class="store-pagination">{{ $products->links() }}</div>
        @else
            <div class="store-empty"><p class="signature-label">No pieces found</p><h2>Try a different <em>search.</em></h2><p>Search by product name or collection, or explore the full MyStore edit.</p><a class="signature-button" href="{{ route('products.index') }}">View all products <span>→</span></a></div>
        @endif
            </div>
        </div>
    </div>
</section>
@endsection
