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
            'file' => 'required|file|mimes:pdf,pptx,docx,doc|max:10240', // 10MB max
        ]);

        $user = Auth::user();
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $path = $file->store('materials', 'public');

        Material::create([
            'user_id' => $user->id,
            'department' => $user->department,
            'major' => $user->major,
            'section' => $user->section,
            'batch' => $user->batch,
            'course_code' => $request->course_code,
            'title' => $request->title,
            'file_path' => $path,
            'file_extension' => $extension,
        ]);

        return redirect()->back()->with('success', 'Material uploaded successfully!');
    }
}