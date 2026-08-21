@extends('layouts.guest')
@section('title','Confirm your password · MyStore')
@section('content')
<div style="margin-top:28px"><h1>Confirm your password</h1><p>For your security, please confirm your password before continuing.</p><form class="auth-form" method="POST" action="{{ route('password.confirm') }}">@csrf
<div class="field"><label>Current password</label><input type="password" name="password" required autofocus></div>
<button class="btn btn-primary">Confirm password</button></form></div>
@endsection
