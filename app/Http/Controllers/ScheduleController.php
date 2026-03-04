<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Filter schedules by user's group and major
        $schedules = Schedule::where('department', $user->department)
            ->where('batch', $user->batch)
            ->where('section', $user->section)
            ->where(function ($query) use ($user) {
            if ($user->major) {
                $query->where('major', $user->major)->orWhereNull('major')->orWhere('major', '');
            }
            else {
                $query->whereNull('major')->orWhere('major', '');
            }
        })
            ->get();

        return view('routine', compact('schedules'));
    }

    public function store(Request $request)
    {
        // Only CR can add schedules
        if (auth()->user()->role !== 'cr') {
            return back()->with('error', 'Only CR can add schedules.');
        }

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

        $data = $request->all();
        // Auto-fill ownership from CR profile
        $data['department'] = auth()->user()->department;
        $data['batch'] = auth()->user()->batch;
        // The form provides section, but requirement says "owned by that specific class group".
        // It's safer to use the CR's section too if that's the intention, 
        // but the prompt says they update it with their "specific department, batch, and section".
        $data['section'] = auth()->user()->section;

        Schedule::create($data);

        return back()->with('success', 'Schedule added successfully!');
    }
}