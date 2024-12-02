@extends('layouts.app')

@section('content')
<div class="login-form">
    <h2>Sign Up</h2>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('signup') }}" method="post">
        @csrf
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="class" placeholder="Class" required>
        <select name="role" required>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
    </form>
</div>
@endsection
