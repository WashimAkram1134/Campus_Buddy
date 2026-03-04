<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'cr') {
            return back()->with('error', 'Only CR can add announcements.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'department' => auth()->user()->department,
            'batch' => auth()->user()->batch,
            'section' => auth()->user()->section,
            'major' => auth()->user()->major,
        ]);

        return back()->with('success', 'Announcement added successfully!');
    }
}