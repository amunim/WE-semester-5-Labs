@extends('layouts.app')

@section('content')
<div class="login-form">
    <h2>Login</h2>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
    </form>
</div>
@endsection
