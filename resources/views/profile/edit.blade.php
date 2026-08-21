@extends('layouts.app')
@section('title','Profile · MyStore')
@section('content')
<section class="page-hero"><div class="container"><div class="breadcrumbs">Account / Profile</div><h1>Your profile.</h1><p>Keep your account details and security settings up to date.</p></div></section>
<section class="section"><div class="container"><div class="split">
<div class="page-card"><div class="eyebrow">Account details</div><form class="auth-form" method="POST" action="{{ route('profile.update') }}">@csrf @method('PATCH')<div class="field"><label>Name</label><input name="name" value="{{ old('name',$user->name) }}" required></div><div class="field"><label>Email</label><input type="email" name="email" value="{{ old('email',$user->email) }}" required></div><button class="btn btn-primary">Save changes</button></form></div>
<div class="page-card"><div class="eyebrow">Security</div><form class="auth-form" method="POST" action="{{ route('password.update') }}">@csrf @method('PUT')<div class="field"><label>Current password</label><input type="password" name="current_password" required></div><div class="field"><label>New password</label><input type="password" name="password" required></div><div class="field"><label>Confirm new password</label><input type="password" name="password_confirmation" required></div><button class="btn btn-primary">Update password</button></form><hr style="border:0;border-top:1px solid var(--line);margin:30px 0"><form method="POST" action="{{ route('profile.destroy') }}">@csrf @method('DELETE')<button class="btn" style="color:var(--danger)">Delete account</button></form></div></div></div></section>
<x-store-discovery-sections />
@endsection
