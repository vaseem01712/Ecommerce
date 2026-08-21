@extends('layouts.guest')
@section('title','Welcome back · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Welcome back</h1><p>Sign in to continue your premium shopping experience.</p><form class="auth-form" method="POST" action="{{ route('login') }}">@csrf
<div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required autofocus>@error('email')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<div class="field"><label>Password</label><input type="password" name="password" required>@error('password')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<label style="font-size:12px;color:var(--muted)"><input type="checkbox" name="remember"> Remember me</label>
<div style="display:flex;justify-content:space-between;align-items:center;gap:10px"><a href="{{ route('password.request') }}" style="font-size:12px">Forgot password?</a><button class="btn btn-primary">Sign in</button></div></form>
<p style="font-size:12px;text-align:center;margin-top:20px">New here? <a href="{{ route('register') }}"><strong>Create an account</strong></a></p></div>
@endsection
