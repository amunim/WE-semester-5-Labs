@extends('layouts.app')

@section('content')
<header>
    <div class="header-content">
        <div>Hello, {{ $user->fullname }}</div>
        <h1>{{ $user->role === 'teacher' ? 'Teacher Dashboard' : 'Student Dashboard' }}</h1>
    </div>
    <div class="header-buttons">
        <a href="{{ route('logout') }}">Logout</a>
        @if($user->role === 'teacher')
            <a href="{{ route('addClass') }}">Add Class</a>
        @endif
    </div>
</header>

<main>
    @include($user->role === 'teacher' ? 'teacher_dashboard_content' : 'student_dashboard_content')
</main>
@endsection
