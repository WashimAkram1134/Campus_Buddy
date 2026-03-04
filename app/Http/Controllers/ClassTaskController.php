<?php

namespace App\Http\Controllers;

use App\Models\ClassTask;
use Illuminate\Http\Request;

class ClassTaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $tasks = ClassTask::where('department', $user->department)
            ->where('batch', $user->batch)
            ->where('section', $user->section)
            ->where(function ($query) use ($user) {
            if ($user->major) {
                $query->where('major', $user->major)->orWhereNull('major');
            }
            else {
                $query->whereNull('major');
            }
        })
            ->orderBy('deadline', 'asc')
            ->get();

        return view('classtask', compact('tasks'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'cr') {
            return back()->with('error', 'Only CR can add tasks.');
        }

        $request->validate([
            'type' => 'required|string|in:assignment,quiz,presentation',
            'course_code' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
        ]);

        ClassTask::create([
            'type' => $request->type,
            'user_id' => auth()->id(),
            'course_code' => $request->course_code,
            'title' => $request->title,
            'topic' => $request->topic,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'duration_or_slot' => $request->duration_or_slot,
            'progress_status' => $request->progress_status,
            'tip_1' => $request->tip_1,
            'tip_2' => $request->tip_2,
            'department' => auth()->user()->department,
            'batch' => auth()->user()->batch,
            'section' => auth()->user()->section,
            'major' => auth()->user()->major,
        ]);

        return back()->with('success', ucfirst($request->type) . ' added successfully!');
    }
}