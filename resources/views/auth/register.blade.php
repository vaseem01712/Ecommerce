@extends('layouts.guest')
@section('title','Create your account · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Create your account</h1><p>Join MyStore for a more considered way to shop.</p><form class="auth-form" method="POST" action="{{ route('register') }}">@csrf
<div class="field"><label>Name</label><input name="name" value="{{ old('name') }}" required>@error('name')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required>@error('email')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<div class="field"><label>Password</label><input type="password" name="password" required>@error('password')<small style="color:var(--danger)">{{ $message }}</small>@enderror</div>
<div class="field"><label>Confirm password</label><input type="password" name="password_confirmation" required></div>
<button class="btn btn-primary" style="width:100%">Create account</button></form>
<p style="font-size:12px;text-align:center;margin-top:20px">Already registered? <a href="{{ route('login') }}"><strong>Sign in</strong></a></p></div>
@endsection
