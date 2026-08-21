@extends('layouts.app')

@section('title', $title . ' | MyStore')

@section('content')
<section class="editorial-page-hero editorial-page-hero--{{ $page }}">
    <div class="container">
        <p class="signature-label">MyStore / {{ $eyebrow }}</p>
        <h1>{{ $title }}</h1>
        <p>{{ $intro }}</p>
        <span class="editorial-page-hero__index">0{{ array_search($page, ['about','collections','contact','faq','shipping','returns','privacy','terms','careers','blog','gallery','team','portfolio']) + 1 }}</span>
    </div>
</section>

<section class="editorial-page-content">
    <div class="container">
        @if($page === 'contact')
            <div class="editorial-contact-grid">
                <div class="editorial-contact-copy"><p class="signature-label">Start a conversation</p><h2>Tell us how<br>we can <em>help.</em></h2><p>For product advice, order questions or a little help choosing, our team is ready to make it simple.</p><div class="editorial-contact-details"><span>Customer care</span><a href="mailto:hello@mystore.com">hello@mystore.com</a><span>Monday to Friday / 9am - 6pm</span></div></div>
                <form class="editorial-form"><label>Name<input placeholder="Your full name"></label><label>Email<input type="email" placeholder="you@example.com"></label><label class="editorial-form__full">What can we help with?<textarea placeholder="Write your message here..."></textarea></label><button type="button" class="signature-button">Send message <span>→</span></button></form>
            </div>
        @elseif($page === 'faq')
            <div class="editorial-faq">
                @foreach(['How long does shipping take?' => 'Orders are prepared with care and dispatched promptly. Delivery timing varies by destination and carrier.', 'Can I return an item?' => 'Yes. Contact customer care with your order details and we will guide you through the return process.', 'Are payments secure?' => 'Yes. Our checkout uses the existing protected payment flow to keep your details secure.', 'How can I update my details?' => 'Sign in to your account to update your personal details, password and order information.'] as $question => $answer)
                    <details><summary>{{ $question }} <span>+</span></summary><p>{{ $answer }}</p></details>
                @endforeach
            </div>
        @elseif(in_array($page, ['gallery', 'portfolio']))
            <div class="editorial-gallery">
                @foreach(['photo-1494438639946-1ebd1d20bf85', 'photo-1616486338812-3dadae4b4ace', 'photo-1618221195710-dd6b41faaea6', 'photo-1523275335684-37898b6baf30', 'photo-1556742049-0cfed4f6a45d'] as $image)
                    <figure><img src="https://images.unsplash.com/{{ $image }}?auto=format&fit=crop&w=1100&q=85" alt="MyStore visual edit"><figcaption>MyStore / considered details</figcaption></figure>
                @endforeach
            </div>
        @elseif($page === 'collections')
            <div class="collection-page-intro"><p class="signature-label">The MyStore edit</p><h2>Collections that make<br>everyday life feel <em>intentional.</em></h2><p>Explore curated worlds of form, texture and utility. Each collection is built around a distinctive way of living.</p></div>
            @if($categories->isNotEmpty())
                <div class="collection-page-grid">
                    @foreach($categories as $index => $category)
                        <a href="{{ route('products.category', $category->slug) }}" class="collection-page-card">
                            <img src="{{ $category->image ?: 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=1200&q=85' }}" alt="{{ $category->name }}">
                            <span class="collection-page-card__number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div><small>{{ $category->products_count }} {{ \Illuminate\Support\Str::plural('piece', $category->products_count) }}</small><h3>{{ $category->name }}</h3><span>Explore <b>↗</b></span></div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="store-empty"><p class="signature-label">Collections are being prepared</p><h2>Something beautiful is<br><em>on its way.</em></h2><p>Active collections created in the admin panel will appear here automatically.</p><a class="signature-button" href="{{ route('products.index') }}">Browse all products <span>→</span></a></div>
            @endif
        @else
            <div class="editorial-statement"><p class="signature-label">Our approach</p><h2>Clarity over clutter.<br><em>Always.</em></h2><p>Every MyStore touchpoint is designed around one simple idea: help you discover, understand and choose pieces you will genuinely use and love for years.</p><a class="signature-arrow-link" href="{{ route('products.index') }}">Explore the shop <span>→</span></a></div>
            <div class="editorial-principles"><article><span>01</span><h3>Chosen with care</h3><p>We select every product for its enduring purpose and its quietly thoughtful details.</p></article><article><span>02</span><h3>Made to last</h3><p>Objects should gather stories over time, not lose their relevance after a season.</p></article><article><span>03</span><h3>Service, considered</h3><p>Simple delivery, clear information and kind support at every step.</p></article></div>
        @endif

        <div class="internal-lower">
            <section class="internal-service-strip"><article><span>01</span><h3>Chosen with care</h3><p>Every MyStore piece is selected for its practical purpose and enduring character.</p></article><article><span>02</span><h3>Delivery, considered</h3><p>Careful packing and clear updates from checkout to your doorstep.</p></article><article><span>03</span><h3>Here when needed</h3><p>Thoughtful human help for every question before and after an order.</p></article></section>
            <section class="internal-image-feature"><div></div><article><p class="signature-label">The MyStore standard</p><h2>Less noise.<br><em>More meaning.</em></h2><p>We bring a calmer, more intentional way to discover the things that shape everyday life.</p><a href="{{ route('products.index') }}" class="signature-button">Explore the collection <span>→</span></a></article></section>
            <section class="internal-note"><p class="signature-label">Made for modern living</p><h2>Designed to feel good<br>long after <em>checkout.</em></h2><p>From the first browse to the years that follow, each detail is built around clarity, quality and a little more ease.</p></section>
            <section class="internal-next"><p>Discover more</p><a href="{{ route('collections') }}">Explore collections <span>↗</span></a><a href="{{ route('contact') }}">Talk to our team <span>↗</span></a></section>
        </div>
    </div>
</section>
@endsection
