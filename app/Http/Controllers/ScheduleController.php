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
        // Only CR or Admin can add schedules
        if (!in_array(auth()->user()->role, ['cr', 'admin'])) {
            return back()->with('error', 'Only CR or Admin can manage schedules.');
        }

        $request->validate([
            'course_code' => 'required|string|max:20',
            'course_title' => 'required|string|max:255',
            'teacher_initial' => 'required|string|max:50',
            'room_no' => 'required|string|max:20',
            'type' => 'required|string|in:theory,lab',
            'lab_section' => 'nullable|string|max:50',
            'day' => 'required|string',
            'time_slot' => 'required|string',
        ]);

        $data = $request->all();
        // Auto-fill ownership from CR profile
        $user = auth()->user();
        $data['department'] = $user->department;
        $data['batch'] = $user->batch;
        $data['section'] = $user->section;
        $data['major'] = $user->major;

        Schedule::create($data);

        return back()->with('success', 'Schedule added successfully!');
    }

    public function update(Request $request, Schedule $schedule)
    {
        $user = auth()->user();
        if ($user->role !== 'cr' ||
        $schedule->department !== $user->department ||
        $schedule->batch !== $user->batch ||
        $schedule->section !== $user->section) {
            return back()->with('error', 'Unauthorized. You can only manage your own group\'s schedule.');
        }

        $request->validate([
            'course_code' => 'required|string|max:20',
            'course_title' => 'required|string|max:255',
            'teacher_initial' => 'required|string|max:50',
            'room_no' => 'required|string|max:20',
            'type' => 'required|string|in:theory,lab',
            'lab_section' => 'nullable|string|max:50',
            'day' => 'required|string',
            'time_slot' => 'required|string',
        ]);

        $data = $request->all();
        // Force current group info
        $data['department'] = $user->department;
        $data['batch'] = $user->batch;
        $data['section'] = $user->section;
        $data['major'] = $user->major;

        $schedule->update($data);

        return back()->with('success', 'Schedule updated successfully!');
    }

    public function destroy(Schedule $schedule)
    {
        $user = auth()->user();
        if ($user->role !== 'cr' ||
        $schedule->department !== $user->department ||
        $schedule->batch !== $user->batch ||
        $schedule->section !== $user->section) {
            return back()->with('error', 'Unauthorized. You can only manage your own group\'s schedule.');
        }

        $schedule->delete();

        return back()->with('success', 'Schedule deleted successfully!');
    }
}