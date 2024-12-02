<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Class;

class StudentDashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $classId = $request->get('classid');

        $query = Attendance::where('studentid', $userId);
        if ($classId) {
            $query->where('classid', $classId);
        }
        $attendanceRecords = $query->get();

        $classes = ClassModel::all(); // To populate the dropdown

        return view('student_dashboard', [
            'attendanceRecords' => $attendanceRecords,
            'classes' => $classes,
        ]);
    }
}
