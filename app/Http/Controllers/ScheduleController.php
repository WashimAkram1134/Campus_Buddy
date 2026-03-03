<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('routine', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string|max:20',
            'course_title' => 'required|string|max:255',
            'teacher_initial' => 'required|string|max:50',
            'room_no' => 'required|string|max:20',
            'section' => 'required|string|max:50',
            'major' => 'nullable|string|max:100',
            'day' => 'required|string',
            'time_slot' => 'required|string',
        ]);

        Schedule::create($request->all());

        return back()->with('success', 'Schedule added successfully!');
    }
}