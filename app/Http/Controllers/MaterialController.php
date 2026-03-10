<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:20',
            'file' => 'required|file|mimes:pdf,pptx,docx,doc|max:65536', // 64MB max
            'type' => 'nullable|string|in:class_material,hand_note',
        ]);

        $user = Auth::user();
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $path = $file->store('materials', 'public');

        if (!$user->department || !$user->section || !$user->batch) {
            return redirect()->back()->withErrors(['file' => 'Your profile is missing Department, Section, or Batch. Please update your profile first.']);
        }

        $material = Material::create([
            'user_id' => $user->id,
            'type' => $request->type ?? 'class_material',
            'department' => $user->department,
            'major' => $user->major,
            'section' => $user->section,
            'batch' => $user->batch,
            'course_code' => $request->course_code,
            'title' => $request->title,
            'file_path' => $path,
            'file_extension' => $extension,
        ]);

        \Illuminate\Support\Facades\Log::info("Material created: ID {$material->id}, Title: {$material->title} for {$material->department}-{$material->batch}-{$material->section}");

        return redirect()->back()->with('success', 'Material uploaded successfully!');
    }
}