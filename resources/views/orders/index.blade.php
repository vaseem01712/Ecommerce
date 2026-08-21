@extends('layouts.app')
@section('title','My Orders · MyStore')
@section('content')
<section class="page-hero"><div class="container"><div class="breadcrumbs">Account / Orders</div><h1>Your orders.</h1><p>A clean record of every order placed through your account.</p></div></section>
<section class="section"><div class="container"><div class="page-card"><div class="table-wrap"><table class="premium-table"><thead><tr><th>Order</th><th>Date</th><th>Total</th><th>Status</th><th>Payment</th><th></th></tr></thead><tbody>@forelse($orders as $order)<tr><td><strong>#{{ $order->id }}</strong></td><td>{{ $order->created_at->format('M d, Y') }}</td><td>${{ number_format($order->total,2) }}</td><td><span class="status info">{{ $order->status }}</span></td><td><span class="status {{ $order->payment_status==='paid'?'success':'' }}">{{ $order->payment_status }}</span></td><td><a class="btn" href="{{ route('orders.show',$order->id) }}">View</a></td></tr>@empty<tr><td colspan="6" style="text-align:center;padding:50px">No orders yet.</td></tr>@endforelse</tbody></table></div></div></div></section>
<x-store-discovery-sections />
@endsection
