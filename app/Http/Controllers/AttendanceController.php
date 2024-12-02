<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Class; // Assuming ClassModel represents your 'class' table
use App\Models\Attendance;
use Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    public function store(Request $request)
    {
        $attendance = Attendance::create($request->all());
        return response()->json($attendance);
    }

    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());
        return response()->json($attendance);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(['message' => 'Attendance deleted successfully']);
    }


    public function showForm(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'teacher') {
            return redirect()->route('login'); // Redirect to login if not a teacher
        }

        $classFilter = $request->input('classid');
        $classes = ClassModel::all(); // Fetch all classes for dropdown

        // Fetch students for the selected class
        $students = User::where('role', 'student')->get();
        $attendanceData = [];

        if ($classFilter) {
            // Fetch attendance data for the selected class
            $attendanceRecords = Attendance::where('classid', $classFilter)->get();
            foreach ($attendanceRecords as $record) {
                $attendanceData[$record->studentid] = [
                    'isPresent' => $record->isPresent,
                    'marked_at' => $record->marked_at,
                ];
            }
        }

        // Merge student data with attendance data
        foreach ($students as &$student) {
            $studentId = $student->id;
            $student->isPresent = $attendanceData[$studentId]['isPresent'] ?? 0;
            $student->marked_at = $attendanceData[$studentId]['marked_at'] ?? null;
        }

        return view('mark_attendance', [
            'classes' => $classes,
            'students' => $students,
            'classFilter' => $classFilter,
        ]);
    }

    public function markAttendance(Request $request)
    {
        $classFilter = $request->input('classid');
        $attendanceUpdates = $request->input('attendance');
        $currentTime = now();

        foreach ($attendanceUpdates as $studentId => $isPresent) {
            $attendanceRecord = Attendance::updateOrCreate(
                ['classid' => $classFilter, 'studentid' => $studentId],
                ['isPresent' => $isPresent, 'marked_at' => $currentTime]
            );
        }

        return redirect()->route('mark.attendance', ['classid' => $classFilter])
            ->with('success', 'Attendance updated successfully!');
    }
}
