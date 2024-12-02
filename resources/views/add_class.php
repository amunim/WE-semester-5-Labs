@extends('layouts.app')

@section('content')
    <h2>Add Class</h2>

    @if(session('error'))
        <p class="error" style="color: red;">{{ session('error') }}</p>
    @endif
    @if(session('success'))
        <p class="success" style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('add.class.submit') }}">
        @csrf
        <label for="teacherid">Select Teacher</label>
        <select name="teacherid" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
            @endforeach
        </select>

        <label for="date">Date</label>
        <input type="date" name="date" required>

        <label for="starttime">Start Time</label>
        <input type="time" name="starttime" required>

        <label for="endtime">End Time</label>
        <input type="time" name="endtime" required>

        <label for="credit_hours">Credit Hours</label>
        <input type="number" name="credit_hours" required min="1">

        <button type="submit">Add Class</button>
    </form>

    <a href="{{ route('teacher.dashboard') }}" class="btn">Go to Dashboard</a>
@endsection
