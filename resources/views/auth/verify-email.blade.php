@extends('layouts.guest')
@section('title','Verify your email · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Verify your email</h1><p>Please verify your email address using the link we sent you.</p><form class="auth-form" method="POST" action="{{ route('verification.send') }}">@csrf<button class="btn btn-primary" style="width:100%">Resend verification email</button></form><form method="POST" action="{{ route('logout') }}" style="margin-top:12px">@csrf<button class="btn" style="width:100%">Log out</button></form></div>
@endsection
