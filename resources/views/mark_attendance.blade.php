@extends('layouts.app')

@section('content')
    <header>
        <h1>Check Attendance</h1>
        <nav>
            <a href="{{ route('mark.attendance') }}" class="btn active">Mark Attendance</a>
            <a href="{{ route('teacher.dashboard') }}" class="btn">Dashboard</a>
        </nav>
    </header>

    <main>
        <!-- Select Class -->
        <form method="GET" id="classFilterForm" action="{{ route('mark.attendance') }}">
            <label for="classFilter">Select Class</label>
            <select name="classid" id="classFilter" onchange="this.form.submit()" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $classFilter == $class->id ? 'selected' : '' }}>Class {{ $class->id }}</option>
                @endforeach
            </select>
        </form>

        @if($classFilter)
            <p>Attendance Records for Class {{ $classFilter }}:</p>
            <form method="POST" action="{{ route('mark.attendance.submit') }}">
                @csrf
                <input type="hidden" name="classid" value="{{ $classFilter }}">
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Present?</th>
                            <th>Marked At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->fullname }}</td>
                                <td>
                                    <input type="hidden" name="attendance[{{ $student->id }}]" value="0">
                                    <input type="checkbox" name="attendance[{{ $student->id }}]" value="1" {{ $student->isPresent ? 'checked' : '' }}>
                                </td>
                                <td>{{ $student->marked_at ? $student->marked_at : '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit">Save Attendance</button>
            </form>
        @endif
    </main>
@endsection
