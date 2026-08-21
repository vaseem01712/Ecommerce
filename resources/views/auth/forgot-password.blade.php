@extends('layouts.guest')
@section('title','Reset your password · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Reset your password</h1><p>Enter your email and we'll send you a secure reset link.</p><form class="auth-form" method="POST" action="{{ route('password.email') }}">@csrf
<div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required autofocus>@error('email')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<button class="btn btn-primary" style="width:100%">Email password reset link</button></form><p style="font-size:12px;text-align:center;margin-top:20px"><a href="{{ route('login') }}">Back to sign in</a></p></div>
@endsection
