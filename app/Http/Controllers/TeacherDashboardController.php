<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Class;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacherId = auth()->id();
        $currentDate = now();

        $todayClasses = ClassModel::where('teacherid', $teacherId)
                             ->whereDate('starttime', $currentDate->toDateString())
                             ->orderBy('starttime')
                             ->get();

        $pastClasses = ClassModel::where('teacherid', $teacherId)
                            ->where('endtime', '<', $currentDate)
                            ->orderBy('starttime', 'desc')
                            ->get();

        $futureClasses = ClassModel::where('teacherid', $teacherId)
                              ->where('starttime', '>', $currentDate)
                              ->orderBy('starttime')
                              ->get();

        return view('teacher_dashboard', [
            'todayClasses' => $todayClasses,
            'pastClasses' => $pastClasses,
            'futureClasses' => $futureClasses,
        ]);
    }
}
