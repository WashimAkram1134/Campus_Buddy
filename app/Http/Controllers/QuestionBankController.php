<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use Illuminate\Http\Request;

class QuestionBankController extends Controller
{
    public function index(Request $request)
    {
        $query = QuestionBank::query();

        if ($request->filled('department')) {
            $query->where('department', 'like', '%' . $request->department . '%');
        }

        if ($request->filled('course')) {
            $query->where(function($q) use ($request) {
                $q->where('course_code', 'like', '%' . $request->course . '%')
                  ->orWhere('course_name', 'like', '%' . $request->course . '%');
            });
        }

        if ($request->filled('semester')) {
            $query->where('year_semester', 'like', '%' . $request->semester . '%');
        }

        $questions = $query->latest()->get();

        return view('questionbank', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string',
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'title' => 'required|string',
            'difficulty' => 'required|string',
            'question_heading' => 'required|string',
            'sub_questions' => 'required|string',
            'year_semester' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        $data = $request->only([
            'department', 'course_code', 'course_name', 'title', 
            'difficulty', 'question_heading', 'sub_questions', 'year_semester'
        ]);
        $data['user_id'] = auth()->id();
        $data['tags'] = $request->tags; // Optional

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('question_banks', 'public');
        }

        QuestionBank::create($data);

        return redirect()->back()->with('success', 'Question Bank entry added successfully!');
    }
}
