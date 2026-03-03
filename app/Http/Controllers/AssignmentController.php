<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'cr') {
            return back()->with('error', 'Only CR can add assignments.');
        }

        $request->validate([
            'course_code' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
        ]);

        Assignment::create([
            'user_id' => auth()->id(),
            'course_code' => $request->course_code,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'department' => auth()->user()->department,
            'batch' => auth()->user()->batch,
            'section' => auth()->user()->section,
        ]);

        return back()->with('success', 'Assignment added successfully!');
    }
}