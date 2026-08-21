@extends('layouts.guest')
@section('title','Set a new password · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Set a new password</h1><p>Choose a strong password for your account.</p><form class="auth-form" method="POST" action="{{ route('password.store') }}">@csrf
<input type="hidden" name="token" value="{{ $request->route('token') }}">
<div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email',$request->email) }}" required></div>
<div class="field"><label>New password</label><input type="password" name="password" required></div>
<div class="field"><label>Confirm password</label><input type="password" name="password_confirmation" required></div>
<button class="btn btn-primary" style="width:100%">Reset password</button></form></div>
@endsection
