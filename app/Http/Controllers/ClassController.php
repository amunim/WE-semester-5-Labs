<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacherid' => 'required|integer',
            'starttime' => 'required|date',
            'endtime' => 'required|date|after:starttime',
            'credit_hours' => 'required|integer',
        ]);

        $class = ClassModel::create($validated);
        return response()->json($class);
    }

    public function show($id)
    {
        $class = ClassModel::findOrFail($id);
        return response()->json($class);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'teacherid' => 'sometimes|integer',
            'starttime' => 'sometimes|date',
            'endtime' => 'sometimes|date|after:starttime',
            'credit_hours' => 'sometimes|integer',
        ]);

        $class = ClassModel::findOrFail($id);
        $class->update($validated);
        return response()->json($class);
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();
        return response()->json(['message' => 'Class deleted successfully']);
    }


    public function showForm()
    {
        $user = Auth::user();
        if ($user->role !== 'teacher') {
            return redirect()->route('login'); // Redirect if not a teacher
        }

        $teachers = User::where('role', 'teacher')->get();
        return view('add_class', ['teachers' => $teachers]);
    }

    public function storeClass(Request $request)
    {
        $request->validate([
            'teacherid' => 'required|exists:user,id',
            'date' => 'required|date',
            'starttime' => 'required|date_format:H:i',
            'endtime' => 'required|date_format:H:i|after:starttime',
            'credit_hours' => 'required|integer|min:1',
        ]);

        $teacherid = $request->input('teacherid');
        $date = $request->input('date');
        $starttime = $request->input('starttime');
        $endtime = $request->input('endtime');
        $credit_hours = $request->input('credit_hours');

        $start_datetime = $date . ' ' . $starttime;
        $end_datetime = $date . ' ' . $endtime;

        // Check for overlapping classes for the same teacher
        $overlap = ClassModel::where('teacherid', $teacherid)
            ->where(function ($query) use ($start_datetime, $end_datetime) {
                $query->where('starttime', '<', $end_datetime)
                    ->where('endtime', '>', $start_datetime);
            })
            ->exists();

        if ($overlap) {
            return back()->with('error', 'The selected time slot overlaps with an existing class.');
        }

        // Create new class record
        ClassModel::create([
            'teacherid' => $teacherid,
            'starttime' => $start_datetime,
            'endtime' => $end_datetime,
            'credit_hours' => $credit_hours,
        ]);

        return redirect()->route('add.class')
            ->with('success', 'Class added successfully!');
    }
}
