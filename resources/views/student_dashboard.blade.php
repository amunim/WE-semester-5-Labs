@extends('layouts.app')

@section('content')
<form method="GET" action="{{ route('student.dashboard') }}">
    <label for="classFilter">Select Class:</label>
    <select name="classid" id="classFilter" onchange="this.form.submit();">
        <option value="">Select Class</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>Class {{ $class->id }}</option>
        @endforeach
    </select>
</form>

@if($attendanceRecords->isEmpty())
    <p>No attendance records found for this student.</p>
@else
    <h2>Attendance Records</h2>
    <table>
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Attendance</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendanceRecords as $record)
                <tr style="color: {{ $record->isPresent < 75 ? 'red' : ($record->isPresent < 85 ? 'yellow' : 'green') }}">
                    <td>{{ $record->classid }}</td>
                    <td>{{ $record->isPresent ? 'Yes' : 'No' }}</td>
                    <td>{{ $record->comments }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
