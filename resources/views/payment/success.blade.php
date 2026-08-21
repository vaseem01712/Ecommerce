@extends('layouts.app')
@section('title','Payment successful · MyStore')
@section('content')
<section class="section"><div class="container"><div class="page-card" style="max-width:760px;margin:50px auto;text-align:center;padding:70px 30px"><div class="eyebrow">Payment complete</div><h1 style="font:800 50px var(--font-display);letter-spacing:-.05em">Thank you.</h1><p class="section-copy" style="margin:15px auto 28px">Your payment was completed successfully. Your order is being prepared.</p><a class="btn btn-primary" href="{{ route('orders.show',$order->id) }}">View order →</a></div></div></section>
<x-store-discovery-sections />
@endsection
