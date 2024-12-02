@extends('layouts.app')

@section('content')
<h1>Teacher Dashboard</h1>

<section>
    <h2>Today's Classes</h2>
    @if($todayClasses->isEmpty())
        <p>No classes scheduled for today.</p>
    @else
        <ul>
            @foreach($todayClasses as $class)
                <li>
                    <a href="{{ route('mark.attendance', ['classid' => $class->id]) }}">
                        Class {{ $class->id }} | Starts: {{ $class->starttime }} | Ends: {{ $class->endtime }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</section>

<section>
    <h2>Past Classes</h2>
    @if($pastClasses->isEmpty())
        <p>No past classes available.</p>
    @else
        <ul>
            @foreach($pastClasses as $class)
                <li>
                    Class {{ $class->id }} | Date: {{ $class->starttime->format('Y-m-d') }} | Time: {{ $class->starttime->format('H:i') }}
                </li>
            @endforeach
        </ul>
    @endif
</section>

<section>
    <h2>Future Classes</h2>
    @if($futureClasses->isEmpty())
        <p>No future classes available.</p>
    @else
        <ul>
            @foreach($futureClasses as $class)
                <li>
                    Class {{ $class->id }} | Date: {{ $class->starttime->format('Y-m-d') }} | Time: {{ $class->starttime->format('H:i') }}
                </li>
            @endforeach
        </ul>
    @endif
</section>
@endsection
