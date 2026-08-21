@extends('layouts.app')
@section('title','Payment cancelled · MyStore')
@section('content')
<section class="section"><div class="container"><div class="page-card" style="max-width:760px;margin:50px auto;text-align:center;padding:70px 30px"><div class="eyebrow">Payment cancelled</div><h1 style="font:800 50px var(--font-display);letter-spacing:-.05em">No worries.</h1><p class="section-copy" style="margin:15px auto 28px">Your payment was cancelled. You can return to your order and try again.</p><a class="btn btn-primary" href="{{ route('orders.show',$order->id) }}">Return to order →</a></div></div></section>
<x-store-discovery-sections />
@endsection
